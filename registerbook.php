<?php


$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$description = $_POST['description'];
$publisher = $_POST['publisher'];
$isbn = $_POST['isbn'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "bookdepo";



$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO bookinfo (id, title, author, price, description, publisher, isbn)
VALUES ('$id', '$title', '$author' , '$price' , '$description' , '$publisher' , '$isbn')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
