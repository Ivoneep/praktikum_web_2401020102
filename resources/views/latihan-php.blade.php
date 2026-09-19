<!DOCTYPE html>
<html>
<head>
    <title>Latihan PHP Dasar</title>
</head>
<body>

    <h1>Latihan PHP Dasar di Laravel</h1>

    <p>Nama: {{ $nama }}</p>

    <h2>Nilai</h2>

    <ul>
        @foreach ($nilai as $n)
            <li>{{ $n }}</li>
        @endforeach
    </ul>

    <p>Rata-rata: {{ number_format($rataRata, 2) }}</p>

    <p>Status: {{ $status }}</p>

</body>
</html>