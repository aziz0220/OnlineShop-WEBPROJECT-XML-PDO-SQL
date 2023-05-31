<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <form method="POST" action="signup_process.php">
    <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="address">Zip Code</label>
                <input type="text" id="address" name="address" required>
            </div>
            <input type="submit" name="register" value="Sign Up" class="btn">
    </form>
</body>
</html>