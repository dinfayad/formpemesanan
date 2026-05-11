<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f1f5f9;
        }

        /* HEADER */
        .header {
            background: #1e3a8a;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            margin: 0;
        }

        .nav {
            display: flex;
            gap: 10px;
        }

        .nav a {
            background: white;
            color: #1e3a8a;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav a:hover {
            background: #dbeafe;
        }

        /* CONTENT */
        .container {
            padding: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #1e3a8a;
        }

        .card p {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <h2>Dashboard</h2>

    <div class="nav">
        <a href="/form-pemesanan">Form Pemesanan</a>
        <a href="/bahan-baku/create">Data Base</a>
        <a href="/">Logout</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">
    <div class="card" style="max-width: 700px; margin: auto; text-align: center;">
        <h2>Welcome👋</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
            nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>
</div>

</body>
</html>