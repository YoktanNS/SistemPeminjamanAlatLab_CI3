<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Form Pengembalian Alat</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="mx-auto shadow p-4 bg-white rounded-4" style="max-width: 600px;">
      <a href="<?= site_url('peminjaman'); ?>" class="text-muted mb-3 d-block text-decoration-none">
        ← Kembali ke Daftar Peminjaman
      </a>

      <h3 class="text-center fw-bold mb-4">Form Pengembalian Alat</h3>

      <form method="post" action="<?= site_url('peminjaman/simpan_pengembalian'); ?>">

        <input type="hidden" name="id_peminjaman" value="<?= $peminjaman->id_peminjaman; ?>">
        <input type="hidden" name="tanggal_kembali_expected" value="<?= $peminjaman->tanggal_kembali_expected; ?>">

        <div class="mb-3">
          <label class="form-label fw-semibold">Mahasiswa:</label>
          <input type="text" class="form-control" value="<?= $peminjaman->nama_mahasiswa; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Alat:</label>
          <input type="text" class="form-control" value="<?= $peminjaman->nama_alat; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal Harus Kembali:</label>
          <input type="date" class="form-control" value="<?= $peminjaman->tanggal_kembali_expected; ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Tanggal Kembali:</label>
          <input type="date" name="tanggal_kembali_actual" class="form-control" required>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" name="status_rusak" value="1" id="statusRusak">
          <label class="form-check-label" for="statusRusak">Apakah alat rusak?</label>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2">Simpan Pengembalian</button>
      </form>
    </div>
  </div>

</body>
</html>
