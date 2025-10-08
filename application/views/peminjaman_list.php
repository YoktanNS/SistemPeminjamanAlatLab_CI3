<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman Alat</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background: #f2f2f2; }
        a { text-decoration: none; padding: 4px 8px; background: #3498db; color: white; border-radius: 4px; }
        a.delete { background: #e74c3c; }
        a.edit { background: #f39c12; }
    </style>
</head>
<body>
    <h2>Data Peminjaman Alat</h2>
    <a href="<?= site_url('peminjaman/tambah'); ?>">+ Tambah Data</a><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Mahasiswa</th>
            <th>Alat</th>
            <th>Tgl Pinjam</th>
            <th>Harus Kembali</th>
            <th>Kembali</th>
            <th>Denda</th>
            <th>Biaya Perbaikan</th>
            <th>Total Biaya</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($peminjaman as $row): ?>
        <tr>
            <td><?= $row->id_peminjaman; ?></td>
            <td><?= $row->nama_mahasiswa; ?></td>
            <td><?= $row->nama_alat; ?></td>
            <td><?= $row->tanggal_pinjam; ?></td>
            <td><?= $row->tanggal_kembali_expected; ?></td>
            <td><?= $row->tanggal_kembali_actual; ?></td>
            <td><?= 'Rp ' . number_format($row->denda, 0, ',', '.'); ?></td>
            <td><?= 'Rp ' . number_format($row->biaya_perbaikan, 0, ',', '.'); ?></td>
            <td><?= 'Rp ' . number_format($row->total_biaya, 0, ',', '.'); ?></td>

            <td>
                <a href="<?= site_url('peminjaman/edit/'.$row->id_peminjaman); ?>" class="edit">Edit</a>
                <a href="<?= site_url('peminjaman/hapus/'.$row->id_peminjaman); ?>" class="delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
