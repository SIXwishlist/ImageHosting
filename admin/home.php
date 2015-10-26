<?php
  $ROOT = dirname(__FILE__);
  include $ROOT."/../core/config.php";
  include $ROOT."/../core/admin-session.php";

  $Page = "Home";
  $Active = "Home";

  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["GeneralSettings"])) {
    $UpdateOK = "1";
    $SiteName = $_POST["SiteName"];
    $Description = $_POST["Description"];
    $Keywords = $_POST["Keywords"];
    $AboutUs = $_POST["AboutUs"];
    $MaxImageSize = $_POST["MaxImageSize"];

    if(!is_numeric($MaxImageSize)) {
      $UpdateOK = "0";
      $_SESSION["Error"] = "Max. Image Upload Size must be numeric value!";
      header("location: home.php");
      exit();
    }

    if($UpdateOK == "1") {
      try {
        $SQL = "UPDATE Settings SET SiteName = :SiteName, Description = :Description, Keywords = :Keywords, AboutUs = :AboutUs, MaxImageSize = :MaxImageSize";
        $SQL = $CONN->prepare($SQL);
        $SQL->execute(array("SiteName" => $SiteName, "Description" => $Description, "Keywords" => $Keywords, "AboutUs" => $AboutUs, "MaxImageSize" => $MaxImageSize));
        $_SESSION["Success"] = "You have successfully updated general settings!";
        header("location: home.php");
        exit();
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
      }
    }
  }

  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ProfileSettings"])) {
    $Username = $_POST["Username"];
    $Password = password_hash($_POST["Password"], PASSWORD_DEFAULT);
    $EmailAddress = $_POST["EmailAddress"];

    try {
      $SQL = "UPDATE Admins SET Username = :Username, Password = :Password, EmailAddress = :EmailAddress WHERE ID = :AdminID";
      $SQL = $CONN->prepare($SQL);
      $SQL->execute(array("Username" => $Username, "Password" => $Password, "EmailAddress" => $EmailAddress, "AdminID" => $AdminCheck));
      $_SESSION["Success"] = "You have successfully updated profile settings!";
      header("location: home.php");
      exit();
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      exit();
    }
  }

  try {
    $SQL = "SELECT * FROM Settings";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute();
    $GeneralData = $SQL->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  try {
    $SQL = "SELECT * FROM Admins WHERE ID = :AdminID";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute(array("AdminID" => $AdminCheck));
    $ProfileData = $SQL->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

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
        <div class="col-xs-8">
          <h3 class="h3">General Settings</h3>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label>Site Name:</label>
            <input type="text" required class="form-control" name="SiteName" value="<?php echo $GeneralData["SiteName"];?>">
            <label>SEO Description:</label>
            <input type="text" class="form-control" name="Description" value="<?php echo $GeneralData["Description"];?>">
            <label>SEO Keywords:</label>
            <input type="text" class="form-control" name="Keywords" value="<?php echo $GeneralData["Keywords"];?>">
            <label>About Us:</label>
            <textarea class="form-control" name="AboutUs" rows="6"><?php echo $GeneralData["AboutUs"];?></textarea>
            <label>Max. Image Upload Size:</label>
            <input type="text" required class="form-control" name="MaxImageSize" value="<?php echo $GeneralData["MaxImageSize"];?>">
            <input type="submit" class="btn btn-success" name="GeneralSettings" value="Save Changes">
          </form>
        </div>
        <div class="col-xs-4">
          <h3 class="h3">Profile Settings</h3>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label>Username:</label>
            <input type="text" required class="form-control" name="Username" value="<?php echo $ProfileData["Username"];?>">
            <label>Password:</label>
            <input type="password" required class="form-control" name="Password">
            <label>E-Mail Address:</label>
            <input type="email" required class="form-control" name="EmailAddress" value="<?php echo $ProfileData["EmailAddress"];?>">
            <input type="submit" class="btn btn-success" name="ProfileSettings" value="Save Changes">
          </form>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
<?php
  include "layout/footer.php";
?>
