<?php
include 'db.php';

// Get ID
$id = $_GET['id'];

// Fetch data
$result = $conn->query("SELECT * FROM expenses WHERE id='$id'");

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
} else {
    echo "No data found!";
    exit();
}

// Update
if(isset($_POST['update'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];

    $conn->query("UPDATE expenses 
                  SET amount='$amount', category='$category' 
                  WHERE id='$id'");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
</head>
<body>

<h2>Edit Expense</h2>

<form method="POST">
    <input type="number" name="amount" value="<?php echo $row['amount']; ?>">
    <input type="text" name="category" value="<?php echo $row['category']; ?>">

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>