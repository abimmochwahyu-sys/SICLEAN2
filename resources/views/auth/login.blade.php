<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SICLEAN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }
        .left {
            width: 50%;
            background: #3A5AFE;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .left h1 {
            font-size: 32px;
        }
        .right {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            width: 80%;
            max-width: 350px;
        }
        .login-box h2 {
            color: #8e44ad;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .login-box button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(90deg, #a18cd1, #fbc2eb);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="left">
        <h1>SICLEAN</h1>
    </div>
    <div class="right">
        <div class="login-box">
            <h2>Login Account</h2>
            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
