<!DOCTYPE html>
<html>
<head>
    <title>Tambah Bahan Baku</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f7fb;
            padding: 20px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 650px;
            margin: auto;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
        }

        h2 {
            margin-bottom: 25px;
            color: #1e3a8a;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #334155;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #1e3a8a;
            box-shadow: 0 0 5px rgba(30,58,138,0.2);
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            background: #1e3a8a;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        button:hover {
            background: #3749a0;
        }

        .btn-back {
            display: inline-block;
            background: #1e3a8a;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-back:hover {
            background: #3749a0;
        }

        .btn-account {
            display: inline-block;
            background: #0f172a;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-account:hover {
            background: #1e293b;
        }

        .btn-list {
            background: #64748b;
            color: white;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            font-weight: bold;
        }

        .btn-list:hover {
            background: #475569;
        }
    </style>
</head>

<body>

<div class="topbar">
    <a href="/dashboard" class="btn-back">
        ← Kembali ke Dashboard
    </a>

    <a href="/akun-list" class="btn-account">
        Cek Akun
    </a>
</div>

<div class="container">

    <h2>Form Bahan Baku</h2>

    <form method="POST" action="/bahan-baku/store">
        @csrf
        <!-- nanti action diganti ke controller -->

        <div class="form-group">
            <label>Nama Bahan Baku</label>
            <input type="text" name="nama_bahan">
        </div>

        <div class="form-group">
    <label>Merk</label>

    <select name="merk">
        <option value="">-- Pilih Merk --</option>
        <option value="Trio Jaya">Trio Jaya</option>
        <option value="Sahabat Print">Sahabat Print</option>
        <option value="Makmur Stationary">Makmur Stationary</option>
        <option value="Toko Buku Baru">Toko Buku Baru</option>
        <option value="Data Teknik">Data Teknik</option>
        <option value="Master Print">Master Print</option>
        <option value="Jakarta Globalindo">Jakarta Globalindo</option>
        <option value="Purnama Percetakan">Purnama Percetakan</option>
    </select>
</div>

        <div class="form-group">
            <label>Update Terakhir</label>
            <input type="date" name="update_terakhir">
        </div>

        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli">
        </div>

        <div class="form-group">
            <label>Keterangan (optional)    </label>
            <textarea name="keterangan"></textarea>
        </div>

        <div class="btn-group">

            <button type="submit">
                Simpan
            </button>

            <a href="/bahan-baku/list" class="btn-list">
                List
            </a>

        </div>

    </form>

</div>

</body>
</html>