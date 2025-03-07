<?php
include("config.php"); // Database connection

// Step 1: Check if the search form is submitted
if(isset($_POST['search'])) {
    $fname = $_POST['fname'];
    $password = $_POST['password'];

    // Step 2: Fetch the data based on name & password
    $query = "SELECT * FROM employee WHERE name='$fname' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "❌ No record found!";
    }
}

// Step 3: If Delete button is clicked, delete the record
if(isset($_POST['delete'])) {
    $id = $_POST['id']; // Get the hidden id field

    $delete_query = "DELETE FROM employee WHERE id=$id";
    $delete_result = mysqli_query($conn, $delete_query);

    if($delete_result) {
        echo "✅ Data deleted successfully!";
    } else {
        echo "❌ Deletion failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <h2>Search Employee</h2>
    <form method="POST">
        <label for="fname">Name:</label>
        <input type="text" name="fname" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="search">Search</button>
    </form>

    <?php if(isset($row)) { ?>
    <h2>Delete Employee</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Designation:</strong> <?php echo $row['post']; ?></p>
        <p><strong>Phone:</strong> <?php echo $row['pno']; ?></p>
        <p><strong>Month:</strong> <?php echo $row['month']; ?></p>
        <p><strong>Salary:</strong> <?php echo $row['salary']; ?></p>

        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
    </form>
    <?php } ?>

</body>
</html>
