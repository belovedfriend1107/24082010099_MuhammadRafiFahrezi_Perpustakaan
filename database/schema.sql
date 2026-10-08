CREATE DATABASE IF NOT EXISTS db_perpustakaan;
USE db_perpustakaan;

DROP TABLE IF EXISTS buku;
DROP TABLE IF EXISTS kategori;
DROP TABLE IF EXISTS penerbit;

CREATE TABLE kategori (
    id_kategori INT PRIMARY KEY AUTO_INCREMENT,
    nama_kategori VARCHAR(50) NOT NULL,
    deskripsi VARCHAR(150)
);

CREATE TABLE penerbit (
    id_penerbit INT PRIMARY KEY AUTO_INCREMENT,
    nama_penerbit VARCHAR(100) NOT NULL,
    kota VARCHAR(50),
    tahun_berdiri INT
);

CREATE TABLE buku (
    id_buku INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(150) NOT NULL,
    pengarang VARCHAR(100) NOT NULL,
    tahun_terbit INT,
    id_kategori INT,
    id_penerbit INT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori),
    FOREIGN KEY (id_penerbit) REFERENCES penerbit(id_penerbit)
);

INSERT INTO kategori (nama_kategori, deskripsi) VALUES
('Pemrograman', 'Buku tentang bahasa dan logika pemrograman'),
('Basis Data', 'Buku tentang perancangan dan pengelolaan data'),
('Jaringan', 'Buku tentang jaringan komputer dan keamanan'),
('Sistem Informasi', 'Buku tentang analisis dan perancangan sistem'),
('Desain Web', 'Buku tentang antarmuka dan pengalaman pengguna');

INSERT INTO penerbit (nama_penerbit, kota, tahun_berdiri) VALUES
('Informatika Bandung', 'Bandung', 1990),
('Andi Offset', 'Yogyakarta', 1980),
('Elex Media Komputindo', 'Jakarta', 1985),
('Graha Ilmu', 'Yogyakarta', 1998),
('Deepublish', 'Yogyakarta', 2010);

INSERT INTO buku (judul, pengarang, tahun_terbit, id_kategori, id_penerbit) VALUES
('Belajar PHP dan MySQL', 'Budi Raharjo', 2021, 1, 1),
('Dasar Pemrograman Web', 'Sari Wulandari', 2020, 1, 2),
('Perancangan Basis Data', 'Hendra Saputra', 2019, 2, 1),
('Mahir SQL dalam 7 Hari', 'Dewi Lestari', 2022, 2, 3),
('Jaringan Komputer untuk Pemula', 'Agus Prasetyo', 2018, 3, 4),
('Analisis dan Perancangan Sistem', 'Rina Marlina', 2021, 4, 2),
('Git dan GitHub untuk Tim', 'Fajar Nugroho', 2023, 1, 5),
('UI/UX dan CSS Responsif', 'Maya Anggraini', 2022, 5, 3);
