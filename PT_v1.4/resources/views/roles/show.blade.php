<!DOCTYPE html>
<html>
<head>
    <title>Role Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Role Details</h1>
        <p><strong>ID:</strong> {{ $role->id }}</p>
        <p><strong>Name:</strong> {{ $role->name }}</p>
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back to Roles</a>
    </div>
</body>
</html>
