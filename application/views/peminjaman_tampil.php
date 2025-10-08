<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Data Peminjaman Alat </title>
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
      <th>Action</th>
    </tr>

    <?php $no=1; foreach($peminjaman as $p): ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $p->nama_mahasiswa ?></td>
      <td><?php echo $p->nama_alat ?></td>
      <td><?php echo $p->tanggal_pinjam ?></td>
      <td><?php echo $p->tanggal_kembali_expected ?></td>
      <td><?php echo $p->tanggal_kembali_actual ?></td>
      <td><?php echo $p->denda ?></td>
      <td><?php echo $p->biaya_perbaikan ?></td>
      <td><?php echo $p->total_biaya ?></td>
      <td>
        <?php echo anchor('peminjaman/edit/'.$p->id, 'Edit'); ?> |
        <?php echo anchor('peminjaman/hapus/'.$p->id, 'Hapus'); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
