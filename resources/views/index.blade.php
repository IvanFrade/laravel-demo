<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: flex; flex-direction: column; gap: 20px;">
    <div style="border: 3px solid black; padding: 12px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black; padding: 12px;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="login-username" placeholder="Username">
            <input type="password" name="login-psw">
            <button>Log In</button>
        </form>
    </div>
</body>
</html>