<?php
require_once('php/connectTosql.php');
// لا تنسي تشيلي الكومنت عن السيشين 
//if(isset($_SESSION['orgEmail']) && !empty($_SESSION['password'])) {
 //  header('Location:LogIn.php');
// $organizerID = $_SESSION['organizerID'];
// الكويري هيك لازم تكون 
//("SELECT name_Event FROM `event` WHERE `organizer_ID` = '$organizerID'")
$query = mysqli_query($con,"SELECT * FROM event")or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="ar">
<head>
<title>إضافة حدث فرعي  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="css/layouts/custom.css">
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <!-- lobrary of icon  fa fa- --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <!-- lobrary of style bootstrab 3  --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- lobrary of style bootstrab 4  --->

    
    <!-------------------------------------------------------------------------->

    <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon" />
    <script src="jquery.js"></script> 
    <script> 
    $(function(){
      $("#includedContent").load("php/TopNav.php"); 
		$("#includedContent2").load("HTML/rightNav.html"); 
    });
    </script>
</head>
<body>
<div id="includedContent"></div>
<div id="includedContent2"></div>

  
  <div class="mainContent">
    <div class="pageTitel">
       <h1> إضافة  حدث  فرعي </h1>
          </div>
    <div class ="container">
        <form action="" method="post" class="formDiv">
            
            <table class="tabelForm">
    <tr>
    <td> 
        <select id="addSubEvent" name="addSubEvent" style=" width:400px"  dir="rtl">
       <?php
			while ($row = mysqli_fetch_array($query)):
			echo "<option value='" . $row['event_ID'] . "'>" . $row['name_Event'] . "</option>";
    ?>
	     <?php endwhile;?>
     
            </select></td>
                <td class="leftTd">  <label for="fname">: اسم الحدث الرئيسي </label></td>
                
                </tr>
				
				 <tr>
    
    <td class="rightTd">  <input type="text" id="sname" name="Sname" placeholder=" اسم الحدث الفرعي " style=" width:400px" required dir ="rtl"></td>
      <td class="leftTd">  <label for="sname">: اسم الحدث الفرعي </label></td>
  </tr>
  
   <tr>
    <td><textarea id="subdescription" name="subDescription" placeholder="وصف الحدث " style="height:150px ; width:400px" dir ="rtl"></textarea></td>
    <td><label for="subdescription"> : وصف الحدث الفرعي </label></td>
  </tr>
  
  <tr>
   <td> <input type="reset" value="الغاء" class="btn btn-danger" >
   <input type="submit" value="إضافة" name="save" data-toggle="tooltip" data-placement="bottom"  class="btn btn-primary" >
     </td>
	      <?php
    if(isset($_POST['save'])){
        $eventID = $_POST["addSubEvent"];
        $subName = $_POST["Sname"];
        $disSub = $_POST["subDescription"];
        $sql = mysqli_query($con, "INSERT INTO subevent ( subevent_ID, event_ID, nameSubEvent ,description_subevent) VALUES ('','$eventID','$subName','$disSub')")or die(mysqli_error());
  		if($sql)
            echo " <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> تم </strong>  أضافة حدث فرعي جديد 
       </div> ";
         else{
             echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل</strong>  لم تتم عملية الاضافة بنجاح يرجى التحقق
       </div> ";
        } 


    }

                        


    ?>

  </tr> 
</table>
        
  </form>

    </div>        
  </div>
</div>


<script src="js/javaScriptfile.js"></script>
</body>
</html>
