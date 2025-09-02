<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 220px;
            background: #3A5AFE;
            color: white;
            padding-top: 20px;
            flex-shrink: 0;
        }
        .sidebar h2 {
            font-size: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            background: #f5f6fa;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>User Panel</h2>
        <a href="{{ route('user.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('user.layanan') }}">🛠️ Layanan</a>
        <form action="{{ route('logout') }}" method="POST" style="margin-top:20px; text-align:center;">
            @csrf
            <button type="submit" class="btn btn-light btn-sm">Logout</button>
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
