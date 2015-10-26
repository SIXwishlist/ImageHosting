<?php
  session_start();
  include "core/config.php";
  include "configs/template.php";

  $Smarty->assign("Page", "Home");
  $Smarty->assign("Active", "Home");

  try {
    $SQL = "SELECT MaxImageSize FROM Settings";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute();
    $MaxSize = $SQL->fetch(PDO::FETCH_ASSOC)["MaxImageSize"];
    $MaxSize = $MaxSize * 1024;
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  include "core/upload-image.php";
  include "core/header.php";
  $Smarty->display("header.tpl");

  $UploadOK = "";
  $Action = htmlspecialchars($_SERVER["PHP_SELF"]);
  $Smarty->assign("Action", $Action);
  $Host = $_SERVER["HTTP_HOST"];
  $Smarty->assign("Host", $Host);
  if(isset($_SESSION["Success"])) {
    $Smarty->assign("SuccessMessages", $_SESSION["Success"]);
    $Smarty->assign("ImageInfo", $_SESSION["ImageInfo"]);
    unset($_SESSION["ImageInfo"]);
    unset($_SESSION["Success"]);
    $UploadOK = "1";
  } elseif(isset($_SESSION["Error"])) {
    $Smarty->assign("ErrorMessages", $_SESSION["Error"]);
    unset($_SESSION["Error"]);
  } elseif(isset($_SESSION["ShowError"])) {
    $Smarty->assign("ErrorMessages", $_SESSION["ShowError"]);
    unset($_SESSION["ShowError"]);
  }
  $Smarty->assign("UploadOK", $UploadOK);
  $Smarty->display("index.tpl");

  $Smarty->display("footer.tpl");
  $CONN = null;
?>
