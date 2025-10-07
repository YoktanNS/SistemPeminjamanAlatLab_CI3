<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman</title>
</head>
<body>
    <h2>Edit Data Peminjaman</h2>
    <form action="<?= site_url('peminjaman/update'); ?>" method="post">
        <input type="hidden" name="id_peminjaman" value="<?= $peminjaman->id_peminjaman; ?>">

        <label>Mahasiswa:</label>
        <select name="id_mahasiswa" required>
            <?php foreach ($mahasiswa as $m): ?>
                <option value="<?= $m->id_mahasiswa; ?>" <?= ($peminjaman->id_mahasiswa == $m->id_mahasiswa) ? 'selected' : ''; ?>>
                    <?= $m->nama; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Alat:</label>
        <select name="id_alat" required>
            <?php foreach ($alat as $a): ?>
                <option value="<?= $a->id_alat; ?>" <?= ($peminjaman->id_alat == $a->id_alat) ? 'selected' : ''; ?>>
                    <?= $a->nama_alat; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" value="<?= $peminjaman->tanggal_pinjam; ?>" required><br><br>

        <label>Tanggal Harus Kembali:</label>
        <input type="date" name="tanggal_kembali_expected" value="<?= $peminjaman->tanggal_kembali_expected; ?>" required><br><br>

        <label>Tanggal Kembali Aktual:</label>
        <input type="date" name="tanggal_kembali_actual" value="<?= $peminjaman->tanggal_kembali_actual; ?>" required><br><br>

        <label>Apakah alat rusak?</label>
        <input type="checkbox" name="status_rusak" value="1" <?= ($peminjaman->biaya_perbaikan > 0) ? 'checked' : ''; ?>> Ya<br><br>

        <button type="submit">Perbarui</button>
    </form>
</body>
</html>
