<?php
  try {
    $SQL = "SELECT * FROM Settings";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute();
    $Settings = $SQL->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  $Title = $Settings["SiteName"];
  $Description = $Settings["Description"];
  $Keywords = $Settings["Keywords"];

  $Smarty->assign("Title", $Title);
  $Smarty->assign("Description", $Description);
  $Smarty->assign("Keywords", $Keywords);
?>
