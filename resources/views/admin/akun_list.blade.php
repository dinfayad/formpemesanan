<!DOCTYPE html>
<html>
<head>
    <title>List Akun</title>

    <style>
        body{
            font-family: Arial;
            background:#f1f5f9;
            padding:20px;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .btn-back{
            background:#1e3a8a;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
            font-size:14px;
        }

        .btn-back:hover{
            background:#3749a0;
        }

        .btn-add{
            background:#0f172a;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
            font-size:14px;
        }

        .btn-add:hover{
            background:#1e293b;
        }

        .container{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h2{
            margin-bottom:20px;
            color:#1e3a8a;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#1e3a8a;
            color:white;
            padding:12px;
            text-align:left;
        }

        table td{
            padding:12px;
            border-bottom:1px solid #ddd;
        }

        table tr:hover{
            background:#f8fafc;
        }

        .btn-edit{
            background:#f59e0b;
            color:white;
            padding:6px 10px;
            border-radius:5px;
            text-decoration:none;
            font-size:13px;
        }

        .btn-delete{
            background:#dc2626;
            color:white;
            padding:6px 10px;
            border-radius:5px;
            text-decoration:none;
            font-size:13px;
        }

        .btn-edit:hover{
            background:#d97706;
        }

        .btn-delete:hover{
            background:#b91c1c;
        }

        .btn-detail{
            background:#0ea5e9;
            color:white;
            padding:6px 10px;
            border-radius:5px;
            text-decoration:none;
            font-size:13px;
            display:inline-block;
            transition:0.3s;
        }

        .btn-detail:hover{
            background:#0284c7;
        }

        .modal{
    display:none;
    position:fixed;
    z-index:999;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
}

.modal-content{
    background:white;
    width:400px;
    padding:25px;
    border-radius:10px;
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
}

.modal-content h3{
    margin-bottom:20px;
    color:#1e3a8a;
}

.close{
    float:right;
    font-size:24px;
    cursor:pointer;
}

.form-group{
    margin-bottom:15px;
}

.form-group label{
    display:block;
    margin-bottom:5px;
}

.form-group input,
.form-group select{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

.delete-box{
    text-align:center;
}

.delete-action{
    margin-top:20px;
    display:flex;
    gap:10px;
}

.btn-cancel{
    background:#64748b;
}

.btn-delete-confirm{
    background:#dc2626;
}

.btn-cancel,
.btn-delete-confirm{
    flex:1;
    border:none;
    color:white;
    padding:10px;
    border-radius:5px;
    cursor:pointer;
}

.password-box{
    position:relative;
}

.password-box span{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    font-size:14px;
    color:#1e3a8a;
}

.btn-save{
    width:100%;
    background:#1e3a8a;
    color:white;
    border:none;
    padding:12px;
    border-radius:6px;
    cursor:pointer;
    font-size:15px;
    font-weight:bold;
    margin-top:10px;
    transition:0.3s;
}

.btn-save:hover{
    background:#3749a0;
}
    </style>
</head>
<body>

    <div class="topbar">
        <a href="/dashboard" class="btn-back">← Kembali</a>

        <a href="/register" class="btn-add">+ Tambah Akun</a>
    </div>

    <div class="container">

        <h2>List Akun</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

    @foreach($users as $user)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>••••••••</td>

        <td>
            <a href="#" class="btn-edit" onclick="openEditModal()">Edit</a>
            <a href="#" class="btn-delete" onclick="openDeleteModal()">Hapus</a>
            <a href="#" class="btn-detail">Detail</a>
        </td>
    </tr>
    @endforeach

</tbody>
        </table>

    </div>

    <!-- POPUP EDIT -->
<div id="editModal" class="modal">
    <div class="modal-content">

        <span class="close" onclick="closeEditModal()">&times;</span>

        <h3>Edit Akun</h3>

        <form>

            <div class="form-group">
                <label>Email</label>
                <input type="email" id="editEmail">
            </div>

            <div class="form-group">
                <label>Role</label>

                <select id="editRole">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <div class="form-group">
                <label>Password Baru</label>

                <div class="password-box">
                    <input 
                        type="password" 
                        id="editPassword"
                        placeholder="Masukkan password baru">

                    <span id="togglePassword()">👁</span>
                </div>
            </div>

            <button type="submit" class="btn-save">
                Simpan
            </button>

        </form>

    </div>
</div>

<!-- POPUP HAPUS -->
<div id="deleteModal" class="modal">
    <div class="modal-content delete-box">

        <h3>Hapus Akun</h3>

        <p>Yakin ingin menghapus akun ini?</p>

        <div class="delete-action">
            <button class="btn-cancel" onclick="closeDeleteModal()">
                Batal
            </button>

            <button class="btn-delete-confirm">
                Hapus
            </button>
        </div>

    </div>
</div>

<script>

function openEditModal(){
    document.getElementById("editModal").style.display = "block";
}

function closeEditModal(){
    document.getElementById("editModal").style.display = "none";
}

function openDeleteModal(){
    document.getElementById("deleteModal").style.display = "block";
}

function closeDeleteModal(){
    document.getElementById("deleteModal").style.display = "none";
}

</script>
</body>
</html>