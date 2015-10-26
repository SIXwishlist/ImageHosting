<?php
  $ROOT = dirname(__FILE__);
  include $ROOT."/../core/config.php";
  include $ROOT."/../core/admin-session.php";

  $Page = "Messages";
  $Active = "Messages";

  try {
    $SQL = "SELECT * FROM Messages ORDER BY ID DESC";
    $SQL = $CONN->prepare($SQL);
    $SQL->execute();
    $MessagesCount = $SQL->rowCount();
    $Messages = $SQL->fetchAll();
  } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
  }

  include "layout/header.php";
?>
    <div class="content">
      <div class="border-box">
        <?php
          if($MessagesCount > "0") {
            foreach($Messages as $Message) {
              $TimeDate = explode(" ", $Message["SENT_DATE"]);
              $Time = explode(":", $TimeDate["1"]);
              $Time = $Time["0"].":".$Time["1"];
              $Date = explode("-", $TimeDate["0"]);
              $Date = $Date["2"].".".$Date["1"].".".$Date["0"].".";
              $Message["SENT_DATE"] = $Time." - ".$Date;
        ?>
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $Message["Title"];?><a href="#" onclick="ShowMessage(<?php echo $Message["ID"];?>)" class="message-show pull-right"><b>+</b></a></h3>
          </div>
          <div id="Message-<?php echo $Message["ID"];?>" class="none">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>E-Mail Address</th>
                  <th>User IP:</th>
                  <th>Date:</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $Message["ID"];?></td>
                  <td><?php echo $Message["EmailAddress"];?></td>
                  <td><?php echo $Message["UserIP"];?></td>
                  <td><?php echo $Message["SENT_DATE"];?></td>
                </tr>
              </tbody>
            </table>
            <div class="message-table-border"></div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th><center>Message Content:</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $Message["Content"];?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <?php
            }
          }
        ?>
        <div class="message-margin-bottom"></div>
      </div>
    </div>
<?php
  include "layout/footer.php";
?>
