<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // validate form data
    $errors = array();

    if (empty($firstName)) {
        $errors[] = 'First name is required.';
    }

    if (empty($lastName)) {
        $errors[] = 'Last name is required.';
    }

    if (empty($email)) {
        $errors[] = 'Email address is required.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email address is not valid.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    } else if ($password != $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    // if no errors, save data to database and display success message
    if (empty($errors)) {
        // save data to database

        // create user object
        $user = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
        );

        // load existing user data from file
        $userData = json_decode(file_get_contents('data.json'), true);

        // add new user to user data
        $userData[] = $user;

        // save updated user data to file
        file_put_contents('data.json', json_encode($userData));
        // display success message
        echo 'Registration successful!';
        echo '<br/>';
        echo '<br/>';

        echo "<button onclick=\"location.href='login.php'\">Go to Login Page</button>";
    } else {
        // display error messages
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '<br>';
        // echo "<button onclick=\"javascript:history.back()\">Go Back</button>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="firstName">First Name:</label>
		<input type="text" id="firstName" name="firstName" ><br>

		<label for="lastName">Last Name:</label>
		<input type="text" id="lastName" name="lastName" ><br>

		<label for="email">Email Address:</label>
		<input type="text" id="email" name="email" ><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" ><br>

		<label for="confirmPassword">Confirm Password:</label>
		<input type="password" id="confirmPassword" name="confirmPassword" ><br>

		<input type="submit" value="Register">
	</form>
</body>
</html>
