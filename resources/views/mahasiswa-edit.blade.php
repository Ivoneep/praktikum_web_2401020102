
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
</head>
<body>
    <h1>Ubah Mahasiswa</h1>

    @if (session('gagal'))
        <p>{{ session('gagal') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form
        action="{{ route('mahasiswa.update', $mahasiswa['id']) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <p>
            NIM<br>
            <input
                type="text"
                name="nim"
                maxlength="20"
                value="{{ old('nim', $mahasiswa['nim']) }}"
                required
            >
        </p>

        <p>
            Nama<br>
            <input
                type="text"
                name="nama"
                maxlength="100"
                value="{{ old('nama', $mahasiswa['nama']) }}"
                required
            >
        </p>

        <p>
            Email<br>
            <input
                type="email"
                name="email"
                maxlength="100"
                value="{{ old('email', $mahasiswa['email']) }}"
                required
            >
        </p>

        <p>
            Usia<br>
            <input
                type="number"
                name="usia"
                min="15"
                max="100"
                value="{{ old('usia', $mahasiswa['usia']) }}"
                required
            >
        </p>

        <p>
            Program Studi<br>
            <select name="program_studi_id" required>
                <option value="">-- Pilih Program Studi --</option>

                @foreach ($daftarProgramStudi as $programStudi)
                    <option
                        value="{{ $programStudi['id'] }}"
                        @selected(
                            old(
                                'program_studi_id',
                                $mahasiswa['program_studi_id']
                            ) == $programStudi['id']
                        )
                    >
                        {{ $programStudi['nama_prodi'] }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('mahasiswa.index') }}">Kembali</a>
    </form>
</body>
</html>
