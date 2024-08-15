<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Contact</title>
    <link href="/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-group {
            margin-right: 10px; /* Add some spacing between buttons and "Add Contact" button */
        }
        .action-links a {
            margin-right: 10px; /* Add spacing between action links */
        }
    </style>
</head>
<body>
<h4 class="text-center mt-4">Contact Management Application</h4>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status')}}</div>
            @endif
            <div class="card">
                <h4 class="text-center">Update Contact</h4>
                <div class="card-body">
                    <form action="{{ url('contacts/'.$contact->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}" required>
                            @error('name') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$contact->email }}" required>
                            @error('email') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $contact->phone}}" required>
                            @error('phone') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{$contact->address}}" required>
                            @error('address') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
