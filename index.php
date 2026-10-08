<?php
require_once 'services/config.php';

$buku = $conn->query(
    'SELECT b.id_buku, b.judul, b.pengarang, b.tahun_terbit,
            k.nama_kategori, p.nama_penerbit
     FROM buku b
     JOIN kategori k ON b.id_kategori = k.id_kategori
     JOIN penerbit p ON b.id_penerbit = p.id_penerbit
     ORDER BY b.id_buku'
);
$kategori = $conn->query('SELECT * FROM kategori');
$penerbit = $conn->query('SELECT * FROM penerbit');
function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Kampus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <strong>Perpustakaan Kampus</strong>
        <div class="nav-links">
            <a href="#buku">Buku</a>
            <a href="#kategori">Kategori</a>
            <a href="#penerbit">Penerbit</a>
        </div>
    </nav>

    <main class="container">
        <section id="buku" class="card">
            <h2>Daftar Buku</h2>
            <div class="table-wrap">
            <table>
                <tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Tahun</th><th>Kategori</th><th>Penerbit</th></tr>
                <?php while ($row = $buku->fetch_assoc()) { ?>
                <tr>
                    <td><?= e($row['id_buku']) ?></td>
                    <td><?= e($row['judul']) ?></td>
                    <td><?= e($row['pengarang']) ?></td>
                    <td><?= e($row['tahun_terbit']) ?></td>
                    <td><?= e($row['nama_kategori']) ?></td>
                    <td><?= e($row['nama_penerbit']) ?></td>
                </tr>
                <?php } ?>
            </table>
            </div>
        </section>

        <div class="row">
            <section id="kategori" class="card">
                <h2>Kategori</h2>
                <div class="table-wrap">
                <table>
                    <tr><th>ID</th><th>Nama</th><th>Deskripsi</th></tr>
                    <?php while ($row = $kategori->fetch_assoc()) { ?>
                    <tr>
                        <td><?= e($row['id_kategori']) ?></td>
                        <td><?= e($row['nama_kategori']) ?></td>
                        <td><?= e($row['deskripsi']) ?></td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
            </section>

            <section id="penerbit" class="card">
                <h2>Penerbit</h2>
                <div class="table-wrap">
                <table>
                    <tr><th>ID</th><th>Nama</th><th>Kota</th><th>Berdiri</th></tr>
                    <?php while ($row = $penerbit->fetch_assoc()) { ?>
                    <tr>
                        <td><?= e($row['id_penerbit']) ?></td>
                        <td><?= e($row['nama_penerbit']) ?></td>
                        <td><?= e($row['kota']) ?></td>
                        <td><?= e($row['tahun_berdiri']) ?></td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
            </section>
        </div>
    </main>
    <?php $conn->close(); ?>
</body>
</html>
