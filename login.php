<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <form method="POST" action="login_process.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required><br><br>
        
        <input type="submit" value="Log In">
    </form>
</body>
</html>