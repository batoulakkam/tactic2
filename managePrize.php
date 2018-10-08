<?php
//conect to database
require_once 'php/connectTosql.php';

//if (isset($_SESSION['emailconfirm']) and $_SESSION['emailconfirm'] == 1) {
    //$organizerid=$_SESSION['organizerID'];
$sql =  "SELECT ev.name_Event,pr.prize_ID ,pr.namePrize 
FROM event ev INNER JOIN prize pr ON ev.event_ID = pr.event_ID" ; 
    $query = mysqli_query($con, $sql) or die(mysqli_error($con));



 // end Search 

///delete badge
if (isset($_GET['eventId']) && $_GET['eventId'] != '') {
 //retreive the hidden id in modal
 $eventId = $_GET['eventId'];
 $sql     = "delete from  prize  WHERE  prize_ID = '$eventId'";
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
<!-- lobrary of icon  fa fa- --->
<title>إدارة الجوائز</title>

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
                    <h4 class="panelTitle">إدارة الجوائز</h4>
                </div>
                <div class="panel-body">

                    <form action="manageBadge.php" class="manageBadgeFrm" method="Get">

                        <div class="col-md-12">
                            <div class="form-group form-group-lg">
                                <label for="eventName" class="control-label"> بحث </label>
                                <input type="text" class="form-control" id="txtSearshValue" name="searshValue" placeholder="بحث باسم الحدث او اسم الجائزة  ...">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-group-lg">
                                <input type="submit" value="بحث" name="update" class="btn btn-nor-primary btn-sm">
                                <a class="btn btn-nor-primary btn-sm" href="addPrize.php"> إضافة جائزة جديدة</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <table class="table table-striped">
                <tr>
                    <th>  اسم الحدث</th>
                    <th>  الجائزة  </th>
                    <th> خيارات </th>
                </tr>




<?php

while ($row = mysqli_fetch_array($query)):

 echo "<tr>";
 echo "<td>" . $row['name_Event'] . "</td>";
 echo "<td><a  href='subEventDetails.php?subeventid=" . $row['prize_ID'] . "'>" . $row['namePrize'] . "</a></td>";
 echo "<td> <a id='aEditsubEvent' href='editPrize.php?subeventid=" . $row['prize_ID'] . "'><span class='fa fa-edit' style='font-size:24px;'></span></a>
		        <a href='#' id='aDeletEvent' class='adelete' data-id=" . $row['prize_ID'] . "><span  class=' fa fa-trash' style='font-size:24px;color:red;  '></span> </a></td>
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
                        <h4 class="modal-title">حذف  جائزة</h4>
                    </div>
                    <div class="modal-body">
                        <p>هل انت متأكد من حذف الجائزة</p>
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