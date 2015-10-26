<?php
  session_start();
  include "core/config.php";
  include "configs/template.php";

  $Smarty->assign("Page", "About Us");
  $Smarty->assign("Active", "AboutUs");

  try {
    $SQL = "SELECT AboutUs FROM Settings";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute();
    $AboutUs = $SQL->fetch(PDO::FETCH_ASSOC)["AboutUs"];
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  include "core/header.php";
  $Smarty->display("header.tpl");

  $Smarty->assign("AboutUs", $AboutUs);
  $Smarty->display("about.tpl");

  $Smarty->display("footer.tpl");
  $CONN = null;
?>
