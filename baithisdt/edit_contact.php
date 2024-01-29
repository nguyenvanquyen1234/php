<?php
global $conn;
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE contacts_table SET Name=?, PhoneNumber=? WHERE ID=?");
    $stmt->bind_param("ssi", $name, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contacts_table WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<h2>Edit Contact</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['Name']; ?>" required><br>
    Phone Number: <input type="text" name="phone" value="<?php echo $row['PhoneNumber']; ?>" required><br>
    <input type="submit" value="Save">
</form>

<a href="index.php">Back to Contacts</a>
