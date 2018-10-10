<?php
// connect to DB
require_once 'php/connectTosql.php';
$message="";
if (isset($_SESSION['emailconfirm']) and $_SESSION['emailconfirm'] == 1) {
  $organizerid=$_SESSION['organizerID'];
  // this section for get the event name fro DB
  $query = mysqli_query($con,"SELECT * FROM event where organizer_ID=  '$organizerid' ")or die(mysqli_error($con));
    
  if (isset($_POST['add'])) {
    $eventName  = $_POST['eventName'];
    $normalTemplete=$_POST['fileToUploadNormal'];
    $VIPTemplete=$_POST['fileToUploadVIP']; 
    $exitevent= false;
    
    if($normalTemplete=="" && $VIPTemplete=="" ) {

      $message=" <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  يجب عليك اضافة قالب واحد على الاقل 
                </div> ";}

                else {
                  while ($row = mysqli_fetch_array($query)):
                    if($row['event_ID']==$eventName){
                    $message=" <div class='alert alert-danger alert-dismissible'>
                       <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        لم تتم عملية اضافة قوالب بطاقات لان هناك قولب بطاقات لهذا الحدث
                       </div> ";
                       $exitevent= true;
                      }

                   endwhile;

                  if (!$exitevent){
                  $sql = mysqli_query($con, "INSERT INTO badge ( badge_ID, badge_noemal_templete , badge_VIP_templete ,event_ID) 
                 VALUES ('','$normalTemplete','$VIPTemplete','$eventName')")or die(mysqli_error($con));
                 ///Check if add badge to DB has been done Successfully
                       if($sql)
                       header("location: /tactic/manageBadge.php");
                       else{
                         $message=" <div class='alert alert-danger alert-dismissible'>
                       <button type='button' class='close' data-dismiss='alert'>&times;</button>
                       <strong> فشل</strong>  لم تتم عملية الاضافة  يرجى التحقق
                       </div> "; } 
                  }//end if (!$exitevent)
                
}
}
}
 else {
 echo " <div class='alert alert-danger alert-dismissible'>
       <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong> يرجى</strong>   تثبيت الايميل لكي تتمكن من أضافة حدث
       </div> "; }
?>




<!DOCTYPE html>
<html lang="ar">

<head>
  <title>إضافة بطاقة تعريفية </title>
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


  <!-------------------------------------------------------------------------->

</head>

<body>
  <div id="includedContent"></div>
  <div id="includedContent2"></div>
  <div class="mainContent">
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panelTitle"> إضافة بطاقة تعريفية </h4>
        </div>
        <div class="panel-body">

          <form action="" class="formDiv" method="post" >
<?php 
echo $message;
?>
            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="eventName" class="control-label"> اسم الحدث</label>
                <select class="form-control" id="eventName" name="eventName" >
                  <?php
                  while ($row = mysqli_fetch_array($query)):
                  echo "<option value='" . $row['event_ID'] . "'>" . $row['name_Event'] . "</option>";
                  ?>
                  <?php endwhile;?>
     
                </select>
              </div>
            </div>
           

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="eventName" class="control-label">  ارفاق قالب الاشخاص العاديين</label>
                <input type="file" class="form-control" id="fileToUploadNormal"  name="fileToUploadNormal" >
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label for="eventName" class="control-label"> ارفاق قالب الشخصيات الهامة</label>
                <input type="file" class="form-control" id="fileToUploadVIP"  name="fileToUploadVIP" >
              </div>
            </div>

           

           <a  href="/tactic/manageBadge.php"   class="bodyform btn btn-nor-danger btn-sm">عودة</a>
            <input type="submit" value="اضافة" name="add" class="btn btn-nor-primary btn-lg enable-overlay">

        </div>
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
      $("#includedContent").load("php/TopNav.php");
      $("#includedContent2").load("HTML/rightNav.html");
    });
  </script>

</body>
</html>