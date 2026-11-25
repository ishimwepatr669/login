
<?php
$message = "";
$messageColor = "green";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $names = htmlspecialchars(trim($_POST['names']));
    $email = htmlspecialchars(trim($_POST['email']));
    $age = (int) $_POST['age'];
    $sex = htmlspecialchars($_POST['sex']);
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    if ($age < 13) {
        $message = "Age must be at least 13!";
        $messageColor = "red";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address!";
        $messageColor = "red";

    } elseif (strlen($password) < 8) {
        $message = "Password must have at least 8 characters!";
        $messageColor = "red";

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

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #141e30, #243b55);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 430px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            color: #1877f2;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            outline: none;
            font-size: 15px;
        }

        input:focus, select:focus {
            border-color: #1877f2;
            box-shadow: 0 0 5px rgba(24,119,242,0.3);
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 25px;
            background: #1877f2;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0052cc;
            transform: translateY(-2px);
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        @media(max-width: 480px) {
            .container {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Create Account</h2>

    <form method="POST" action="">

        <label>Names</label>
        <input type="text" name="names"
               placeholder="Enter your names" required>

        <label>Email</label>
        <input type="email" name="email"
               placeholder="Enter your email" required>

        <label>Age</label>
        <input type="number" name="age"
               placeholder="Enter your age"
               min="13" required>

        <label>Sex</label>
        <select name="sex" required>
            <option value="">Select Sex</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label>Username</label>
        <input type="text" name="username"
               placeholder="Enter username" required>

        <label>Password</label>
        <input type="password" name="password"
               placeholder="Enter password" required>

        <button type="submit">SIGN UP</button>

    </form>

    <?php if ($message != ""): ?>
        <div class="message"
             style="color: <?php echo $messageColor; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
