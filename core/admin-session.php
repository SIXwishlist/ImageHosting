<?php
  session_start();
  $AdminCheck = $_SESSION["AdminLogin"]["ID"];
  try {
    $SQL = "SELECT * FROM Admins WHERE ID = :ID";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute(array("ID" => $AdminCheck));
    $Result = $SQL->fetch(PDO::FETCH_ASSOC);
    $LoginSession = $Result["Username"];
    if(!isset($LoginSession)){
      $CONN = null;
      header('Location: index.php');
    }
  } catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
  }
?>
