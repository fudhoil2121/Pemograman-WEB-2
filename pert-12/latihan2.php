<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lat_dbase";

// 1. Create connection
$con = new mysqli($host, $user, $pass, $db);

// 2. Check connection
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

// 3. Prepare DELETE statement
$stmt = $con->prepare("DELETE FROM tbl_mhs WHERE LastName = ?");

if (!$stmt) {
    die('Prepare failed: ' . $con->error);
}

// 4. Bind parameter and execute
$lastName = "Prabowo";
$stmt->bind_param("s", $lastName);

// 5. Execute and verify
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Deleted {$stmt->affected_rows} record(s) successfully.";
    } else {
        echo "No matching record found.";
    }
} else {
    echo "Execute failed: " . $stmt->error;
}

// 6. Close resources
$stmt->close();
$con->close();
?>
