﻿<?php
$result = 0;
$HUM = 0;
$MOTION = 0;
$LPG = 0;
$SMOKE = 0;

  $con=mysqli_connect('localhost', 'root', 'admin','safetybox');

  if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $empty = mysqli_query($con,"DELETE FROM ALERT");
  if($empty != 0)
    $result = mysqli_query($con,"INSERT INTO alert (ISALERT, ALERTTEXT) VALUES (0, 'No alerts')");
  mysqli_close($con);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Clear</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/clear/styles.css" type="text/css" rel="stylesheet"/>
    <script src="resources/scripts/jquery-3.2.1.min.js"></script>
    <script src="resources/scripts/axure/axQuery.js"></script>
    <script src="resources/scripts/axure/globals.js"></script>
    <script src="resources/scripts/axutils.js"></script>
    <script src="resources/scripts/axure/annotation.js"></script>
    <script src="resources/scripts/axure/axQuery.std.js"></script>
    <script src="resources/scripts/axure/doc.js"></script>
    <script src="resources/scripts/messagecenter.js"></script>
    <script src="resources/scripts/axure/events.js"></script>
    <script src="resources/scripts/axure/recording.js"></script>
    <script src="resources/scripts/axure/action.js"></script>
    <script src="resources/scripts/axure/expr.js"></script>
    <script src="resources/scripts/axure/geometry.js"></script>
    <script src="resources/scripts/axure/flyout.js"></script>
    <script src="resources/scripts/axure/model.js"></script>
    <script src="resources/scripts/axure/repeater.js"></script>
    <script src="resources/scripts/axure/sto.js"></script>
    <script src="resources/scripts/axure/utils.temp.js"></script>
    <script src="resources/scripts/axure/variables.js"></script>
    <script src="resources/scripts/axure/drag.js"></script>
    <script src="resources/scripts/axure/move.js"></script>
    <script src="resources/scripts/axure/visibility.js"></script>
    <script src="resources/scripts/axure/style.js"></script>
    <script src="resources/scripts/axure/adaptive.js"></script>
    <script src="resources/scripts/axure/tree.js"></script>
    <script src="resources/scripts/axure/init.temp.js"></script>
    <script src="resources/scripts/axure/legacy.js"></script>
    <script src="resources/scripts/axure/viewer.js"></script>
    <script src="resources/scripts/axure/math.js"></script>
    <script src="resources/scripts/axure/jquery.nicescroll.min.js"></script>
    <script src="data/document.js"></script>
    <script src="files/clear/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u27" class="ax_default heading_1">
        <div id="u27_div" class=""></div>
        <div id="u27_text" class="text ">
          <p><span>Clearing alerts, please wait...</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u28" class="ax_default box_1">
        <img id="u28_img" class="img " src="images/main/u0.svg"/>
        <div id="u28_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Image) -->
      <div id="u29" class="ax_default image">
        <img id="u29_img" class="img " src="images/main/u1.png"/>
        <div id="u29_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u30" class="ax_default primary_button">
        <div id="u30_div" class=""></div>
        <div id="u30_text" class="text ">
          <p><span>Manual refresh (click this if you're stuck)</span></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>

<?php
  if($result)
  {
      sleep(2);
      header("Location: /SafetyBox2/alerts.php");
      exit();
  }
?>