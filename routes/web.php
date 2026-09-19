<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/latihan-php', function () {
    $nama = 'Ivone Purba';

    $nilai = [80, 75, 90, 85, 70];

    $hitungRataRata = function ($data) {
        return array_sum($data) / count($data);
    };

    $rataRata = $hitungRataRata($nilai);

    if ($rataRata >= 75) {
        $status = 'Lulus';
    } else {
        $status = 'Tidak Lulus';
    }

    return view('latihan-php', compact(
        'nama',
        'nilai',
        'rataRata',
        'status'
    ));
});