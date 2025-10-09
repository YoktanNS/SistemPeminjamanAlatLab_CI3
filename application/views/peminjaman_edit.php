<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Edit Peminjaman Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f6f8fc;">
<div class="container mt-5">
    <div class="card shadow p-4 border-0 rounded-4" style="max-width: 600px; margin: auto;">
        <a href="<?= site_url('peminjaman'); ?>" class="text-decoration-none mb-3 d-inline-block">
            ← Kembali ke Daftar Peminjaman
        </a>

        <h3 class="text-center mb-4 fw-bold">Edit Peminjaman Alat</h3>

        <form method="post" action="<?= site_url('peminjaman/update'); ?>">
            <input type="hidden" name="id_peminjaman" value="<?= $peminjaman->id_peminjaman; ?>">
            <input type="hidden" name="id_mahasiswa" value="<?= $peminjaman->id_mahasiswa; ?>">
            <input type="hidden" name="id_alat" value="<?= $peminjaman->id_alat; ?>">
            <input type="hidden" name="tanggal_pinjam" value="<?= $peminjaman->tanggal_pinjam; ?>">
            <input type="hidden" name="tanggal_kembali_expected" value="<?= $peminjaman->tanggal_kembali_expected; ?>">

            <!-- Mahasiswa -->
            <div class="mb-3">
                <label class="fw-bold">Mahasiswa:</label>
                <input type="text" class="form-control" value="<?= $peminjaman->nama_mahasiswa; ?>" readonly>
            </div>

            <!-- Alat -->
            <div class="mb-3">
                <label class="fw-bold">Alat:</label>
                <input type="text" class="form-control" value="<?= $peminjaman->nama_alat; ?>" readonly>
            </div>

            <!-- Tanggal Pinjam -->
            <div class="mb-3">
                <label class="fw-bold">Tanggal Pinjam:</label>
                <input type="date" class="form-control" value="<?= $peminjaman->tanggal_pinjam; ?>" readonly>
            </div>

            <!-- Tanggal Harus Kembali -->
            <div class="mb-3">
                <label class="fw-bold">Tanggal Harus Kembali:</label>
                <input type="date" class="form-control" value="<?= $peminjaman->tanggal_kembali_expected; ?>" readonly>
            </div>

            <!-- Tanggal Kembali Aktual -->
            <div class="mb-3">
                <label class="fw-bold">Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali_actual" class="form-control"
                       value="<?= $peminjaman->tanggal_kembali_actual; ?>" required>
            </div>

            <!-- Status Rusak -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="status_rusak" value="1"
                       <?= $peminjaman->biaya_perbaikan > 0 ? 'checked' : ''; ?>>
                <label class="form-check-label">Apakah alat rusak?</label>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn w-100 py-2" 
                    style="background-color: #f39c12; color: white; font-weight: 500;">
                Perbarui Data
            </button>
        </form>
    </div>
</div>
</body>
</html>
