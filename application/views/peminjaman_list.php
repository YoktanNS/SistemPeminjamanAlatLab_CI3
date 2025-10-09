<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Data Peminjaman Alat</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

  <div class="container">
    <h2 class="fw-bold mb-4">Data Peminjaman Alat</h2>

    <a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">+ Tambah Data</a>

    <table class="table table-bordered table-hover text-center align-middle">
      <thead class="table-light">
        <tr>
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
      </thead>

      <tbody>
        <?php foreach ($peminjaman as $p): ?>
        <tr>
          <td><?= $p->nama_mahasiswa; ?></td>
          <td><?= $p->nama_alat; ?></td>
          <td><?= $p->tanggal_pinjam; ?></td>
          <td><?= $p->tanggal_kembali_expected; ?></td>
          <td><?= $p->tanggal_kembali_actual ? $p->tanggal_kembali_actual : '-'; ?></td>
          <td>Rp <?= number_format($p->denda, 0, ',', '.'); ?></td>
          <td>Rp <?= number_format($p->biaya_perbaikan, 0, ',', '.'); ?></td>
          <td>Rp <?= number_format($p->total_biaya, 0, ',', '.'); ?></td>
          <td>
            <?php if (empty($p->tanggal_kembali_actual)): ?>
              <a href="<?= site_url('peminjaman/pengembalian/'.$p->id_peminjaman); ?>" class="btn btn-sm btn-primary">Kembalikan</a>
            <?php else: ?>
              <button class="btn btn-sm btn-secondary" disabled>Sudah Dikembalikan</button>
            <?php endif; ?>

            <a href="<?= site_url('peminjaman/edit/'.$p->id_peminjaman); ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="<?= site_url('peminjaman/hapus/'.$p->id_peminjaman); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
