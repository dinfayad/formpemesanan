<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #1e3a8a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #1e3a8a;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }

        button:hover {
            background: #3749a0;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .form-group {
    margin-bottom: 20px;
    font-family: Arial, sans-serif;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.password-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.password-wrapper input {
    width: 100%;
    padding: 10px 40px 10px 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: 0.2s;
}

.password-wrapper input:focus {
    border-color: #1e3a8a;
    box-shadow: 0 0 5px rgba(30, 58, 138, 0.3);
}

.toggle-btn {
    position: absolute;
    right: 10px;
    cursor: pointer;
    font-size: 18px;
    color: #555;
}

.toggle-btn:hover {
    color: #1e3a8a;
}
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    <form action="/login" method="post">
        @csrf

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email">
        </div>

<div class="form-group">
    <label>Password</label>
    
    <div class="password-wrapper">
        <input type="password" id="password" name="password" placeholder="Masukkan password">
        <span class="toggle-btn" onclick="togglePassword()">👁</span>
    </div>
</div>

        <button type="submit">Login</button>
    </form>
</div>

<script>
function togglePassword() {
    const pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>