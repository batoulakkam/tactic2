<?php
require_once 'php/connectTosql.php';

// if (isset($_SESSION['emailconfirm']) and $_SESSION['emailconfirm'] == 1) {
// this section for get the event name fro DB
//$query = mysqli_query($con, "SELECT * FROM event where organizer_ID= '$organizerid'") or die(mysqli_error($con));
//رح جيب معلومات الجوائز عن طريق ID
if (isset($_GET['prizeId'])) {
    $prizeId     = filter_var($_GET['prizeId'], FILTER_SANITIZE_NUMBER_INT); //هون ضمنت اني جبت بيانات نضيفة 
    $prizeSelect = mysqli_query($con, "SELECT * FROM prize WHERE Prize_ID = '$prizeId'");
     // مشان اطبع الاسماء 
    while ($row = mysqli_fetch_assoc($prizeSelect)) {
        $namePrize    = $row['namePrize'];
        $numOfPrize   = $row['numOfPrize'];
        $name_Event   = $row['name_Event'];
        $nameSubEvent = $row['nameSubEvent'];
        $event_ID     = $row['event_ID'];
        $subevent_ID  = $row['subevent_ID'];

    }

}
//رح عدل معلومات الجائزة حسبب شو اخترت و كمان حسب ID
if (isset($_POST['update'])) {
///// chech the spelling of $subID
    // $subEventID    = $_GET['subeventid'];
    $prizeName   = $_POST['prizeName'];
    $numOfPrize  = $_POST['prizeNum'];
    $subeEventid = $_POST['SubEventName'];
    $eventID     = $_POST["eventName"];
    $sql         = mysqli_query($con, "UPDATE prize SET namePrize='$prizeName',numOfPrize ='$numOfPrize',event_ID='$eventID',subevent_ID='$subeEventid' WHERE Prize_ID ='$prizeId'") or die(mysqli_error($con));
    if (isset($sql)) {
        header("location:/tactic/managePrize.php");

    } else {
        echo " <div class='alert alert-danger alert-dismissible'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong> فشل</strong>   عملية التعديل  يرجى التحقق
</div> ";
    }

}

?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <title>تعديل الجائزة </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' type='text/css' />
  <link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' type='text/css' />
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
  <link rel="stylesheet" href="css/layouts/custom.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/icon.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main-rtl.css">

  <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon" />

</head>

<body>
  <div id="includedContent"></div>
  <div id="includedContent2"></div>
  <div class="mainContent">
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panelTitle"> تعديل الجائزة  </h4>
        </div>
        <div class="panel-body">

          <form action="" class="formDiv" method="post">

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="eventName" class="control-label"> اسم الحدث</label>
                <input type="hidden" id="subId" name="subevent_ID" value="<?php echo $subevent_ID; ?>">
  <select class="form-control" id="eventName" name="eventName" onChange="change_event()" >
    <?php
// هنا اقوم بجلب بيانات الحدث
$query = mysqli_query($con, "SELECT * FROM event ") or die(mysqli_error($con));
while ($row = mysqli_fetch_assoc($query)):
    $eventID = $row['event_ID'];
    ?>


           <option <?php echo ($row['event_ID'] == $event_ID ? "selected='selected'" : "") ?> value="<?php echo $row['event_ID']; ?>"><?php echo $row['name_Event']; ?></option>


               <?php
endwhile;

?>
 </select>
              </div>
            </div>

             <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="eventName" class="control-label">   اسم الحدث الفرعي </label>
               <select class="form-control" id="SubEventName" name="SubEventName" >

                </select>
              </div>
            </div>
             <div class="col-md-12">
                <div class="form-group form-group-lg">
                <label for="eventName" class="control-label"> اسم الجائزة</label>
                <input type="text" class="form-control" id="prizeName"  name="prizeName" value="<?php echo $namePrize ?>" required>
              </div>
            </div>

               <div class="col-md-12">
              <div class="form-group form-group-lg">
                   <label for="txtMaxAttendee" class="control-label"> عدد الجوائز</label>
                 <input type="number" class="form-control" id="txtSubEventName"  name="prizeNum" value = "<?php echo $numOfPrize ?>" required>
                  </div>
                 </div>

           <a  href="/tactic/manageSubEvent.php"  class="bodyform btn btn-nor-danger btn-sm">رجوع</a>
            <input type="submit" value="تعديل" name="update" class="btn btn-nor-primary btn-lg enable-overlay">



        </form>

      </div>
    </div>
  </div>

  <!-- end of  register inputs -->
 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  // this part for call navBar
    $(function () {
    //  $("#includedContent").load("php/TopNav.php");
     // $("#includedContent2").load("HTML/rightNav.html");
    });
  </script>


  <script>
//هنا عندما يتم تحميل الصفحة اقوم بجلب الاحدات الرئيسية حسب الحدث الأب الخاص بهم
$( document ).ready(function() {
  var subId =  $('#subId').val();
  //استدعيت الدالة هنا لكي اجلب الأحداث الرئيسة بدون ما انتظر حتى يقوم المستخدم بتغيير الحدث افتراضيا يأتي بالحدث الفرعي الذي يحمل نفس رقم الحدث الاب
     change_event(subId);
});
//هذه دالة عندما يتم تغيير خانة الحدث او تحميل الصفحة اقوم بإستدعائها
function change_event(id){
 var eventid =  document.getElementById("eventName").value;
$.get("ajax.php?Eventname="+eventid+"&subid="+id, function(data, status){
    if(status == "success"){
      $("#SubEventName").html(data);
     }

    });


    }

</script>



</div>
</body>
</html>
