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
        .left img {
            width: 200px;
        }
        .left h1 {
            margin-top: 10px;
            font-size: 28px;
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
            margin-bottom: 5px;
        }
        .login-box p {
            color: #aaa;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .login-box .remember {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .login-box button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(90deg, #a18cd1, #fbc2eb);
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-box a {
            font-size: 14px;
            color: #8e44ad;
            text-decoration: none;
        }
        .login-box .footer {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="left">
        {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
        <h1>SICLEAN</h1>
    </div>
    <div class="right">
        <div class="login-box">
            <h2>Login Account</h2>
            <p>Please enter your username and password.</p>
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <input type="password" name="password" placeholder="Password" required>
                {{-- <div class="remember">
                    <input type="checkbox" name="remember"> Remember Me
                </div> --}}
                <button type="submit"><a href="../layanan">login</a></button>
            </form>
            {{-- <div class="footer">
                <p>Belum punya akun? <a href="#">Daftar</a></p>
            </div> --}}
        </div>
    </div>
</body>
</html>
