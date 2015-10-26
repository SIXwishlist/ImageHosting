<?php
  if($_SERVER["REQUEST_METHOD"] === "POST") {
     $Target_DIR = "uploads/";
     $Target_File = $Target_DIR . basename($_FILES["ImageUpload"]["name"]);
     $Image_Name = basename($_FILES["ImageUpload"]["name"]);
     $Image_Size = $_FILES["ImageUpload"]["size"];
     $PrivateUpload = $_POST["PrivateUpload"];
     $UploadOK = "1";
     $ImageFileType = pathinfo($Target_File, PATHINFO_EXTENSION);

     if(!empty($_FILES["ImageUpload"]["tmp_name"])) {
        $Check = getimagesize($_FILES["ImageUpload"]["tmp_name"]);
        if($Check !== FALSE) {
           $UploadOK = "1";
        } else {
           $_SESSION["Error"][] = "File is not an image.";
           $UploadOK = "0";
        }
     } else {
        $UploadOK = "0";
     }


     if(isset($_SESSION["UserLogin"]["ID"])) {
       $UserID = $_SESSION["UserLogin"]["ID"];
     } else {
       $UserID = "Anonymous";
     }

     if(isset($PrivateUpload)) {
       $Type = "Private";
     } else {
       $Type = "Public";
     }

     $Upload_Name = ucfirst(pathinfo($Target_File, PATHINFO_FILENAME));
     $Upload_Name = uniqid($Upload_Name."_");
     $Upload_Name = $Upload_Name.".".$ImageFileType;

     function ShortURL() {
       $Length = "5";
       $RandomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $Length);
       return $RandomString;
     }

     function CheckShortURL($RandomString, $CONN) {
       try {
         $SQL = "SELECT ShortURL FROM Images WHERE ShortURL = :ShortURL";
         $SQL = $CONN->prepare($SQL);
         $SQL->execute(array("ShortURL" => $ShortURL));
         $CountShortURL = $SQL->rowCount();
       } catch(PDOException $e) {
         echo "Error: " . $e->getMessage();
         exit();
       }
       if($CountShortURL == "1") {
         return TRUE;
       } else {
         return FALSE;
       }
     }

     $ShortURL_Found = "0";

     while($ShortURL_Found == "0") {
       $ShortURL = ShortURL();
       if(CheckShortURL($ShortURL, $CONN) == FALSE) {
         $ShortURL_Found = "1";
       }
     }


     if (file_exists($Upload_Name)) {
        $_SESSION["Error"][] = "Sorry, file already exists.";
        $UploadOK = "0";
     }

     if ($Image_Size > $MaxSize) {
        $_SESSION["Error"][] = "Sorry, your file is too large.";
        $UploadOK = "0";
     }

     if($ImageFileType != "jpg" && $ImageFileType != "png" && $ImageFileType != "jpeg" && $ImageFileType != "gif" && $ImageFileType != "bmp") {
        $_SESSION["Error"][] = "Sorry, only JPG, JPEG, PNG, GIF & BMP files are allowed.";
        $UploadOK = "0";
     }

     if ($UploadOK == "0") {
        $_SESSION["Error"][] = "Sorry, your file was not uploaded.";
     } else {
        if (move_uploaded_file($_FILES["ImageUpload"]["tmp_name"], $Target_DIR.$Upload_Name)) {
           try {
             $SQL = "INSERT INTO Images (Type, ImageName, ImageURL, ShortURL, UserID) VALUES (:Type, :ImageName, :ImageURL, :ShortURL, :UserID)";
             $SQL = $CONN->prepare($SQL);
             $SQL->execute(array("Type" => $Type, "ImageName" => ucfirst($Image_Name), "ImageURL" => $Target_DIR.$Upload_Name, "ShortURL" => $ShortURL, "UserID" => $UserID));
           } catch(PDOException $e) {
             echo "Error: " . $e->getMessage();
             exit();
           }
           $_SESSION["ImageInfo"]["Type"] = $Type;
           $_SESSION["ImageInfo"]["Name"] = ucfirst($Image_Name);
           $_SESSION["ImageInfo"]["Size"] = $Image_Size;
           $_SESSION["ImageInfo"]["URL"] = $Target_DIR.$Upload_Name;
           $_SESSION["ImageInfo"]["ShortURL"] = $ShortURL;
           $_SESSION["ImageInfo"]["UserID"] = $UserID;
           $_SESSION["Success"] = "The file <b>". ucfirst($Image_Name). "</b> has been uploaded.";
           header("location: index.php");
           exit();
        } else {
           $_SESSION["Error"][] = "Sorry, there was an error uploading your file.";
        }
     }
     header("location: index.php");
     exit();
  }
?>
