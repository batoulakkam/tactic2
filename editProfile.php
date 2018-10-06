<?php
// conect to database 
require_once('php/connectTosql.php');
if (isset($_SESSION['organizerID'])){
$orgID = $_SESSION['organizerID'];
$query  = mysqli_query($con, "SELECT * FROM account WHERE organizer_ID = '$orgID' ") or die(mysqli_error($con));
$row = null;
if ($query) {
	 $row = mysqli_fetch_row($query);
	 $name= $row[5];
     $email=$row[1];
     $gender=$row[6];
     $DOB=$row[7];
}
$masg = "";
  if (isset( $_POST['submit'])) {
     $name= $_POST['Name'];
     $password =$_POST['Password'];
     $Password2 =$_POST['Password2'];
     $gender=$_POST['gender'];
     $DOB=$_POST['Birthday'];
	  if (time() > strtotime('+18 years', strtotime($DOB))) {

	if($password !=$Password2)
           $masg = " <div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong> حدث خطأ </strong> كلمات المرور غير متطابقة 
          </div> "; 

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	$sql = mysqli_query($con,"UPDATE account SET passwordOrg = '$hashedPassword' , name_org ='$name', gender_org ='$gender', DOB_org = '$DOB'  WHERE organizer_ID ='$orgID'")or die(mysqli_error($con));
		if ($sal !=null)
			$masg =" <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> تم  </strong> تعديل معلوماتك بنجاح  
       </div> ";
	
		}   
else {
			   $masg = " <div class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong> حدث خطأ </strong> لايمكن التسجيل لمن هم دون 18 عام
          </div> ";
		
}
}
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<title> تعديل المعلومات الشخصية  </title>
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

  <!-- Body of register Page -->
  <div class="mainContent">
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panelTitle">تعديل المعلومات الشخصية  </h4>
        </div>
        <div class="panel-body">

          <form action="" class="formDiv" method="post"autocomplete="on">     
            
            <?php  if ($masg !="") echo $masg."<br>"; ?>
			<div class="col-md-12">
          <div class="form-group form-group-lg">
		<label for="eventName" class="control-label"> الاسم: </label> <label style="color:red">*&nbsp; </label>
		<input type="text" class="form-control" id="txtOrganizer" name="Name" value = <?php echo $name ?>  title="هذا الحقل مطلوب" required   >
        </div>
            </div>    
    <div class="col-md-12">
              <div class="form-group form-group-lg">
                <label class="control-label">  البريد الإلكتروني: </label><label style="color:red">*&nbsp; </label>
  				<input type="email" class="form-control" id="email" name="Email" value = <?php echo $email; ?> autocomplete="on" disabled >
 	 </div>
      </div>
  	<div class="col-md-12">
    <div class="form-group form-group-lg">
    <label for="txtMaxAttendee" class="control-label"> كلمة السر :<label style="color:red">*&nbsp; </label> </label>
	<input type="password" class="form-control" id="password"  name="Password" placeholder="       أدخل كلمة السر" autocomplete="on" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="يجب أن تحتوي على الأقل على 8 أحرف و حروف صغيرة و كبيرة" required   >
  </div>
   </div>
	<div class="col-md-12">
    <div class="form-group form-group-lg">
     <label for="txtLocation" class="control-label">تأكيد كلمة السر :</label><label style="color:red">*&nbsp; </label>
	<input type="password" class="form-control" id="confirm_password" name="Password2" placeholder="       تأكيد كلمة السر "  autocomplete="off" required >
	</div>
   </div>
  	<div class="col-md-12">
    <div class="form-group form-group-lg">
     <label for="txtLocation" class="control-label">تاريخ الميلاد :</label><label style="color:red">*&nbsp; </label>
	<input type="date" name="Birthday" class="form-control"  value="<?php echo $DOB ?>"   required   >
	</div>
   </div> 
	<div class="col-md-12">
    <div class="form-group form-group-lg ">
     <label class="control-label form-check" >الجنس :</label><label style="color:red">*&nbsp; </label>
	  <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="انثى" >
          <label class="form-check-label" for="gridRadios1">
            انثى
		  </label>	
		</div>
		  <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="ذكر" >
          <label class="form-check-label" for="gridRadios1">
            ذكر
		  </label>	
		</div>

	</div>
   </div>
  
<a  href="logIn.php"  class="bodyform btn btn-nor-danger btn-sm">رجوع</a>
 <input type="submit" value="الاشترك" name="submit" class="btn btn-nor-primary btn-lg enable-overlay">
      
        </form>

      </div>
    </div>
  </div>
  </div>
 

  <!-- end of  register inputs -->
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