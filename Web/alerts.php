<?php
$ALERTS = 0;
$ALERTOP = 0;
$ALERTMSG = "No alerts.";

  $con=mysqli_connect('localhost', 'root', 'admin','safetybox');

  if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $result = mysqli_query($con,"SELECT *from ALERT ORDER BY ID DESC LIMIT 1;");
  while($row = mysqli_fetch_array($result))
  {
  $ALERTMSG =  $row['ALERTTEXT'] . "</td>";
  $ALERTS = $row['ISALERT'] . "</td>";
  if($ALERTS >= 1)
    $ALERTOP = 100;
  }
  mysqli_close($con);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Alerts</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/alerts/styles.css" type="text/css" rel="stylesheet"/>
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
    <script src="files/alerts/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u5" class="ax_default box_1">
        <img id="u5_img" class="img " src="images/main/u0.svg"/>
        <div id="u5_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Image) -->
      <div id="u6" class="ax_default image">
        <img id="u6_img" class="img " src="images/main/u1.png"/>
        <div id="u6_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u7" class="ax_default heading_1">
        <div id="u7_div" class=""></div>
        <div id="u7_text" class="text ">
          <p><span>Current alerts:</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u8" class="ax_default primary_button">
        <div id="u8_div" class=""></div>
        <div id="u8_text" class="text ">
          <p><span>Clear alerts</span></p>
        </div>
      </div>

      <!-- icon (Shape) -->
      <div id="u9" class="ax_default icon" data-label="icon" style="opacity: <?php echo $ALERTOP; ?>;">
        <img id="u9_img" class="img " src="images/alerts/icon_u9.svg"/>
        <div id="u9_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Line) -->
      <div id="u10" class="ax_default line">
        <img id="u10_img" class="img " src="images/alerts/u10.svg"/>
        <div id="u10_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- alertLbl (Rectangle) -->
      <div id="u11" class="ax_default label" data-label="alertLbl">
        <img id="u11_img" class="img " src="images/alerts/alertlbl_u11.svg"/>
        <div id="u11_text" class="text ">
          <p><span><?php echo $ALERTMSG; ?></span></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>
