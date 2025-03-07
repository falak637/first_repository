<?php
include("config.php"); // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Search & Update Employee Data</h2>

    <!-- Search Form -->
    <form method="POST">
        <label for="search_name">Enter Name:</label>
        <input type="text" name="search_name" required>

        <label for="search_pass">Enter Password:</label>
        <input type="password" name="search_pass" required>

        <button type="submit" name="find">Search</button>
    </form>

    <?php
    if(isset($_POST['find'])) {
        $name = $_POST['search_name'];
        $password = $_POST['search_pass'];

        // Corrected SQL query to match name and password
        $query = "SELECT * FROM employee WHERE name='$name' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
    ?>

    <!-- Update Form -->
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>First Name:</label>
        <input type="text" name="fname" value="<?php echo $row['name']; ?>" required><br>

        <label>Designation:</label>
        <input type="text" name="designation" value="<?php echo $row['post']; ?>" required><br>

        <label>Phone:</label>
        <input type="text" name="pno" value="<?php echo $row['pno']; ?>" required><br>

        <label>Password:</label>
        <input type="password" name="pass" value="<?php echo $row['password']; ?>" required><br>

        <label>Month:</label>
        <select name="month">
            <option value="january" <?php if($row['month'] == "january") echo "selected"; ?>>January</option>
            <option value="february" <?php if($row['month'] == "february") echo "selected"; ?>>February</option>
            <option value="march" <?php if($row['month'] == "march") echo "selected"; ?>>March</option>
            <option value="april" <?php if($row['month'] == "april") echo "selected"; ?>>April</option>
            <option value="may" <?php if($row['month'] == "may") echo "selected"; ?>>May</option>
            <option value="june" <?php if($row['month'] == "june") echo "selected"; ?>>June</option>
            <option value="july" <?php if($row['month'] == "july") echo "selected"; ?>>July</option>
            <option value="august" <?php if($row['month'] == "august") echo "selected"; ?>>August</option>
            <option value="september" <?php if($row['month'] == "september") echo "selected"; ?>>September</option>
            <option value="october" <?php if($row['month'] == "october") echo "selected"; ?>>October</option>
            <option value="november" <?php if($row['month'] == "november") echo "selected"; ?>>November</option>
            <option value="december" <?php if($row['month'] == "december") echo "selected"; ?>>December</option>
        </select><br>

        <label>Salary:</label>
        <select name="salary">
            <option value="paid" <?php if($row['salary'] == "paid") echo "selected"; ?>>Paid</option>
            <option value="unpaid" <?php if($row['salary'] == "unpaid") echo "selected"; ?>>Unpaid</option>
        </select><br>

        <button type="submit" name="update">Update</button>
    </form>

    <?php
            }
        } else {
            echo "<p>No record found for '$name' with the given password.</p>";
        }
    }

    // Handle update request
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $post = $_POST['designation'];
        $phone = $_POST['pno'];
        $password = $_POST['pass'];
        $month = $_POST['month'];
        $salary = $_POST['salary'];

        // Ensure that the ID is being used for a secure update
        $update_query = "UPDATE employee SET name='$fname', post='$post', pno='$phone', password='$password', month='$month', salary='$salary' WHERE id='$id'";
        
        if(mysqli_query($conn, $update_query)) {
            echo "<p>✅ Data updated successfully!</p>";
        } else {
            echo "<p>❌ Update failed: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

</body>
</html>
