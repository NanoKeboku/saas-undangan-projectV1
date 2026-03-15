<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Preview Undangan</title>
    <link href="{{ asset('asset/bootstraps/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/homepage.css') }}" />
    
    <style>
        .wrapper { display: flex; height: 100vh; overflow: hidden; }
        .sidebar { width: 300px; background: #2c3e50; color: white; padding: 20px; flex-shrink: 0; }
        .content { flex: 1; overflow-y: auto; background: #fff; }
    </style>
</head>
<body>
    <div class="wrapper">
        <aside class="sidebar">
            <h4>Panel Editor</h4>
            <hr>
            <button class="btn btn-primary w-100 mb-2">Beli Template</button>
            <button class="btn btn-warning w-100">Edit Data</button>
        </aside>

        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>