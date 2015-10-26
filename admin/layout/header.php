<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mint Img Admin | <?php echo $Page;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php if(isset($_SESSION["AdminLogin"])) { ?>
    <div class="navbar">
      <ul>
        <li <?php if($Active == "Home") { echo 'class="active"';}?>><a href="home.php"><span>Home</span></a></li>
        <li <?php if($Active == "Images") { echo 'class="active"';}?>><a href="images.php"><span>Images</span></a></li>
        <li <?php if($Active == "Messages") { echo 'class="active"';}?>><a href="messages.php"><span>Messages</span></a></li>
        <li class="last"><a href="logout.php"><span>Logout</span></a></li>
      </ul>
    </div>
    <?php } ?>
