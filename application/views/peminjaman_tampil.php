<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Data Peminjaman Alat</title>
</head>
<body>
  <center><h1>Daftar Peminjaman Alat Laboratorium</h1></center>
  <center><?php echo anchor('peminjaman/tambah', 'Tambah Data'); ?></center>

  <table border="1" style="margin:20px auto; border-collapse: collapse;" cellpadding="6">
    <tr>
      <th>No</th>
      <th>Nama Mahasiswa</th>
      <th>Nama Alat</th>
      <th>Tanggal Pinjam</th>
      <th>Harus Kembali</th>
      <th>Tanggal Kembali</th>
      <th>Denda</th>
      <th>Biaya Perbaikan</th>
      <th>Total Biaya</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

    <?php $no = 1; foreach ($peminjaman as $p): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $p->nama_mahasiswa ?></td>
      <td><?= $p->nama_alat ?></td>
      <td><?= $p->tanggal_pinjam ?></td>
      <td><?= $p->tanggal_kembali_expected ?></td>
      <td><?= $p->tanggal_kembali_actual ?: '-' ?></td>
      <td><?= 'Rp ' . number_format($p->denda, 0, ',', '.') ?></td>
      <td><?= 'Rp ' . number_format($p->biaya_perbaikan, 0, ',', '.') ?></td>
      <td><?= 'Rp ' . number_format($p->total_biaya, 0, ',', '.') ?></td>
      <td>
        <?php if (empty($p->tanggal_kembali_actual)): ?>
          <span style="color:red;">Dipinjam</span>
        <?php else: ?>
          <span style="color:green;">Dikembalikan</span>
        <?php endif; ?>
      </td>
      <td>
        <?php echo anchor('peminjaman/edit/'.$p->id_peminjaman, 'Edit'); ?> |
        <?php echo anchor('peminjaman/hapus/'.$p->id_peminjaman, 'Hapus', ['onclick' => "return confirm('Yakin hapus data ini?')"]); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
