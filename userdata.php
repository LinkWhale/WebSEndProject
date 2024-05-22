<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Data input</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <style>
        body {
            text-align: center;
        }
        form {
            text-align: left;
            width: 14em;
            padding:0.5em;
            margin: 5em;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <h1 class="navbar-brand" style="margin: 1em;">Data upload</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Data upload <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DB = "user_bank";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $DB);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        echo("Connected Successfully<br>");
    }
    ?>
    <form action="#" method="post" enctype="multipart/form-data" class="border border-dark">
        <label for="full_name">Full Name</label><br>
        <input type="text" name="full_name"><br>
        <label for="account_number">Account Number</label><br>
        <input type="text" name="account_number"><br>
        <label for="saldo">Money Amount</label><br>
        <input type="text" name="saldo"><br>
        <label for="image">IMG</label><br>
        <input type="file" name="file"><br>
        <input type="submit" value="submit" name="submit"><br>
    </form>
    <?php
    if(isset($_POST["submit"])) {
        $name = $_POST["full_name"];
        $acc_num = $_POST["account_number"];
        $saldo = $_POST["saldo"];
            $target_dir = "uploads/";
            $target_file = $target_dir . $_FILES["file"]["name"];
            $uploadOk = 1;
            if(file_exists($target_file)) {
                $uploadOk = 0;
            }
        
            // Check if its an image
            
            

            // Check if file is small enough
            if($_FILES["file"]["size"] > 5000000) {
                $uploadOk = 0;
                echo "Error file too big";  
            }
            if($uploadOk == 1) {
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            }

            if ($target_file !== "uploads/") {
            $sql = "INSERT INTO user_info (IMG, userName, bankAccount, saldo)
            VALUES ('$target_file', '$name', '$acc_num', '$saldo')";
 
            mysqli_query($conn, $sql);
            }
            else {
            $sql = "INSERT INTO user_info (IMG, userName, bankAccount, saldo)
            VALUES ('uploads/default.png', '$name', '$acc_num', '$saldo')";

            mysqli_query($conn, $sql);
            }
    }
    ?>


</body>
</html>