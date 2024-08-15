<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Card</title>
    <!-- Bootstrap CSS -->
    <link href="/bootstrap-5.0.2-dist/css/bootstrap.css" rel="stylesheet">
    <style>
        .btn-group {
            margin-right: 10px; /* Add some spacing between buttons and "Add Contact" button */
        }
        .action-links a {
            margin-right: 10px; /* Add spacing between action links */
        }
        .table-responsive {
            overflow-x: auto; /* Ensures the table is scrollable on smaller screens */
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
                    <div class="d-flex justify-content-end w-100">
                        <a href="/contacts" class="btn btn-primary">Add Contact</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y, h:i A') }}</td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>
