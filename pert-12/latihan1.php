<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lat_dbase";

// Buat koneksi
$con = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($con->connect_error) {
    die('Koneksi gagal: ' . $con->connect_error);
}

// Prepared statement (mencegah SQL injection)
$stmt = $con->prepare(
    "UPDATE tbl_mhs SET Age = ? WHERE FirstName = ? AND LastName = ?"
);

if (!$stmt) {
    die('Prepare gagal: ' . $con->error);
}

// Bind parameter: i = integer, s = string
$age       = 36;
$firstName = 'Karina';
$lastName  = 'Suwandi';

$stmt->bind_param("iss", $age, $firstName, $lastName);

// Eksekusi dan cek hasilnya
if ($stmt->execute()) {
    echo "Data berhasil diperbarui. Baris terpengaruh: " . $stmt->affected_rows;
} else {
    echo "Update gagal: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
