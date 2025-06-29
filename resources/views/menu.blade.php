<!DOCTYPE html>
<html>
<head>
    <title>Menu Ngopikuy</title>
</head>
<body>
    <h1>Daftar Menu Ngopikuy</h1>
    <ul>
        @foreach($menus as $menu)
            <li>{{ $menu['nama'] }} - Rp{{ number_format($menu['harga'], 0, ',', '.') }}</li>
        @endforeach
    </ul>
</body>
</html>
