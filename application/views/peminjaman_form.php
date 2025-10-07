<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman Alat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fc;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            margin-top: 15px;
        }
        select, input[type="date"], button {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        select:focus, input[type="date"]:focus {
            border-color: #3498db;
            outline: none;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-top: 8px;
        }
        .checkbox-group label {
            margin-left: 8px;
            font-weight: normal;
        }
        button {
            background: #3498db;
            color: #fff;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.3s;
            border: none;
        }
        button:hover {
            background: #2980b9;
        }
        .back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
        }
        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="<?= site_url('peminjaman'); ?>" class="back">← Kembali ke Daftar Peminjaman</a>
    <h2>Tambah Peminjaman Alat</h2>

    <form method="post" action="<?= site_url('peminjaman/simpan') ?>">
        <label>Mahasiswa:</label>
        <select name="id_mahasiswa" required>
            <option value="">-- Pilih Mahasiswa --</option>
            <?php foreach($mahasiswa as $m): ?>
                <option value="<?= $m->id_mahasiswa ?>"><?= $m->nama ?></option>
            <?php endforeach; ?>
        </select>

        <label>Alat:</label>
        <select name="id_alat" required>
            <option value="">-- Pilih Alat --</option>
            <?php foreach($alat as $a): ?>
                <option value="<?= $a->id_alat ?>"><?= $a->nama_alat ?></option>
            <?php endforeach; ?>
        </select>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required>

        <label>Tanggal Harus Kembali:</label>
        <input type="date" name="tanggal_kembali_expected" required>

        <label>Tanggal Kembali Aktual:</label>
        <input type="date" name="tanggal_kembali_actual" required>

        <div class="checkbox-group">
            <input type="checkbox" name="status_rusak" value="1" id="rusak">
            <label for="rusak">Apakah alat rusak?</label>
        </div>

        <button type="submit">Simpan Data</button>
    </form>
</div>

</body>
</html>
