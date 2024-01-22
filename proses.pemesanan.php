<?php
session_start();

// Fungsi untuk membersihkan data input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

// Proses formulir pemesanan jika metode adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil dan membersihkan data formulir
    $nama = sanitizeInput($_POST['nama']);
    $alamat = sanitizeInput($_POST['alamat']);
    $ukuran = sanitizeInput($_POST['ukuran']);
    $tanggal = sanitizeInput($_POST['tanggal']);
    $jenis_kelamin = sanitizeInput($_POST['jenis_kelamin']);

    // Validasi
    $errors = [];

    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    if (empty($alamat)) {
        $errors[] = "Alamat harus diisi.";
    }

    if (empty($ukuran)) {
        $errors[] = "Ukuran harus dipilih.";
    }

    if (empty($tanggal)) {
        $errors[] = "Tanggal pemesanan harus diisi.";
    }

    if (empty($jenis_kelamin)) {
        $errors[] = "Jenis kelamin harus dipilih.";
    }

    // Proses selanjutnya jika tidak ada error
    if (empty($errors)) {
        // Simpan data ke database atau lakukan tindakan lainnya
        // Contoh: saveToDatabase($nama, $alamat, $ukuran, $tanggal, $jenis_kelamin);

        echo "Pesanan diterima. Terima kasih!";
    } else {
        // Tampilkan pesan error
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
} else {
    // Jika metode bukan POST, kembalikan ke halaman login
    header("Location: login.php");
    exit();
}
?>
