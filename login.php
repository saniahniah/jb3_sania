<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Data</title>
    <!-- Add any other head content you need -->
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data yang dikirimkan melalui form
        $username = $_POST["username"];
        $password = $_POST["password"];

        echo "<h2>Login Berhasil!</h2>";
        echo "<p>Selamat datang, $username!</p>";
        echo "<form method='get' action='proses.pemesanan.html'>
                  <input type='submit' value='isi form pemesanan pakaian'>
              </form>";
    } else {
        // Jika bukan metode POST, kembalikan ke halaman form
        header("Location: index.html");
        exit();
    }
    ?>
</body>

</html>
