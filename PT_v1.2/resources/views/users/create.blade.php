<!DOCTYPE html>
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
</html>
