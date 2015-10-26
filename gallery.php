<?php
  session_start();
  include "core/config.php";
  include "configs/template.php";

  $Smarty->assign("Page", "Gallery");
  $Smarty->assign("Active", "Gallery");

  try {
    $SQL = "SELECT ImageName, ImageURL, ShortURL FROM Images WHERE Type = :Type ORDER BY ID DESC";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute(array("Type" => "Public"));
    $CountImages = $SQL->rowCount();
    $Images = $SQL->fetchAll();
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  include "core/header.php";
  $Smarty->display("header.tpl");

  $Host = $_SERVER["HTTP_HOST"];
  $Smarty->assign("Host", $Host);
  $Smarty->assign("CountImages", $CountImages);
  $Smarty->assign("Images", $Images);
  $Smarty->display("gallery.tpl");

  $Smarty->display("footer.tpl");
  $CONN = null;
?>
