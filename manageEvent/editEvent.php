<?php
require_once 'php/connectTosql.php';

if (isset($_SESSION['emailconfirm']) and $_SESSION['emailconfirm'] == 1) {

 if (isset($_POST['update'])) {
  $eventId          = $_GET['eventid'];
  $eventName        = $_POST['eventName'];
  $EventDescription = $_POST['description'];
  $sdate            = $_POST['sdaytime'] . ' 00:00:00.000';
  $datestart        = date('Y-m-d', strtotime($sdate));
  $edate            = $_POST['edaytime'] . ' 00:00:00.000';
  $dateend          = date('Y-m-d', strtotime($edate));
  $location         = $_POST['location'];
  $organizationName = $_POST['organizer'];
  $maxAttendee      = $_POST['maxAttendee'];
  if ($datestart > $dateend) {
   echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل  </strong>  يرجى التحقق من تاريخ بداية ونهاية الحدث
       </div> ";
  } else {

   $IDT = $_SESSION['organizerID'];

   $sql = " update event set
   name_Event='$eventName',
   descrption_Event='$EventDescription',
   sartDate_Event='$datestart',
   endDate_Event='$dateend',
   location_Event='$location',
   organization_name_Event='$organizationName',
   maxNumOfAttendee='$maxAttendee'
   where event_ID ='$eventId' ";

   $sql = mysqli_query($con, $sql) or die(mysqli_error($con));

   if ($sql) {
    header("location: /tactic/manageEvent.php");
    exit;
   } else {
    echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل</strong>  لم تتم عملية الاضافة بنجاح يرجى التحقق
       </div> ";
   }
  }}
} else {
 echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> يرجى</strong>   تثبيت الايميل لكي تتمكن من أضافة حدث
       </div> ";
}

$query = null;
if (isset($_GET['eventid']) && $_GET['eventid'] != '') {
 $eventId = $_GET['eventid'];
 $query   = mysqli_query($con, "SELECT * FROM event  WHERE event_ID ='$eventId' ") or die(mysqli_error($con));
 if ($query == null) {
//TODO
  //show hime error message to tell him that the id is not exist
 }
} else {
 // TODO
 //you shouls redirect him to error page
}

$return_arr = array();
$row        = null;
if ($query) {

 $row              = mysqli_fetch_row($query);
 $evevtID          = $row[0];
 $eventName        = $row[1];
 $EventDescription = $row[2];
 $sdaytime         = $row[3];
 $edaytime         = $row[4];
 $location         = $row[5];
 $organizationName = $row[6];
 $maxAttendee      = $row[8];

}
//Retrieve inserted values:*/
?>
<!DOCTYPE html>
<html>

<head>
  <title>تعديل حدث </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- lobrary of icon  fa fa- --->


  <link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' type='text/css' />
  <link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' type='text/css' />
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
  <link rel="stylesheet" href="css/layouts/custom.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/icon.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main-rtl.css">

  <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon" />


  <!-------------------------------------------------------------------------->

</head>

<body>
  <div id="includedContent"></div>
  <div id="includedContent2"></div>
  <div class="mainContent">
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panelTitle" >تعديل حدث </h4>
        </div>
        <div class="panel-body">

          <form action="" class="formDiv" method="post">

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="eventName" class="control-label"> اسم الحدث</label>
                <input type="text" class="form-control" id="txtEventName"  name="eventName" value="<?php echo $eventName ?>"
                  required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="txtOrganizer" class="control-label">اسم الشركة المنظمة</label>
                <input type="text" class="form-control" id="txtOrganizer" name="organizer"
                value="<?php echo $organizationName ?>"
                  required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="txtMaxAttendee" class="control-label"> الحد الاقصى</label>
                <select id="txtMaxAttendee" name="maxAttendee" class="form-control" value="<?php echo $maxAttendee ?>">
                  <option value="100" <?php if ($maxAttendee == "100") {echo ' selected="selected"';}?> >100</option>
                  <option value="200" <?php if ($maxAttendee == "200") {echo ' selected="selected"';}?>>200</option>
                  <option value="500" <?php if ($maxAttendee == "500") {echo ' selected="selected"';}?>>500</option>
                  <option value="1000" <?php if ($maxAttendee == "1000") {echo ' selected="selected"';}?>>1000</option>
                  <option value="1500" <?php if ($maxAttendee == "1500") {echo ' selected="selected"';}?>>1500</option>
                  <option value="2000" <?php if ($maxAttendee == "2000") {echo ' selected="selected"';}?>>2000</option>
                  <option value="unfinite" <?php if ($maxAttendee == 'unfinite') {echo ' selected="selected"';}?>>غير
                    محدود</option>
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="txtLocation" class="control-label">مكان الحدث</label>
                <input type="text" class="form-control" id="txtLocation" name="location" value="<?php echo $location ?>"
                  required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="txtSdaytime" class="control-label">تاريخ بدء الحدث</label>
                <input type="date" class="form-control" id="txtSdaytime" name="sdaytime" value="<?php echo $sdaytime ?>"
                  required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="txtEdaytime" class="control-label">تاريخ نهاية الحدث</label>
                <input type="date" class="form-control" id="txtEdaytime" name="edaytime" value="<?php echo $edaytime ?>"
                  required>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="txtDescription" class="control-label">وصف الحدث</label>
                <textarea type="textarea" class="form-control" id="txtDescription" rows="3" name="description" required><?php echo $EventDescription ?></textarea>
              </div>
            </div>

            <a  href="/tactic/manageEvent.php"  class="bodyform btn btn-nor-danger btn-sm">عودة</a>
             <input type="submit" value="تعديل" name = "update" class="btn btn-nor-primary btn-lg enable-overlay">

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/appjs/event.js"></script>
  <script src="js/appjs/common.js"></script>

  <script>
    $(function () {
      $("#includedContent").load("php/TopNav.php");
      $("#includedContent2").load("HTML/rightNav.html");
    });
  </script>

</body>

</html>
