<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/app.css">
</head>

<body>
<div id="login_msg"></div>
<div class="instructions">
    Login Below
</div>
<form id="login_form" action="../emp_api.php" method="POST">
    <div>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="">
    </div>
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value="">
    </div>    
    <div>
        <input type="Submit" value="Submit">
        <input id="req_type" type="hidden" name="req_type" value="doLogin">
        <input id="obj" type="hidden" name="obj" value="auth">
    </div>
</form>
</body>

</html>