<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan</title>
    <style>
        body {
            font-family: Arial;
            background: #eee;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border: 1px solid #000;
        }

        .row {
            display: flex;
            margin-bottom: 8px;
        }

        .label {
            width: 200px;
        }

        input {
            flex: 1;
            border: none;
            border-bottom: 1px solid black;
        }

        .section-title {
            background: #1e3a5f;
            color: white;
            padding: 5px;
            margin: 15px 0;
        }

        .two-col {
            display: flex;
            gap: 20px;
        }

        .col {
            flex: 1;
        }

        select {
            flex: 1;
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
        }

        span {
            align-self: center;
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
    </style>
</head>
<body>

<div style="margin-bottom: 15px;">
    <a href="/dashboard" class="btn-back">← Kembali ke Dashboard</a>
</div>

<div class="container">

    <div class="row">
        <div class="label">Konsumen</div>
        <input type="text" placeholder="Lama">
        <input type="text" placeholder="IPB">
    </div>

    <div class="row">
        <div class="label">Nama</div>
        <input type="text" value="Leo">
    </div>

    <div class="row">
        <div class="label">Alamat</div>
        <input type="text">
    </div>

    <div class="row">
        <div class="label">No. Tlp/HP</div>
        <input type="text">
    </div>

    <div class="two-col">
        <div class="col">
            <div class="row">
                <div class="label">Penanggung Jawab</div>   
                <input type="text" value="Penanggung Jawab">
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="label">Email</div>
                <input type="text">
            </div>
            <div class="row">
                <div class="label">No Telp</div>
                <input type="text">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="label">Judul Buku</div>
        <input type="text" value="Trik Ngonten Tiktok dari 0 sampai FYP">
    </div>

    <div class="two-col">
        <div class="col">
            <div class="row">
                <div class="label">Penulis</div>
                <input type="text">
            </div>

            <div class="row">
                <div class="label">Kategori</div>
                <input type="text">
            </div>

            <div class="row">
                <div class="label">Tahun Terbit</div>
                <input type="text" value="2023">
            </div>

            <div class="row">
                <div class="label">Bulan Terbit</div>
                <input type="text" value="Juli">
            </div>

            <div class="row">
                <div class="label">Cetakan ke</div>
                <input type="text" value="1">
            </div>
        </div>

        <div class="col">
            <div class="row">
                <div class="label">Edisi ke</div>
                <input type="text">
            </div>

            <div class="row">
                <div class="label">ISBN</div>
                <input type="text">
            </div>

            <div class="row">
                <div class="label">Tahun</div>
                <input type="text">
            </div>
        </div>
    </div>

    <div class="section-title">SPESIFIKASI</div>

<div class="two-col">
    <!-- KIRI -->
    <div class="col">
        <div class="row">
            <div class="label">Ukuran</div>
            <input type="text" value="15">
            <span style="margin:0 5px">X</span>
            <input type="text" value="23">
            <span style="margin-left:5px">cm</span>
        </div>

        <div class="row">
            <div class="label">Cover</div>
            <input type="text" value="Art Carton 230 gram 1 muka 4/0 Doff">
        </div>

        <div class="row">
            <div class="label">Konten</div>
            <input type="text" value="Bookpaper 70 gram 2 muka">
        </div>
    </div>

    <!-- KANAN -->
    <div class="col">
        <div class="row">
            <div class="label">Halaman</div>
            <input type="text" value="BW">
            <input type="text" value="154" style="max-width:60px">
            <input type="text" value="FC" style="max-width:60px">
        </div>

        <div class="row">
            <div class="label">Keterangan FC</div>
            <input type="text">
        </div>

        <div class="row">
            <div class="label">Finishing</div>
            <input type="text" value="Jilid Lem">
        </div>
    </div>
</div>

<!-- DETAIL FINISHING -->
<div class="two-col">
    <div class="col">
        <div class="row">
            <div class="label">- Spot UV</div>
            <select>
                <option>TIDAK</option>
                <option>YA</option>
            </select>
        </div>

        <div class="row">
            <div class="label">- Emboss</div>
            <select>
                <option>TIDAK</option>
                <option>YA</option>
            </select>
        </div>

        <div class="row">
            <div class="label">- Poly/Hotprint</div>
            <select>
                <option>TIDAK</option>
                <option>YA</option>
            </select>
        </div>
    </div>

    <div class="col">
        <div class="row">
            <div class="label">- Shrink</div>
            <select>
                <option>YA</option>
                <option>TIDAK</option>
            </select>
        </div>

        <div class="row">
            <div class="label">- Packing</div>
            <select>
                <option>YA</option>
                <option>TIDAK</option>
            </select>
        </div>
    </div>
</div>
<div style="margin-bottom: 15px;">
    <a href="/listpending" class="btn-back">List Pending</a>
</div>
</div>

</body>
</html>