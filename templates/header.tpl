<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$Description}">
    <meta name="keywords" content="{$Keywords}">
    <title>{$Title} | {$Page}</title>
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar">
      <ul>
        <li {if $Active eq "Home"}class="active"{/if}><a href="index.php"><span>Home</span></a></li>
        <li {if $Active eq "Gallery"}class="active"{/if}><a href="gallery.php"><span>Gallery</span></a></li>
        <li {if $Active eq "AboutUs"}class="active"{/if}><a href="about.php"><span>About Us</span></a></li>
        <li class="{if $Active eq "Contact"}active {/if}last"><a href="contact.php"><span>Contact</span></a></li>
      </ul>
    </div>
