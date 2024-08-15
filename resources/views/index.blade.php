<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Card</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-group {
            margin-right: 10px; /* Add spacing between buttons */
        }
        .action-links a {
            margin-right: 10px; /* Add spacing between action links */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h4 class="text-center">Contact Management Application</h4>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Search Form -->
                    <form class="d-flex mb-2 me-3" aria-label="Search Contacts" method="get" action="/search">
                        <input id="search" name="search" class="form-control" type="search" placeholder="Search...." aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <!-- Sorting and Add Contact Button -->
                    <div class="d-flex align-items-center">

                        <div class="dropdown me-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="{{ route('contacts.index', ['sort' => 'name']) }}">Sort by Name</a></li>
                                <li><a class="dropdown-item" href="{{ route('contacts.index', ['sort' => 'date']) }}">Sort by Date</a></li>
                            </ul>
                        </div>

                        <a href="/contacts/create" class="btn btn-primary">Add Contact</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Contacts Table -->
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr class="text-center">
                            <th>Sl</th> <!-- Serial Number -->
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contact as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Serial Number -->
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Contact Actions">
                                        <a href="{{ url('contacts/show/' . $item->id) }}" class="btn btn-sm btn-info" aria-label="Show Contact">Show</a>
                                        <a href="{{ url('contacts/' . $item->id) }}" class="btn bg-success" aria-label="Edit Contact">Edit</a>
                                        <a href="{{ url('contacts/' . $item->id.'/delete') }}" class="btn btn-sm btn-danger" aria-label="Delete Contact">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
