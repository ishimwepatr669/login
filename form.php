
<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $names = htmlspecialchars($_POST['names']);
    $email = htmlspecialchars($_POST['email']);
    $age = (int) $_POST['age'];
    $sex = htmlspecialchars($_POST['sex']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if ($age < 13) {
        $message = "Age must be at least 13.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
    } elseif (strlen($password) < 8) {
        $message = "Password must contain at least 8 characters.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $message = "Registration successful! Welcome " . $names;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Signup Form</h2>

    <form method="POST" action="">

        <label>Names</label>
        <input type="text" name="names"
               placeholder="Enter your names" required>

        <label>Email</label>
        <input type="email" name="email"
               placeholder="Enter your email" required>

        <label>Age</label>
        <input type="number" name="age"
               placeholder="Enter your age" min="13" required>

        <label>Sex</label>
        <select name="sex" required>
            <option value="">Select sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label>Username</label>
        <input type="text" name="username"
               placeholder="Enter username" required>

        <label>Password</label>
        <input type="password" name="password"
               placeholder="Enter password" required>

        <button type="submit">Sign Up</button>

    </form>

    <p><?php echo $message; ?></p>
</div>

</body>
</html>
