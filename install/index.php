<?php
  $ROOT = dirname(__FILE__);
  include $ROOT."/../core/config.php";
  include "sql.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mint Images | Install</title>
    <link href="../templates/css/bootstrap.min.css" rel="stylesheet">
    <style media="screen">
      .install {
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
      }

      .install form {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
      }

      .install > form input {
        margin-bottom: 8px;
      }

      .install > form input[type="submit"] {
        width: 100%;
      }

      p {
        margin-bottom: 0px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="install">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="text" class="form-control" required name="Username" placeholder="Admin Username">
        <input type="password" class="form-control" required name="Password" placeholder="Admin Password">
        <input type="text" class="form-control" required name="SiteName" placeholder="Site Name">
        <input type="submit" class="btn btn-success" value="INSTALL">
      </form>
    </div>
  </body>
</html>
