<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $conn = new mysqli("localhost", "root", "", "cruddb");
    if ($conn->connect_error){
        die("Koneksi gagal : " . $conn->connect_error);
    }

    $sql = "INSERT INTO pendaftar (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if($conn->query($sql) === TRUE){
        header("Location: index.php");
    }else{
        echo "Error" . $sql. "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_GET['id']) ? 'Edit' : 'Tambah'; ?> Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .form-container h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus {
            border-color: #6c63ff;
            outline: none;
        }

        .submit-btn {
            background-color: #6c63ff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #5551c8;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2><?php echo isset($_GET['id']) ? 'Edit' : 'Tambah'; ?> Pengguna</h2>
    <form method="POST" action="">
        <!-- Hidden input untuk ID -->
        <input type="hidden" name="id" value="">
        
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone" value="" required>
        </div>
        
        <button type="submit" class="submit-btn"><?php echo isset($_GET['id']) ? 'Update' : 'Tambah'; ?></button>
    </form>
</div>


</body>
</html>
