<?php
  $ROOT = dirname(__FILE__);
  include $ROOT."/../core/config.php";
  include $ROOT."/../core/admin-session.php";

  if(isset($_GET["Action"]) && $_GET["Action"] == "DeleteImage" && isset($_GET["ImageID"])) {
    $ImageID = $_GET["ImageID"];
    try {
      $SQL = "SELECT * FROM Images WHERE ID = :ImageID";
      $SQL = $CONN->prepare($SQL);
      $SQL->execute(array("ImageID" => $ImageID));
      $CountImage = $SQL->rowCount();
      $ImageURL = $SQL->fetch(PDO::FETCH_ASSOC)["ImageURL"];
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      exit();
    }

    if($CountImage == "1") {
      $ImageSize = filesize("../".$ImageURL);
      $ImageSize = explode(".", $ImageSize / 1024);
      $ImageSize = $ImageSize["0"];
      if(unlink("../".$ImageURL)) {
        try {
          $SQL = "DELETE FROM Images WHERE ID = :ImageID";
          $SQL = $CONN->prepare($SQL);
          $SQL->execute(array("ImageID" => $ImageID));
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $_SESSION["Success"] = "Image is successfully deleted. ".$ImageSize."KB of memory is freed!";
      } else {
        $_SESSION["Error"] = "There was an error while deleting image!";
      }
    } else {
      $_SESSION["Error"] = "Image cannot be deleted because image with requested ID doesn`t exist!";
    }
    header("location: images.php");
    exit();
  }

  try {
    $SQL = "SELECT ID, ImageName, ImageURL FROM Images ORDER BY ID DESC";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute();
    $ImagesCount = $SQL->rowCount();
    $Images = $SQL->fetchAll();
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  $Page = "Images";
  $Active = "Images";

  include "layout/header.php";
?>
    <div class="content">
      <?php if(isset($_SESSION["Success"])) { ?>
      <div class="alert alert-success" role="alert"><?php echo $_SESSION["Success"];?></div>
      <?php
        unset($_SESSION["Success"]);
      }
      ?>
      <?php if(isset($_SESSION["Error"])) { ?>
      <div class="alert alert-danger" role="alert"><?php echo $_SESSION["Error"];?></div>
      <?php
        unset($_SESSION["Error"]);
      }
      ?>
      <div class="border-box">
        <?php
          if($ImagesCount > "0") {
            foreach($Images as  $Image) {
        ?>
        <div onmouseover="ShowOptions(<?php echo $Image["ID"];?>)" onmouseout="HideOptions(<?php echo $Image["ID"];?>)" class="col-md-3 col-sm-4 col-xs-6 thumb">
          <a class="thumbnail" href="http://<?php echo $_SERVER["HTTP_HOST"]."/".$Image["ImageURL"]; ?>" target="_blank">
           <img class="img-responsive" src="http://<?php echo $_SERVER["HTTP_HOST"]."/".$Image["ImageURL"]; ?>" alt="<?php echo $Image["ImageName"]; ?>">
          </a>
          <a id="DELETE-<?php echo $Image["ID"];?>" href="images.php?Action=DeleteImage&ImageID=<?php echo $Image["ID"];?>" class="btn btn-danger delete none">DELETE</a>
        </div>
        <?php
            }
          }
        ?>
        <div class="clearfix"></div>
      </div>
    </div>
<?php
  include "layout/footer.php";
?>
