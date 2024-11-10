<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengurus BEM</title>
</head>
<body>
    <h2>Login Pengurus BEM</h2>
    <?php if (isset($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    <form action="index.php?action=loginAccount" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
