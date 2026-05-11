<!DOCTYPE html>
<html>
<head>
    <title>List Pesanan</title>
    <style>
        body {
            font-family: Arial;
            background: #f1f5f9;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            color: #1e3a8a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background: #1e3a8a;
            color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .top {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        a {
            text-decoration: none;
            background: #1e3a8a;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div style="margin-bottom: 15px;">
    <a href="/form-pemesanan">← Kembali ke Form</a>
</div>

<div class="container">

    <div class="top">
        <h2>List Pesanan (Pending)</h2>
    </div>

    <table>
        <tr>
            <th>Nama Pembeli</th>
            <th>Penanggung Jawab</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        {{-- nanti looping di sini --}}
        {{-- @forelse($pesanan as $item)
        <tr>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item['Penanggung Jawab'] }}</td>
            <td>{{ $item['Status'] }}</td>
            <td>Pending</td>
        </tr>
        @empty --}}
        <tr>
            <td colspan="4" style="text-align:center;">Belum ada pesanan</td>
        </tr>
        {{-- @endforelse --}}
        
    </table>

</div>

</body>
</html>