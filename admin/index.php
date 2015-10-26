<?php
  session_start();
  unset($_SESSION["ShowError"]);
  if(isset($_SESSION["AdminLogin"])) {
    header("location: home.php");
    exit();
  }

  $ROOT = dirname(__FILE__);
  include $ROOT."/../core/config.php";

  $Page = "Login";

  if($_SERVER["REQUEST_METHOD"] === "POST") {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    try {
       $SQL = "SELECT ID, Password FROM Admins WHERE Username = :Username";
       $SQL = $CONN->prepare($SQL);
       $SQL->execute(array('Username' => $Username));
       $CountRows = $SQL->rowCount();
       $Result = $SQL->fetch(PDO::FETCH_ASSOC);
       $AdminID = $Result["ID"];
       $PasswordCheck = $Result["Password"];
       if($CountRows == "1" && password_verify($Password, $PasswordCheck)) {
         $_SESSION["AdminLogin"]["ID"] = $AdminID;
         $_SESSION["AdminLogin"]["Username"] = $Username;
         $CONN = null;
         header("location: home.php");
         exit();
       } else {
         $_SESSION["Error"] = "You have entered incorrect login data!";
         header("location: index.php");
         exit();
       }
    } catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
    }
  }

  include "layout/header.php";
?>
    <div class="content">
      <?php if(isset($_SESSION["Error"])) { ?>
      <div class="alert alert-danger" role="alert"><?php echo $_SESSION["Error"];?></div>
      <?php
        unset($_SESSION["Error"]);
      }
      ?>
      <div class="login">
        <center><h2>LOGIN</h2></center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <label>Username:</label>
          <input type="text" class="form-control" name="Username">
          <label>Password:</label>
          <input type="password" class="form-control" name="Password">
          <input type="submit" class="btn btn-success" value="LOGIN">
        </form>
      </div>
    </div>
<?php
  include "layout/footer.php";
  $CONN = null;
?>
