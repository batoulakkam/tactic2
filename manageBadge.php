<?php
//conect to database
require_once 'php/connectTosql.php';

if (isset($_SESSION['emailconfirm']) and $_SESSION['emailconfirm'] == 1) {
    $organizerid=$_SESSION['organizerID'];

// Search for  event name and badge type
if (isset($_GET['searshValue']) && $_GET['searshValue'] != '') {
    $sershValue = $_GET['searshValue']; 
$query = mysqli_query($con, "SELECT ev.name_Event,ba.badge_ID 
FROM event ev INNER JOIN badge ba ON ev.event_ID = ba.event_ID
where ev.organizer_ID = '$organizerid'and ev.name_Event like '%$sershValue%' " 
) or die(mysqli_error($con));
} // end Search 

// this query for present all badges that related to organizer 
else{
    $query = mysqli_query($con, "SELECT ev.name_Event,ba.badge_ID 
FROM event ev INNER JOIN badge ba ON ev.event_ID = ba.event_ID
where ev.organizer_ID = '$organizerid'" 
) or die(mysqli_error($con));
}

///delete badge
if (isset($_GET['eventId']) && $_GET['eventId'] != '') {
 //retreive the hidden id in modal
 $eventId = $_GET['eventId'];
 $sql     = "delete from  badge  WHERE  badge_ID = '$eventId'";
 $query   = mysqli_query($con, $sql) or die(mysqli_error($con));

 //succsess to retreive id

 if ($query) {
  $retVal = true;
  echo json_encode($retVal); //convert value to client side jQ
  exit;
 } else {
  $retVal = false;
  echo json_encode($retVal);
  exit;

 }

} else {
 echo " Id is not set";
}

}else {
    $message= " <div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong> يرجى</strong>   تثبيت الايميل لكي تتمكن من أضافة حدث
          </div> ";
   }
?>
<!-- lobrary of icon  fa fa- --->
<title>إدارة البطاقات التعريفية</title>

<link href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' rel='stylesheet' type='text/css' />
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
                    <h4 class="panelTitle">إدارة البطاقات التعريفية</h4>
                </div>
                <div class="panel-body">

                    <form action="manageBadge.php" class="manageBadgeFrm" method="Get">

                        <div class="col-md-12">
                            <div class="form-group form-group-lg">
                                <label for="eventName" class="control-label"> بحث </label>
                                <input type="text" class="form-control" id="txtSearshValue" name="searshValue" placeholder="بحث باسم الحدث  ...">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-group-lg">
                                <input type="submit" value="بحث" name="update" class="btn btn-nor-primary btn-sm">
                                <a class="btn btn-nor-primary btn-sm" href="addBadge.php"> إضافة بطاقة تعريفية</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <table class="table table-striped">
                <tr>
                    <th> اسم الحدث </th>
                    <th> خيارات </th>
                </tr>




<?php

while ($row = mysqli_fetch_array($query)):

 echo "<tr>";
 echo "<td>" . $row['name_Event'] . "</td>";
 echo "<td> <a id='aEditbadge' href='editBadge.php?eventid=" . $row['badge_ID'] . "'><span class='fa fa-edit' style='font-size:24px;'></span></a>
		        <a href='#' id='aDeletBadge' class='adelete' data-id=" . $row['badge_ID'] . "><span  class=' fa fa-trash' style='font-size:24px;color:red;  '></span> </a>
		        <a href='#'   class='adownload' data-id=" . $row['badge_ID'] . "><span  class=' glyphicon glyphicon-download-alt ' style='font-size:20px;  '></span> </a></td>
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
                        <h4 class="modal-title">حذف  بطاقة</h4>
                    </div>
                    <div class="modal-body">
                        <p>هل انت متأكد من حذف البطاقة</p>
                        <input type="hidden" id="hdEventId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        <button type="button" id="btnConfirmDelete" class="btn btn-primary">تأكيد الحذف</button>
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