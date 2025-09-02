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
            overflow: hidden;
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
            font-size: 36px;
            letter-spacing: 2px;
            animation: slideIn 1s ease-out;
        }
        .right {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Gradient + pola pattern */
            background: linear-gradient(135deg, #f8f9ff 0%, #e6e9ff 100%);
            position: relative;
            overflow: hidden;
        }
        /* Pattern lingkaran transparan */
        .right::before {
            content: "";
            position: absolute;
            width: 200%;
            height: 200%;
            background-image: radial-gradient(circle, rgba(58, 90, 254, 0.05) 20%, transparent 20%);
            background-size: 60px 60px;
            animation: movePattern 20s linear infinite;
        }
        @keyframes movePattern {
            from { transform: translate(0, 0); }
            to { transform: translate(-60px, -60px); }
        }

        .login-box {
            width: 80%;
            max-width: 350px;
            text-align: center;
            animation: fadeIn 1.2s ease-out;
            position: relative;
            z-index: 2;
        }
        .login-box h2 {
            color: #3A5AFE;
            margin-bottom: 20px;
            animation: dropIn 1s ease-out;
        }
        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .login-box input:focus {
            border-color: #3A5AFE;
            box-shadow: 0 0 8px rgba(58, 90, 254, 0.4);
            outline: none;
        }
        .login-box button {
            width: 100%;
            padding: 12px;
            background: #3A5AFE;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        .login-box button:hover {
            background: #2c47d6;
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(58, 90, 254, 0.4);
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes dropIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
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
