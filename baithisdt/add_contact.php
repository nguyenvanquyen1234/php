<?php
global $conn;
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO contacts_table (Name, PhoneNumber) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $phone);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<h2>Add New Contact</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" required><br>
    Phone Number: <input type="text" name="phone" required><br>
    <input type="submit" value="Add">
</form>

<a href="index.php">Back to Contacts</a>
