<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lead</title>
</head>
<body>
<div style="display:flex; justify-content: space-between;">
    <button onclick="window.location.href='statuses.php'">View lead</button>
    <button style="color: #838080; opacity: 0.5" onclick="window.location.href='proxy.php'">API request</button>
</div>
<h1>Add Lead</h1>
<form action="api/api_functions.php" method="POST">
    <input type="text" name="firstName" placeholder="First Name" required>
    <input type="text" name="lastName" placeholder="Last Name" required>
    <input type="tel" name="phone" placeholder="Phone" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="submit" value="Submit">
    <input type="hidden" name="action" value="addlead">
</form>
</body>
</html>
