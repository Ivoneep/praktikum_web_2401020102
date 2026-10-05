<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

// ==========================================
// PERTEMUAN 3 - FORM MAHASISWA
// ==========================================

// Route GET untuk menampilkan form
Route::get('/form-mahasiswa', function () {
    return view('form-mahasiswa');
});

// Route POST untuk memproses data form
Route::post('/form-mahasiswa', function (Request $request) {

    // Sanitasi input
    $dataBersih = [
        'nama' => strip_tags(trim((string) $request->input('nama'))),

        'email' => filter_var(
            (string) $request->input('email'),
            FILTER_SANITIZE_EMAIL
        ),

        'usia' => trim((string) $request->input('usia')),

        'nim' => trim((string) $request->input('nim')),
    ];

    // Validasi server-side
    $validator = Validator::make($dataBersih, [
        'nama' => ['required', 'min:3', 'max:50'],

        'email' => ['required', 'email'],

        'usia' => ['required', 'integer', 'min:17', 'max:60'],

        'nim' => ['required', 'digits_between:8,12'],
    ], [
        'nama.required' => 'Nama wajib diisi.',
        'nama.min' => 'Nama minimal 3 karakter.',
        'nama.max' => 'Nama maksimal 50 karakter.',

        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',

        'usia.required' => 'Usia wajib diisi.',
        'usia.integer' => 'Usia harus berupa angka.',
        'usia.min' => 'Usia minimal 17 tahun.',
        'usia.max' => 'Usia maksimal 60 tahun.',

        'nim.required' => 'NIM wajib diisi.',
        'nim.digits_between' => 'NIM harus terdiri dari 8 sampai 12 digit.',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return redirect('/form-mahasiswa')
            ->withErrors($validator)
            ->withInput();
    }

    // Mengambil data yang sudah lolos validasi
    $data = $validator->validated();

    // Mengubah usia menjadi integer
    $data['usia'] = (int) $data['usia'];

    // Menampilkan halaman hasil
    return view('hasil-form', ['data' => $data]);
});