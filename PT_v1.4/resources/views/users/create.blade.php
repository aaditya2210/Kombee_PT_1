{{-- <!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body>
    <h1>Create User</h1>
    <form id="userForm" action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">
        <br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name">
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" id="contact_number">
        <br>

        <label for="state">State:</label> 
        <select name="state_id" id="state"> 
            <option value="">Select State</option> 
            <!-- Populate this dynamically --> 
        </select> 
        <br> 
        <label for="city">City:</label>
         <select name="city_id" id="city"> 
            <option value="">Select City</option>
             <!-- Populate this dynamically based on state --> 
            </select> 
            <br>

        
        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {

            console.log("jQuery version:", $.fn.jquery); // Check jQuery version 
            console.log("Validation plugin loaded:", $.fn.validate !== undefined);

            $("#userForm").submit(function(event) 
            { 
                console.log("Form submitted"); // Debug line 
            });

            $("#userForm").validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 50,
                        alpha: true
                    },
                    last_name: {
                        required: true,
                        maxlength: 50,
                        alpha: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    contact_number: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter your first name",
                        alpha: "Only letters are allowed"
                    },
                    last_name: {
                        required: "Please enter your last name",
                        alpha: "Only letters are allowed"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    contact_number: {
                        required: "Please provide your contact number",
                        digits: "Only digits are allowed"
                    }
                }
            });

            // Fetch states when the page loads
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
        });
    </script>
</body>
</html> --}}























<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
</head>
<body>
    <h1>Create User</h1>
    <form id="userForm" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">
        <br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name">
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
        <br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" id="contact_number">
        <br>

        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" id="postcode">
        <br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
        <br>

        <label for="hobbies">Hobbies:</label>
        <input type="checkbox" name="hobbies[]" value="reading"> Reading
        <input type="checkbox" name="hobbies[]" value="traveling"> Traveling
        <input type="checkbox" name="hobbies[]" value="sports"> Sports
        <input type="checkbox" name="hobbies[]" value="music"> Music
        <br>

        {{-- <label for="role">Role:</label>
        <select name="role[]" id="role" multiple>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="guest">Guest</option>
        </select>
        <br> --}}




        <label for="role">Role:</label>
<select name="role[]" id="role" class="form-control" multiple>
    @foreach($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach
</select>
<br>













        <label for="files">Upload Files:</label>
        <input type="file" name="files[]" id="files" multiple>
        <br>

        <label for="state">State:</label>
        <select name="state_id" id="state">
            <option value="">Select State</option>
            <!-- Populate this dynamically -->
        </select>
        <br>

        <label for="city">City:</label>
        <select name="city_id" id="city">
            <option value="">Select City</option>
            <!-- Populate this dynamically based on state -->
        </select>
        <br>

        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            // Validation rules and messages
            $("#userForm").validate({
                rules: {
                    first_name: {
                        required: true,
                        maxlength: 50,
                        alphanumeric: true
                    },
                    last_name: {
                        required: true,
                        maxlength: 50,
                        alphanumeric: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    contact_number: {
                        required: true,
                        digits: true
                    },
                    postcode: {
                        required: true,
                        digits: true
                    },
                    gender: {
                        required: true
                    },
                    "hobbies[]": {
                        required: true
                    },
                    "role[]": {
                        required: true
                    },
                    "files[]": {
                        required: true
                    },
                    state_id: {
                        required: true
                    },
                    city_id: {
                        required: true
                    }
                },
                messages: {
                    first_name: {
                        required: "Please enter your first name",
                        alphanumeric: "Only letters and numbers are allowed"
                    },
                    last_name: {
                        required: "Please enter your last name",
                        alphanumeric: "Only letters and numbers are allowed"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    password_confirmation: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    },
                    contact_number: {
                        required: "Please provide your contact number",
                        digits: "Only digits are allowed"
                    },
                    postcode: {
                        required: "Please provide your postcode",
                        digits: "Only digits are allowed"
                    },
                    gender: {
                        required: "Please select your gender"
                    },
                    "hobbies[]": {
                        required: "Please select at least one hobby"
                    },
                    "role[]": {
                        required: "Please select at least one role"
                    },
                    "files[]": {
                        required: "Please upload at least one file"
                    },
                    state_id: {
                        required: "Please select a state"
                    },
                    city_id: {
                        required: "Please select a city"
                    }
                }
            });

            // Fetch states when the page loads
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


            
            // Autocomplete for Role dropdown
            var availableRoles = ["Admin", "User", "Guest"];
            $("#role").autocomplete({
                source: availableRoles
            });

            // Custom method for alphanumeric validation
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
            }, "Only letters and numbers are allowed");
        });
    </script>
</body>
</html>
