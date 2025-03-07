<?php
include("config.php"); // Include database connection

// Fetch data from database
$query = "SELECT * FROM employee";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <link rel="stylesheet" href="style1.css"> <!-- Optional: Add CSS for styling -->
</head>
<body><div id = "head">
    <h2>Employee Records</h2>
    </div>
    <?php
    if($total > 0) {
        echo "<table border='1' cellpadding='10'>
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Month</th>
                    <th>Salary</th>
                </tr>";
        
        // Fetch and display each row
        while($row = mysqli_fetch_assoc($data)) {
            echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['post']."</td>
                    <td>".$row['pno']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['month']."</td>
                    <td>".$row['salary']."</td>
                  </tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>No records found</p>";
    }
    ?>
</body>
</html>
