<!DOCTYPE html>
<?php
$TEMP = 0;
$HUM = 0;
$MOTION = 0;
$LPG = 0;
$SMOKE = 0;

  $con=mysqli_connect('localhost', 'root', 'admin','safetybox');

  if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $result = mysqli_query($con,"SELECT * FROM dataset WHERE RowCount=(SELECT max(RowCount) FROM dataset) LIMIT 0, 1000");
  while($row = mysqli_fetch_array($result))
  {
  $TEMP =  $row['TEMP'] . "</td>";
  $HUM = $row['HUM'] . "</td>";
  $MOTION = $row['MOTION'] . "</td>";
  $LPG = $row['LPG'] . "</td>";
  $SMOKE = $row['SMOKE'] . "</td>";
  }
  mysqli_close($con);
?>

<html>
  <head>
    <title>Sensor</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/sensor/styles.css" type="text/css" rel="stylesheet"/>
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
    <script src="files/sensor/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u12" class="ax_default box_1">
        <img id="u12_img" class="img " src="images/main/u0.svg"/>
        <div id="u12_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Image) -->
      <div id="u13" class="ax_default image">
        <img id="u13_img" class="img " src="images/main/u1.png"/>
        <div id="u13_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u14" class="ax_default heading_1">
        <div id="u14_div" class=""></div>
        <div id="u14_text" class="text ">
          <p><span>Current sensor data:</span></p>
        </div>
      </div>

      <!-- Unnamed (Table) -->
      <div id="u15" class="ax_default">

        <!-- Unnamed (Table Cell) -->
        <div id="u16" class="ax_default table_cell">
          <img id="u16_img" class="img " src="images/sensor/u16.png"/>
          <div id="u16_text" class="text ">
            <p><span>Temp</span></p>
          </div>
        </div>

        <!-- Unnamed (Table Cell) -->
        <div id="u17" class="ax_default table_cell">
          <img id="u17_img" class="img " src="images/sensor/u16.png"/>
          <div id="u17_text" class="text ">
            <p><span>Hum</span></p>
          </div>
        </div>

        <!-- Unnamed (Table Cell) -->
        <div id="u18" class="ax_default table_cell">
          <img id="u18_img" class="img " src="images/sensor/u16.png"/>
          <div id="u18_text" class="text ">
            <p><span>Motion</span></p>
          </div>
        </div>

        <!-- Unnamed (Table Cell) -->
        <div id="u19" class="ax_default table_cell">
          <img id="u19_img" class="img " src="images/sensor/u16.png"/>
          <div id="u19_text" class="text ">
            <p><span>LPG</span></p>
          </div>
        </div>

        <!-- Unnamed (Table Cell) -->
        <div id="u20" class="ax_default table_cell">
          <img id="u20_img" class="img " src="images/sensor/u20.png"/>
          <div id="u20_text" class="text ">
            <p><span>Smoke</span></p>
          </div>
        </div>

        <!-- tempData (Table Cell) -->
        <div id="u21" class="ax_default table_cell" data-label="tempData">
          <img id="u21_img" class="img " src="images/sensor/tempdata_u21.png"/>
          <div id="u21_text" class="text ">
            <p><span><?php echo $TEMP; ?></span></p>
          </div>
        </div>

        <!-- humData (Table Cell) -->
        <div id="u22" class="ax_default table_cell" data-label="humData">
          <img id="u22_img" class="img " src="images/sensor/tempdata_u21.png"/>
          <div id="u22_text" class="text ">
            <p><span><?php echo $HUM; ?></span></p>
          </div>
        </div>

        <!-- motionData (Table Cell) -->
        <div id="u23" class="ax_default table_cell" data-label="motionData">
          <img id="u23_img" class="img " src="images/sensor/tempdata_u21.png"/>
          <div id="u23_text" class="text ">
            <p><span><?php echo $MOTION; ?></span></p>
          </div>
        </div>

        <!-- lpgData (Table Cell) -->
        <div id="u24" class="ax_default table_cell" data-label="lpgData">
          <img id="u24_img" class="img " src="images/sensor/tempdata_u21.png"/>
          <div id="u24_text" class="text ">
            <p><span><?php echo $LPG; ?></span></p>
          </div>
        </div>

        <!-- smokeData (Table Cell) -->
        <div id="u25" class="ax_default table_cell" data-label="smokeData">
          <img id="u25_img" class="img " src="images/sensor/smokedata_u25.png"/>
          <div id="u25_text" class="text ">
            <p><span><?php echo $SMOKE; ?></span></p>
          </div>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u26" class="ax_default primary_button">
        <div id="u26_div" class=""></div>
        <div id="u26_text" class="text ">
          <p><span>Refresh</span></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>
