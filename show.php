<?php
  session_start();
  include "core/config.php";
  if(isset($_GET["ID"]) && !empty($_GET["ID"])) {
    $ID = $_GET["ID"];

    try {
      $SQL = "SELECT ImageURL FROM Images WHERE ShortURL = :ID";
      $SQL = $CONN->prepare($SQL);
      $SQL->execute(array("ID" => $ID));
      $CountImage = $SQL->rowCount();
      $ImageData = $SQL->fetch(PDO::FETCH_ASSOC);
      $ImageURL = $ImageData["ImageURL"];
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      exit();
    }

    if(file_exists($ImageURL) && $CountImage == "1") {
      $Image = getimagesize($ImageURL);
      $Mime = $Image['mime'];
    } else {
      $_SESSION["ShowError"][] = "The requested image can not be displayed. Perhaps the link is broken or the picture is deleted!";
      header("location: index.php");
      exit();
    }

    header("Content-Type: ".$Mime);
    readfile($ImageURL);
  } else {
    $_SESSION["ShowError"][] = "The requested image can not be displayed. Perhaps the link is broken or the picture is deleted!";
    header("location: index.php");
    exit();
  }
  $CONN = null;
?>
