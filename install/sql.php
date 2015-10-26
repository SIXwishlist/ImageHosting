<?php
  if($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
      $SQL = "CREATE TABLE IF NOT EXISTS Admins (
        ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(255) NOT NULL,
        Password VARCHAR(255) NOT NULL,
        EmailAddress VARCHAR(255),
        REG_DATE TIMESTAMP
      )";

      $CONN->exec($SQL);
      echo "<p>Table Admins created successfully</p><br/>";
    } catch(PDOException $e) {
      echo $SQL . "<br>" . $e->getMessage();
    }

    try {
      $SQL = "CREATE TABLE IF NOT EXISTS Accounts (
        ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FirstName VARCHAR(255) NOT NULL,
        LastName VARCHAR(255) NOT NULL,
        Username VARCHAR(255) NOT NULL,
        Password VARCHAR(255) NOT NULL,
        EmailAddress VARCHAR(255),
        REG_DATE TIMESTAMP
      )";

      $CONN->exec($SQL);
      echo "<p>Table Accounts created successfully</p><br/>";
    } catch(PDOException $e) {
      echo $SQL . "<br>" . $e->getMessage();
    }

    try {
      $SQL = "CREATE TABLE IF NOT EXISTS Settings (
        SiteName VARCHAR(255) DEFAULT 'Mint Images',
        Description VARCHAR(255) NOT NULL,
        Keywords VARCHAR(2000) NOT NULL,
        AboutUs VARCHAR(10000) NOT NULL,
        MaxImageSize VARCHAR(255) DEFAULT '1024',
        AllowedExtensions VARCHAR(500)
      )";

      $CONN->exec($SQL);
      echo "<p>Table Settings created successfully</p><br/>";
    } catch(PDOException $e) {
      echo $SQL . "<br>" . $e->getMessage();
    }

    try {
      $SQL = "CREATE TABLE IF NOT EXISTS Images (
        ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Type VARCHAR(10) NOT NULL,
        ImageName VARCHAR(255) NOT NULL,
        ImageURL VARCHAR(255) NOT NULL,
        ShortURL VARCHAR(255) NOT NULL,
        UserID VARCHAR(10),
        ADD_DATE TIMESTAMP
      )";

      $CONN->exec($SQL);
      echo "<p>Table Images created successfully</p><br/>";
    } catch(PDOException $e) {
      echo $SQL . "<br>" . $e->getMessage();
    }

    try {
      $SQL = "CREATE TABLE IF NOT EXISTS Messages (
        ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(255) NOT NULL,
        EmailAddress VARCHAR(255) NOT NULL,
        Content VARCHAR(2000) NOT NULL,
        UserIP VARCHAR(255) NOT NULL,
        SENT_DATE TIMESTAMP
      )";

      $CONN->exec($SQL);
      echo "<p>Table Messages created successfully</p><br/>";
    } catch(PDOException $e) {
      echo $SQL . "<br>" . $e->getMessage();
    }

    try {
      $SQL = "INSERT INTO Admins (Username, Password) VALUES (:Username, :Password)";
      $SQL = $CONN->prepare($SQL);
      $SQL->execute(array("Username" => $_POST["Username"], "Password" => password_hash($_POST["Password"], PASSWORD_DEFAULT)));
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    try {
      $SQL = "SELECT * FROM Settings";
      $SQL = $CONN->prepare($SQL);
      $SQL->execute();
      $CountSettings = $SQL->rowCount();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    if($CountSettings == "0") {
      try {
        $SQL = "INSERT INTO Settings (SiteName) VALUES (:SiteName)";
        $SQL = $CONN->prepare($SQL);
        $SQL->execute(array("SiteName" => $_POST["SiteName"]));
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
?>
