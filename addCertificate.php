<?php
// connect to DB
require_once 'php/connectTosql.php';

if (isset($_SESSION['emailconfirm']) and $_SESSION['emailconfirm'] == 1) {
  // this section for get the event name fro DB
  $query = mysqli_query($con,"SELECT * FROM event")or die(mysqli_error());

 if (isset($_POST['add'])) {
$eventName  = $_POST['eventName'];
$fileUpload=$_POST['fileToUpload'];

    // add info of new badge to the DB
      
$sql = mysqli_query($con, "INSERT INTO certificate ( certificate_ID, certificate_templet ,event_ID) 
VALUES ('','$fileUpload','$eventName')")or die(mysqli_error($con));
      ///Check if add badge to DB has been done Successfully
        if($sql)
        header("location: /tactic/manageCertificate.php");
        else{
          echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong> فشل</strong>  لم تتم عملية الاضافة بنجاح يرجى التحقق
        </div> ";
        } 

} 
}
else {
    echo " <div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong> يرجى</strong>   تثبيت الايميل لكي تتمكن من أضافة حدث
          </div> ";
   }
?>


<!DOCTYPE html>
<html lang="ar">

<head>
  <title>إضافة شهادة </title>
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
          <h4 class="panelTitle"> إضافة شهادة </h4>
        </div>
        <div class="panel-body">

          <form action="" class="formDiv" method="post">

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
                <label for="eventName" class="control-label"> ارفاق قالب الشهادة</label>
                <input type="file" class="form-control" id="fileToUpload"  name="fileToUpload" required>
              </div>
            </div>

           

           <a  href="/tactic/manageCertificate.php"  class="bodyform btn btn-nor-danger btn-sm">رجوع</a>
            <input type="submit" value="إضافة" name="add" class="btn btn-nor-primary btn-lg enable-overlay">

        </div>
        </form>

      </div>
    </div>
  </div>
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