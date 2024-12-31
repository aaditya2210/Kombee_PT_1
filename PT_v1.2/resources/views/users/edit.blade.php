<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>First Name:</label>
        <input type="text" name="first_name" value="{{ $user->first_name }}" required><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="{{ $user->last_name }}" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required><br>

        <label>Contact Number:</label>
        <input type="text" name="contact_number" value="{{ $user->contact_number }}" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
