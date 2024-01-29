<?php
global $conn;
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM contacts_table WHERE ID=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: index.php");
?>

<a href="index.php">Back to Contacts</a>
