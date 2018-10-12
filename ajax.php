<?php
require_once 'php/connectTosql.php';
// i هذان السطران للتحقق من ان البيانات المرسلة ارقام فقط
$Eventname   = filter_var($_GET["Eventname"], FILTER_SANITIZE_NUMBER_INT);
$subeEventId = filter_var($_GET['subid'], FILTER_SANITIZE_NUMBER_INT);
// i كويري لجلب معلومات الحدث الفرعي 
echo "sub ", $subeEventId;
$query = mysqli_query($con, "SELECT subevent_ID, nameSubEvent FROM subevent WHERE event_ID =$Eventname");

while ($row = mysqli_fetch_array($query)) {?>

<option <?php echo ($row['subevent_ID'] == $subeEventId ? "selected='selected'" : '') ?> value="<?php echo $row['subevent_ID']; ?>"
   ><?php echo $row["nameSubEvent"]; ?></option>


<?php }?>
