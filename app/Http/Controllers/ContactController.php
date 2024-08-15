<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display a listing of the contacts
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'created_at','asc'); // Default to 'name' if no sort parameter is provided

        $contacts = Contact::query();

        if ($sort === 'name') {
            $contacts->orderBy('name','asc');
        } elseif ($sort === 'date') {
            $contacts->orderBy('created_at','desc');
        }

        $contact = $contacts->get();

        return view('index', compact('contact'));
    }

    // Show the form for creating a new contact
    public function search(Request $request)
    {
        $search = $request->input('search'); // Get the search input from the request

        // Ensure the search term is properly included in the query
        $contact = Contact::where(function($query) use ($search) {
            $query->where('email', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%");
        })->get(); // Retrieve the results from the database

        return view('index', compact('contact', 'search'));
    }


    function create(){

        return view('create');
    }

    public function store(Request $request) {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contact,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',

        ]);

        // Create a new contact entry
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        // Redirect to the form with a success message
        return redirect('/contacts')->with('status', 'Contact created successfully!');
    }

    public function edit(int $id){

        $contact = Contact::find($id);
        //return $contact;
        return view('edit',compact('contact'));
    }


    public function update(Request $request, int $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('contact', 'email')->ignore($id),
            ],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Find the contact and update it
        $contact = Contact::findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        // Redirect to the previous page with a success message
        return redirect()->back()->with('status', 'Contact updated successfully!');
    }

    public function show(int $id){

        $contact = Contact::find($id);
        //return $contact;
        return view('show',compact('contact'));
    }

    public function destroy(int $id){

        $contact = Contact::findOrFail($id);
        $contact ->delete();

        return redirect()->back()->with('status','Contact deleted successfully!');

    }

}



