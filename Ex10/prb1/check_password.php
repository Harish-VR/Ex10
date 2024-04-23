<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];

    $errors = [];

    // Check length
    if (strlen($password) < 8) {
        $errors[] = "Password should be at least 8 characters long.";
    }

    // Check for uppercase letters
    if (!preg_match("/[A-Z]/", $password)) {
        $errors[] = "Password should contain at least one uppercase letter.";
    }

    // Check for lowercase letters
    if (!preg_match("/[a-z]/", $password)) {
        $errors[] = "Password should contain at least one lowercase letter.";
    }

    // Check for numbers
    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Password should contain at least one number.";
    }

    // Check for special characters
    if (!preg_match("/[!@#$%^&*()-_=+{};:,<.>]/", $password)) {
        $errors[] = "Password should contain at least one special character.";
    }

    // Output result
    if (empty($errors)) {
        echo "Password strength: Strong";
    } else {
        echo "Password strength: Weak<br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }
}
?>
