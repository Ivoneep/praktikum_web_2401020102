USE praktikum_web_2401020102;

-- Memasukkan 2 program studi
INSERT INTO program_studi (nama_prodi) VALUES
('Teknik Informatika'),
('Sistem Informasi');

-- Memasukkan 4 data mahasiswa
INSERT INTO mahasiswa
(nim, nama, email, usia, program_studi_id)
VALUES
('2401020102', 'Ivone Purba', 'ivone@example.com', 21, 1),
('2401020103', 'Nur Indah', 'nurin@example.com', 20, 1),
('2401020104', 'Sasta Tania', 'sastan@example.com', 22, 2),
('2401020199', 'Salsa Nabilla', 'salsa@example.com', 19, 2);

-- Mengubah email mahasiswa
UPDATE mahasiswa
SET email = 'ivone.purba@example.com'
WHERE nim = '2401020102';

-- Menghapus data sementara
DELETE FROM mahasiswa
WHERE nim = '2401020199';

-- Menampilkan data mahasiswa beserta program studi
SELECT m.nim, m.nama, m.email, m.usia,
       p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p
ON p.id = m.program_studi_id
ORDER BY m.nim;