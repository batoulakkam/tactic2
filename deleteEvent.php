<?php
require_once('php/connectTosql.php');
$query=mysqli_query($con,"SELECT event_ID,name_Event FROM `event`")or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="ar">
<head>
<title>حذف حدث </title>
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
       <h1>حذف حدث   </h1>
          </div>
    <div class ="container">
        <form action="" method="post" class="formDiv">
            
            <table class="tabelForm  deleteEventDiv">
          <tr >
       
        
     
    <td> 
        <select id="deleteEvent" name="deleteEvent" style=" width:400px" dir="rtl">
       <?php while($row = mysqli_fetch_array($query)){
        ?><option value="<?php echo $row['event_ID']; ?>"> <?php echo $row['name_Event'];?></option> <?php }?>
     
        </select></td>
         <td id ="titleOfdelete">  <label for="deleteEvent">اختر اسم الحدث </label></td>
         </tr>

        <?php 
	if(isset($_POST['delete'])){
        $event_ID = $_POST['deleteEvent'];
        
	 $sql =mysqli_query($con,"DELETE FROM event WHERE event_ID ='$event_ID'");
 	$sql2 =mysqli_query($con,"DELETE FROM subevent WHERE event_ID ='$event_ID'");
		if($sql)
            echo " <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> تم </strong>  الحذف بنجاح
       </div> ";
               else{
             echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل</strong>   عملية الحذف يرجى التحقق
       </div> ";
        }
    }
 
        
	?>
                
 <tr>
   <td> <input type="submit" value="حذف" name ="delete" class="btn btn-primary" center>
     <input type="reset" value="الغاء" class="btn btn-danger"></td>
  </tr> 
</table>
        
  </form>

    </div>        
  </div>
</div>


<script src="js/javaScriptfile.js"></script>
</body>
</html>