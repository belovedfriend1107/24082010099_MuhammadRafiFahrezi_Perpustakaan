# Perpustakaan Kampus (PHP + MySQL)

Website sederhana yang menampilkan data buku, kategori, dan penerbit secara dinamis dari MySQL menggunakan PHP.

## Cara Menjalankan
1. Jalankan Laragon (Start All), pastikan Apache dan MySQL aktif.
2. Buka DBeaver, koneksi ke MySQL (localhost, port 3306, user `root`, password kosong).
3. Jalankan isi `database/schema.sql` (database `db_perpustakaan` akan dibuat otomatis).
4. Salin folder project ke `C:\laragon\www\`.
5. Buka `http://localhost/NPM_Nama_Perpustakaan/`.
6. Jika port MySQL bukan 3306, ubah `$port` di `services/config.php`.

## Entitas dan Atribut
| Entitas | Atribut (PK **tebal**, FK _miring_) |
|---|---|
| kategori | **id_kategori**, nama_kategori, deskripsi |
| penerbit | **id_penerbit**, nama_penerbit, kota, tahun_berdiri |
| buku | **id_buku**, judul, pengarang, tahun_terbit, _id_kategori_, _id_penerbit_ |

## Relasi dan Kardinalitas
- kategori **1 : N** buku (satu kategori punya banyak buku, satu buku punya satu kategori)
- penerbit **1 : N** buku (satu penerbit menerbitkan banyak buku, satu buku punya satu penerbit)

## Struktur Project
```
services/config.php   koneksi database
database/schema.sql   struktur tabel dan data
index.php             halaman utama
style.css             tampilan
```
