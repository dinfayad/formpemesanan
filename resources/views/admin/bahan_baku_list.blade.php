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
            border: none;
            cursor: pointer;
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

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }

        .modal-content {
            background: white;
            width: 450px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 25px;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 13px;
            color: #374151;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input[readonly] {
            background: #e2e8f0;
            cursor: not-allowed;
        }

        .btn-save {
            width: 100%;
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        .btn-save:hover {
            background: #3749a0;
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
        <span class="badge">Total Data: {{ $data->count() }}</span>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Bahan Baku</th>
            <th>Jenis</th>
            <th>Ukuran</th>
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
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->ukuran }}</td>
            <td>{{ $item->merk }}</td>
            <td>{{ $item->supplier }}</td>
            <td>{{ $item->update_terakhir }}</td>
            <td>Rp {{ number_format($item->harga_beli) }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>
                <div class="aksi">

                    <button
                        type="button"
                        class="btn-edit"
                        onclick="openEditModal(
                            '{{ $item->id }}',
                            '{{ addslashes($item->nama_bahan) }}',
                            '{{ addslashes($item->jenis) }}',
                            '{{ addslashes($item->ukuran) }}',
                            '{{ addslashes($item->merk) }}',
                            '{{ addslashes($item->supplier) }}',
                            '{{ $item->update_terakhir }}',
                            '{{ $item->harga_beli }}',
                            '{{ addslashes($item->keterangan) }}'
                        )">
                        Edit
                    </button>

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
            <td colspan="10" style="text-align:center; padding:20px;">
                Belum ada data bahan baku
            </td>
        </tr>
        @endforelse

    </table>

</div>

<!-- POPUP EDIT -->
<div id="editModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeEditModal()">&times;</span>

        <h3 style="margin-bottom: 20px; color: #1e3a8a;">Edit Bahan Baku</h3>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Bahan Baku</label>
                <input type="text" name="nama_bahan" id="editNama" readonly>
            </div>

            <div class="form-group">
                <label>Jenis</label>
                <input type="text" name="jenis" id="editJenis" readonly>
            </div>

            <div class="form-group">
                <label>Ukuran</label>
                <input type="text" name="ukuran" id="editUkuran" readonly>
            </div>

            <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" id="editMerk" readonly>
            </div>

            <div class="form-group">
                <label>Supplier</label>
                <input type="text" name="supplier" id="editSupplier" readonly>
            </div>

            <div class="form-group">
                <label>Update Terakhir</label>
                <input type="date" name="update_terakhir" id="editUpdate">
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" id="editHarga">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" id="editKeterangan" rows="3"></textarea>
            </div>

            <button type="submit" class="btn-save">Simpan</button>

        </form>

    </div>

</div>

<script>

function openEditModal(id, nama, jenis, ukuran, merk, supplier, updateTerakhir, harga, keterangan) {

    document.getElementById("editModal").style.display = "block";

    document.getElementById("editNama").value       = nama;
    document.getElementById("editJenis").value      = jenis;
    document.getElementById("editUkuran").value     = ukuran;
    document.getElementById("editMerk").value       = merk;
    document.getElementById("editSupplier").value   = supplier;
    document.getElementById("editUpdate").value     = updateTerakhir;
    document.getElementById("editHarga").value      = harga;
    document.getElementById("editKeterangan").value = keterangan;

    document.getElementById("editForm").action = "/bahan-baku/update/" + id;
}

function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}

window.onclick = function(event) {
    let modal = document.getElementById("editModal");
    if (event.target == modal) {
        closeEditModal();
    }
}

</script>

</body>
</html>