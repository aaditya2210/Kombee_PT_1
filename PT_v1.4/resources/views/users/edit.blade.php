{{-- <!DOCTYPE html>
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
</html> --}}










































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Edit User</h1>
    <form id="editUserForm" action="{{ route('users.update', $user->id) }}" method="POST">
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

        <label for="state">State:</label>
        <select name="state_id" id="state" required>
            <option value="">Select State</option>
            <!-- Populate this dynamically -->
        </select>
        <br>

        <label for="city">City:</label>
        <select name="city_id" id="city" required>
            <option value="">Select City</option>
            <!-- Populate this dynamically based on state -->
        </select>
        <br>

        <button type="submit">Update</button>
    </form>

   <script>
      $.ajax({
                url: "{{ route('states') }}",
                method: "GET",
                success: function(states) {
                    var stateSelect = $('#state');
                    stateSelect.empty().append('<option value="">Select State</option>');
                    $.each(states, function(key, value) {
                        stateSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });

            // Fetch cities based on the selected state
            $('#state').change(function() {
                var stateId = $(this).val();
                if(stateId) {
                    $.ajax({
                        url: "{{ route('cities', '') }}/" + stateId,
                        method: "GET",
                        success: function(cities) {
                            var citySelect = $('#city');
                            citySelect.empty().append('<option value="">Select City</option>');
                            $.each(cities, function(key, value) {
                                citySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty().append('<option value="">Select City</option>');
                }
            });
        
   </script>
</body>
</html>
