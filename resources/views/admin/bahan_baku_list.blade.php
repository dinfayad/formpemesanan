<!DOCTYPE html>
<html>
<head>
    <title>List Bahan Baku</title>

    <style>
        body {
            font-family: Arial;
            background: #f1f5f9;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
            overflow-x: auto;
        }

        h2 {
            color: #1e3a8a;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            min-width: 1200px;
        }

        table, th, td {
            border: 1px solid #dbeafe;
        }

        th {
            background: #1e3a8a;
            color: white;
            font-size: 14px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(even) {
            background: #f8fafc;
        }

        tr:hover {
            background: #eff6ff;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn-back {
            text-decoration: none;
            background: #1e3a8a;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 15px;
        }

        .btn-back:hover {
            background: #3749a0;
        }

        .badge {
            background: #e2e8f0;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .aksi {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

<div style="margin-bottom: 15px;">
    <a href="/bahan-baku/create" class="btn-back">
        ← Kembali
    </a>
</div>

<div class="container">

    <div class="top">
        <h2>Data Bahan Baku</h2>

        <span class="badge">
            Total Data: 0
        </span>
    </div>

    <table>

        <tr>
            <th>No</th>
            <th>Nama Bahan Baku</th>
            <th>Merk</th>
            <th>Supplier</th>
            <th>Update Terakhir</th>
            <th>Harga Beli</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @forelse($data as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama_bahan }}</td>
            <td>{{ $item->merk }}</td>
            <td>{{ $item->supplier }}</td>
            <td>{{ $item->update_terakhir }}</td>
            <td>Rp {{ number_format($item->harga_beli) }}</td>
            <td>{{ $item->keterangan }}</td>

            <td>
                <div class="aksi">

                    <a href="/bahan-baku/edit/{{ $item->id }}" class="btn-edit">
                        Edit
                    </a>

                    <form action="/bahan-baku/delete/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </button>
                    </form>

                </div>
            </td>
        </tr>
        @empty

        <tr>
            <td colspan="8" style="text-align:center; padding:20px;">
                Belum ada data bahan baku
            </td>
        </tr>

        @endforelse

    </table>

</div>

</body>
</html>