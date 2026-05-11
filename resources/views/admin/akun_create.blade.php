<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembuatan Akun</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#1e3a8a;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            position:relative;
        }

        .btn-back{
            position:absolute;
            top:20px;
            left:20px;
            background:white;
            color:#1e3a8a;
            padding:10px 18px;
            text-decoration:none;
            border-radius:8px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-back:hover{
            background:#dbeafe;
        }

        .container{
            width:400px;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
        }

        .container h2{
            text-align:center;
            margin-bottom:25px;
            color:#1e3a8a;
        }

        .form-group{
            margin-bottom:18px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
            color:#333;
        }

        .form-group input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
            transition:0.3s;
        }

        .form-group input:focus{
            border-color:#1e3a8a;
            box-shadow:0 0 5px rgba(30,58,138,0.4);
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

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#1e3a8a;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#162d69;
        }

        select{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            outline:none;
            transition:0.3s;
            background:white;
        }

        select:focus{
            border-color:#1e3a8a;
            box-shadow:0 0 5px rgba(30,58,138,0.4);
        }
    </style>
</head>
<body>

    <a href="/akun-list" class="btn-back">← Kembali</a>

    <div class="container">
        <h2>Buat Akun</h2>

        <form method="POST" action="/register">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <div class="form-group">
                <label>Password</label>

                <div class="password-box">
                    <input type="password" name="password" id="password" placeholder="Masukkan password">
                    <span onclick="togglePassword()">👁</span>
                </div>
            </div>
            <button type="submit">Daftar</button>

        </form>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");

            if(password.type === "password"){
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>

</body>
</html>