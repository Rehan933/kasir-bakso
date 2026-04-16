<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #4f5052;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #34495e;
        }

        .menu {
            padding: 10px;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .menu a:hover {
            background: #34495e;
        }

        .logout {
            margin-top: auto;
            padding: 15px;
        }

        .logout button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #e74c3c;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout button:hover {
            background: #c0392b;
        }

        /* Main */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: white;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
        }

        .content {
            padding: 20px;
        }

        /* Cards */
        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: gray;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background: #ecf0f1;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Kasir Bakso</h2>

        <div class="menu">
            <a href="#">Produk</a>
            <a href="#">Transaksi</a>
            <a href="#">jenis pembelian</a>
            <a href="#">detail transaksi</a>
            <a href="#">mutasi</a>
        </div>

        <div class="logout">
            <button>Logout</button>
        </div>
    </div>

    <!-- Main -->
    <div class="main">

        <!-- Navbar -->
        <div class="navbar">
            <h3>Dashboard</h3>
            <span>Halo, Admin</span>
        </div>

        <!-- Content -->
        <div class="content">

            <!-- Cards -->
            <div class="cards">
                <div class="card">
                    <h3>Total Produk</h3>

                </div>

                <div class="card">
                    <h3>Total Transaksi</h3>

                </div>

                <div class="card">
                    <h3>Pendapatan</h3>

                </div>
            </div>



        </div>

    </div>

</div>

</body>
</html>
