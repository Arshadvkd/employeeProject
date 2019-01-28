<?php include_once 'db.php'; ?>

<?php
$message = "";
    if(isset($_GET['action'])){
        if($_GET['action']==="delete"){
            $del_id = $_GET['id'];
            // sql to delete a record
            $sql = "DELETE FROM employee WHERE id={$del_id}";

            if ($conn->query($sql) === TRUE) {
                $message = true;
            } else {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }

        }
    }
    
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/style.css">

    <!-- Favicon adding -->

        <link rel="shortcut icon" href="favicon.png">

    <!-- Ending favicon -->
    <title>Employee Track- A fast employee tracking system</title>
  </head>
  <body>
    <header class="text-center well well-lg">
        <h1><a href="index.php"><i><b>Employee System</b></i></a></h1>
    </header>