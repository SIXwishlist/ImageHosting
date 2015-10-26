<?php
  session_start();
  include "core/config.php";
  include "configs/template.php";

  $Smarty->assign("Page", "Contact");
  $Smarty->assign("Active", "Contact");

  if($_SERVER["REQUEST_METHOD"] === "POST") {
    $MessageTitle = $_POST["MessageTitle"];
    $EmailAddress = $_POST["EmailAddress"];
    $MessageContent = $_POST["MessageContent"];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $UserIP = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $UserIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $UserIP = $_SERVER['REMOTE_ADDR'];
    }

    try {
      $SQL = "INSERT INTO Messages (Title, EmailAddress, Content, UserIP) VALUES (:Title, :EmailAddress, :Content, :UserIP)";
      $SQL = $CONN->prepare($SQL);
      $SQL->execute(array("Title" => $MessageTitle, "EmailAddress" => $EmailAddress, "Content" => $MessageContent, "UserIP" => $UserIP));
      $_SESSION["Success"] = "Message has been sent successfully. Answer will arive into your email inbox!";
      header("location: contact.php");
      exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      exit();
    }
  }

  include "core/header.php";
  $Smarty->display("header.tpl");

  $Action = htmlspecialchars($_SERVER["PHP_SELF"]);
  $Smarty->assign("Action", $Action);
  if(isset($_SESSION["Success"])) {
    $Smarty->assign("Messages", $_SESSION["Success"]);
  }
  unset($_SESSION["Success"]);
  $Smarty->display("contact.tpl");

  $Smarty->display("footer.tpl");
  $CONN = null;
?>
