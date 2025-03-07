
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="f1">
   
    <form action="#" method="POST">
        <div id="title"><h1>CREATE</h1></div>
        <div class="box">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname"><br>
        </div>
        <div class="box">
            <label for="post">designation:</label>
            <input type="text" id="post" name="designation"><br>
            </div>
        <div class="box">
             <label for="pno">phone no.:</label>
             <input type="text" id="pno" name="pno"><br>
        </div>
        <div class="box">
        <label for="pass">password:</label>
        <input type="password" id="pass" name="pass">
        </div>
        <div class="box">
        <label for="month">Choose a month:</label>
             <select id="month" name="month">
            <option value="january">january</option>
            <option value="february">february</option>
            <option value="march">march</option>
            <option value="april">april</option>
            <option value="may">may</option>
            <option value="june">june</option>
            <option value="july">july</option>
            <option value="august">august</option>
            <option value="september">september</option>
            <option value="october">october</option>
            <option value="november">november</option>
            <option value="december">december</option>
            
</select></div>
<div class="box">
    <label for="salary">salary:</label>
<select id="salary" name="salary">
    <option value="select">select</option>
  <option value="paid">paid</option>
  <option value="unpaid">unpaid</option>
</select>
</div>
<div class="box"><input type="submit" value="Submit" name="submit"></div>
</form>
</div>
</body>
</html>


<?php
include("config.php"); // Ensure this file is included

if(isset($_POST['submit'])) {
    // Get form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $post = mysqli_real_escape_string($conn, $_POST['designation']);
    $phone = mysqli_real_escape_string($conn, $_POST['pno']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $month = mysqli_real_escape_string($conn, $_POST['month']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);

    
    // SQL Query
    $query = "INSERT INTO employee (name, post, pno, password, month, salary) 
              VALUES ('$fname', '$post', '$phone', '$password', '$month', '$salary')";

    
    

    // Execute Query
    $data = mysqli_query($conn, $query);

    // Check if insertion is successful
    if($data) {
        echo "<br>✅ Data inserted successfully!";
    } else {
        echo "<br>❌ Failed insertion: " . mysqli_error($conn);
    }
}
?>
