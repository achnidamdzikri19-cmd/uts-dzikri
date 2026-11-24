<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pesanan Laundry') - Laundry</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:system-ui,sans-serif;background:#f4f6f9;color:#222}
        header{background:#1e3a8a;color:#fff;padding:16px 24px}
        header h1{margin:0;font-size:1.3rem}
        nav{background:#fff;border-bottom:1px solid #ddd;padding:10px 24px}
        nav a{margin-right:16px;text-decoration:none;color:#1e3a8a;font-weight:600}
        main{max-width:960px;margin:24px auto;padding:0 16px}
        footer{text-align:center;color:#666;padding:24px;font-size:.85rem}
        .card{background:#fff;padding:20px;border-radius:8px;box-shadow:0 1px 3px #0001}
        table{width:100%;border-collapse:collapse}
        th,td{padding:10px;border-bottom:1px solid #eee;text-align:left}
        th{background:#eef2ff}
        .btn{display:inline-block;padding:6px 12px;border:0;border-radius:4px;color:#fff;text-decoration:none;cursor:pointer;font-size:.85rem}
        .btn-primary{background:#1e3a8a}.btn-info{background:#0891b2}.btn-warn{background:#d97706}.btn-danger{background:#dc2626}.btn-gray{background:#6b7280}
        .alert{padding:12px 16px;border-radius:6px;margin-bottom:16px}
        .alert-success{background:#dcfce7;color:#166534}.alert-error{background:#fee2e2;color:#991b1b}.alert-info{background:#e0f2fe;color:#075985}
        label{display:block;margin:12px 0 4px;font-weight:600}
        input,select{width:100%;padding:8px;border:1px solid #ccc;border-radius:4px}
        .err{color:#dc2626;font-size:.85rem}
        form.inline{display:inline}
    </style>
</head>
<body>
    <header><h1>Sistem Laundry</h1></header>
    <nav>
        <a href="{{ route('pesanan.index') }}">Daftar Pesanan</a>
        <a href="{{ route('pesanan.create') }}">Tambah Pesanan</a>
    </nav>
    <main>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
    <footer>&copy; {{ date('Y') }} Sistem Laundry - Laravel</footer>
</body>
</html>
