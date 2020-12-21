<?php
session_start();
include_once("dbconnect.php");
$id = $_GET['id']; 
$title = $_GET['title'];


echo "Welcome " . $_SESSION[""] . ".<br>";
if (isset($_SESSION[""])){

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $id = $_GET['id'];
      try {
        $sql = "DELETE FROM bookinfo WHERE id='$id'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try{

        $sql = "SELECT * FROM foodinfo WHERE id = '$id' ORDER BY author ASC";
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $courses = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>Your Book List</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
          <th>ID</th>
          <th>TITLE</th>
          <th>AUTHOR</th>
          <th>PRICE</th>
          <th>DESCRIPTION</th>
          <th>PUBLISHER</th>
          <th>ISBN</th>

        </tr>";
        
        foreach($bookinfo as $bookinfo) {
            echo "<tr>";
            echo "<td>".$bookinfo['id']."</td>";
            echo "<td>".$bookinfo['title']."</td>";
            echo "<td>".$bookinfo['author']."</td>";
            echo "<td>".$bookinfo['price']."</td>";
            echo "<td>".$bookinfo['description']."</td>";
            echo "<td>".$bookinfo['publisher']."</td>";
            echo "<td>".$bookinfo['isbn']."</td>";

            
            echo "<td><a href='mainpage.php?id=".$id."&title=".$title."&author=".$author."&price="
            .$price."&description=".$description."&publisher=".$publisher. "&isbn=".$isbn['id'].
            "&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php?".$id."&title=".$title."&author=".$author."&price=".$price."&description="
            .$description."&publisher=".$publisher. "&isbn=".$isbn.
            "&id=".$bookinfo['id']."&title=".$bookinfo['title']."&author=".$bookinfo['author'].
            "&price=".$bookinfo['price']."&description=".$bookinfo['description']."&publisher=".$bookinfo['publisher'].
            "&isbn=".$bookinfo['isbn']." '>Update</a></td>";
            echo "</tr>";
       } 
        echo "</table>";
        echo "<p align='center'><a href='newgrade.php?id=".$id."&title=".$title."'>Insert new book</a></p>";
        echo "<p align='center'><a href='profile.php?id=".$id."&title=".$title."'>Your Book</a></p>";
        echo "<p align='center'><a href='index.php'></a></p>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
    echo "<script> alert('Timer expired!!!')</script>";
    echo "<script> window.location.replace('registerbook.html') </script>;";
  }

}else{
  echo "<script> alert('Session Expired!!!')</script>";
  echo "<script> window.location.replace('registerbook.html') </script>;";
}
  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>

</body>

</html>