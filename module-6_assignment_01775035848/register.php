<?php
// Validate form inputs
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profilepic = $_FILES['profilepic']['name'];


    $errors = array(); // initialize empty array to store error messages

    if(empty($name)) {
        $errors[] = "Name is required!";
    }
    if(empty($email)) {
        $errors[] = "Email is required!";
    }
    if(empty($password)) {
        $errors[] = "Password is required!";
    }
    if(empty($profilepic)) {
        $errors[] = "Profile picture is required!";
    }

    if(count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        die();
    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    } else {

        // Save profile picture to server
        $target_dir = "uploads/";
        $target_file = $target_dir . date("YmdHis")."_" . basename($_FILES['profilepic']['name']);
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $target_file);

        // Save user data to CSV file
        $user_data = array($name, $email, $target_file);
        $fp = fopen('users.csv', 'a');
        fputcsv($fp, $user_data);
        fclose($fp);

        // Start session and set cookie with user's name
        session_start();
        $_SESSION['name'] = $name;
        setcookie('name', $name, time() + 3600, '/');

        echo "Registration Successful!";
        
        echo "</br>";
        echo "</br>";

        echo '<button onclick="window.location.href=\'users.php\'">View All Users</button>';
        
    }
}
?>

