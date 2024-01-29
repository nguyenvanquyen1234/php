<?php
global $conn;
include 'db.php';

$sql = "SELECT * FROM contacts_table";
$result = $conn->query($sql);

echo "<h2>Contact List</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['Name']} - {$row['PhoneNumber']} ";
    echo "<a href='edit_contact.php?id={$row['ID']}'>Edit</a> ";
    echo "<a href='delete_contact.php?id={$row['ID']}'>Delete</a></li>";
}
echo "</ul>";

$conn->close();
?>

<a href="add_contact.php">Add New Contact</a>
