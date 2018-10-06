<?php
//conect to database 
require_once '../php/connectTosql.php';

 $sql = "SELECT se.nameSubEvent,e.name_Event,se.event_ID,se.subevent_ID,e.event_ID 
        FROM event e INNER JOIN subevent se ON e.event_ID = se.event_ID";

$query = mysqli_query($con, $sql) or die(mysqli_error($con));

///delete sub event
if (isset($_GET['eventId']) && $_GET['eventId'] != '') { //retreive the hidden id in modal
 $eventId = $_GET['eventId'];
 $sql     = "delete from  subevent  WHERE  subevent_ID = '$eventId'";
 $query   = mysqli_query($con, $sql) or die(mysqli_error($con));

 //succsess to retreive id 
 
 if ($query) {
  $retVal = true;
  echo json_encode($retVal);//convert value to client side jQ
  exit;
 } else {
  $retVal = false;
  echo json_encode($retVal);
  exit;

 }

} else {
 echo " Id is not set";
}



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- lobrary of icon  fa fa- --->
<title>إدارة الأحداث الفرعية</title>

<link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' type='text/css' />
  <link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' type='text/css' />
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/layouts/custom.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/icon.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main-rtl.css">
  <link rel="shortcut icon" href="../image/logo.ico" type="image/x-icon" />

<!-------------------------------------------------------------------------->

</head>

<body>
  <div id="includedContent"></div>
  <div id="includedContent2"></div>

  <div class="mainContent">

    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panelTitle">إدارة الأحداث الفرعية</h4>
        </div>
        <div class="panel-body">

          <form action="manageSubEvent.php" class="manageSubEventFrm" method="Get">

            <div class="col-md-12">
              <div class="form-group form-group-lg">
				
                <label for="eventName" class="control-label"> اسم الحدث الفرعي</label>
				  <div class="form-inline">
                <input type="text" class="form-control" id="txtSubEventName" name="SubeventName" style="width:430px" >
				<input type="submit" value="بحث" name="update" class="btn btn-nor-primary btn-sm" style="width:165px">
              </div>
            </div>
			  </div>

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                
                 <a class="btn btn-nor-primary btn-sm" href="addSubEvent.php">إضافة حدث فرعي</a>

              </div>
            </div>
          </form>
        </div>
      </div>


    <table class="table table-striped">
      <tr>
        <th>  اسم الحدث الفرعي</th>
        <th> اسم الحدث </th>
        <th> خيارات </th>
      </tr>

     
          <?php 


              

      while ($row = mysqli_fetch_array($query)):

 echo "<tr>";
 echo "<td><a  href='subEventDetails.php?eventid=" . $row['subevent_ID'] . "'>" . $row['nameSubEvent'] . "</a></td>";
 echo "<td>" . $row['name_Event'] . "</td>";
 echo "<td> <a id='aEditsubEvent' href='editSubEvent.php?eventid=" . $row['subevent_ID'] . "'><span class='fa fa-edit' style='font-size:24px;'></span></a>
		        <a href='#' id='aDeletEvent' class='adelete' data-id=" . $row['subevent_ID'] . "><span  class=' fa fa-trash' style='font-size:24px;color:red;  '></span> </a></td>
		      </tr>";

      ?>
         <?php endwhile;?>


  </table>
 </div>


<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">حذف حدث</h4>
      </div>
      <div class="modal-body">
        <p>هل انت متأكد من حذف الحدث</p>
        <input type="hidden" id="hdEventId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        <button type="button" id="btnConfirmDelete" class="btn btn-primary">تأكيد الحذف</button>
     </div>
    </div>
  </div>
</div>
</div>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/appjs/event.js"></script>
  <script src="../js/appjs/common.js"></script>
  

  <script>
    $(function () {
      $("#includedContent").load("../php/TopNav.php");
      $("#includedContent2").load("../HTML/rightNav.html");
    });
  </script>

</body>

</html>