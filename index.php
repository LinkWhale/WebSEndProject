<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bank Data</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <style>
        body {
            text-align: center;
        }
        table {
            margin-top: 5em;
            text-align: left;
        }
        h1 {
            margin: 1em;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <h1 class="navbar-brand">Bank data</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userdata.php">Data upload</a>
      </li>
    </ul>
  </div>
</nav>
    </div>
    <?php 
    //Making database and table
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
    /*
    $sql = "CREATE DATABASE user_bank";
    if (mysqli_query($conn, $sql)) 
    {
        echo "Database Created Successfully";
    }
    else 
    {
        echo "Error creating db: " . mysqli_error($conn);
    }
    
    $sql = "CREATE TABLE user_info (
        IMG VARCHAR(100),
        userName VARCHAR(50) NOT NULL,
        bankAccount INT(30) NOT NULL PRIMARY KEY,
        saldo DOUBLE(20, 2) NOT NULL)";

    if (mysqli_query($conn, $sql)) {
        echo "Table successfully made";
    }
    else {
        echo "There was en error when making table";
    }

    */

    ?>
    <table class="table table-striped table-dark">
        <thead class="">
            <tr>
                <th scope="col">IMG</th>
                <th scope="col">Full Name</th>
                <th scope="col">Account Number</th>
                <th scope="col">Saldo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM user_info";
        $result = mysqli_query($conn, $sql);
        if ($result-> num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                //WORK ON IMAGES
                echo "<tr>
                <td scope='col'><img src='" . $row["IMG"] . "' width='30em' height='30em' class='rounded-circle'></td>
                <td scope='col'>" . $row["userName"]. "</td>
                <td scope='col'>" . $row["bankAccount"]. "</td>
                <td scope='col'>" . $row["saldo"]. "zł</td>
                </tr>";
            }
        } 
  ?>
  </tbody>
    </table>
    
</body>
</html>