<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>CRUD System</title>
</head>
<body>
    <div class="container">
        <h2>Daftar Pengguna</h2>

        <!-- Container untuk Tombol Tambah Pengguna dan Form Pencarian -->
        <div class="header-container">
            <a href="create.php" class="btn">+ pengguna </a>

            <!-- Form Pencarian -->
            <div class="search-container">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Cari nama atau email...">
                    <button type="submit" class="search-btn">Cari</button>
                </form>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "cruddb");
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Mendapatkan kata kunci pencarian
                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    // Query untuk menampilkan data sesuai pencarian
                    $sql = "SELECT * FROM pendaftar WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["phone"] . "</td>
                                <td>
                                    <a href='update.php?id=" . $row["id"] . "' class='btn-edit'>Edit</a>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn-delete'>Hapus</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- CSS untuk Menyelaraskan Tombol Tambah Pengguna dan Form Pencarian -->
    <style>
    /* Container untuk header dengan tombol dan pencarian */
    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        margin: 20px auto;
    }

    .btn {
        padding: 10px 20px;
        background-color: #bd5480;
        color: white;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
    }

    .search-container form {
        display: flex;
        align-items: center;
    }

    .search-container input {
        padding: 10px;
        width: 350px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .search-btn {
        background-color: #bd5480;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
        font-size: 16px;
    }

    .search-btn:hover {
        background-color: #9a3d64;
    }

    /* Warna untuk baris pertama pada tabel */
    table thead tr {
        background-color: #bd5480;
        color: white;
    }
    </style>
</body>
</html>
