<?php
require_once('php/connectTosql.php');
$query = mysqli_query($con," SELECT event_ID , name_Event
FROM
  event 

")or die(mysqli_error());


/*if($query){
		
		while ($row= mysql_fetch_array($query))
		{
            $eventName = $row['name_Event'];
            $EventDescription = $row['descrption_Event'];
            $sdaytime = $row['sartDate_Event'];
            $edaytime = $row['ndDate_Event'];
            $location = $row['location_Event'];
            $organizationName = $row['organization_name_Event'];
            $maxAttendee = $row['descrption_Event'];
		
		
		}//end while
}
  //Retrieve inserted values:*/
?>

  
  <!DOCTYPE html>
<html lang="ar">
<head>
<title>تعديل حدث </title>
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
       <h1>تعديل حدث   </h1>
          </div>
    <div class ="container">
        <form action="" class="formDiv" method="post">
            
            <table class="tabelForm">
        <tr>  <td> 
        <select id="editEvent" name="editEvent" style=" width:400px"  dir="rtl">
      <?php
			while ($row = mysqli_fetch_array($query)):
			echo "<option value='" . $row['event_ID'] . "'>" . $row['name_Event'] . "</option>";
    	?>
	     <?php endwhile;?>
     
            </select></td>
                <td class="leftTd">  <label for="fname">: اختر الحدث </label></td>
                
                </tr>
       <tr>
    
    <td class="rightTd">  <input type="text" id="eventName" name="eventName" placeholder=" اسم الحدث " style=" width:400px" required ></td>
      <td class="leftTd">  <label for="fname">: اسم الحدث </label></td>
  </tr>
  <tr>
    <td>   <input type="text" id="lname" name="organizer" placeholder="اسم الشركة"  style=" width:400px" required></td>
    <td><label for="lname"> : اسم الشركة المنظمة </label></td>
  </tr>
  <tr>
    <td><input type="text" id="phone" name="phone" placeholder="رقم الهاتف "  style=" width:400px" ></td>
    <td>  <label for="phone"> : رقم الهاتف </label></td>
  </tr>
                
     <tr>
    <td> 
        <select id="maxAttendee" name="maxAttendee"  style=" width:400px"  dir="rtl">
          <option value="100">100</option>
          <option value="200">200</option>
          <option value="500">500</option>
            <option value="1000">1000</option>
            <option value="1500">1500</option>
            <option value="2000">2000</option>
            <option value="unfinite">غير محدود</option>
        </select></td>
    <td>  <label for="maxAttendee"> : الحد الاقصى </label></td>
  </tr>

     <tr>
    <td> <textarea id="location" name="location" placeholder="وصف مكان الحدث " style="height:75px ; width:400px"></textarea>
   </td>
    <td><label for="location">  : مكان الحدث</label></td>
  </tr>

                
 <tr>
    <td><input type="date" name="sdaytime"  style=" width:400px"></td>
    <td>  <label for="startDate"> : تاريخ بدء الحدث  </label></td>
  </tr>
                
               
 <tr>
    <td><input type="date" name="edaytime"  style=" width:400px" ></td>
    <td><label for="endDate"> : تاريخ نهاية الحدث  </label></td>
  </tr>
 <tr>
    <td><textarea id="description" name="description" placeholder="وصف الحدث " style="height:150px ; width:400px"></textarea></td>
    <td><label for="description"> : وصف الحدث </label></td>
  </tr> 
                
 <tr>
   <td> <input type="submit" value="تعديل" name = "save" data-toggle="tooltip" data-placement="bottom" title="اضغط لحفظ التعديلات" class="btn btn-primary"  center>
     <input type="reset" value="الغاء" class="btn btn-danger"></td>
  </tr>
	<?php

      if(isset($_POST['save'])){

    $eventID = $_POST['editEvent'];
	$eventName = $_POST['eventName'];
    $EventDescription = $_POST['description'];
    $sdaytime = $_POST['sdaytime'];
    $edaytime = $_POST['edaytime'];
    $location = $_POST['location'];
    $organizationName = $_POST['organizer'];
    $maxAttendee = $_POST['maxAttendee'];


    $sql = mysqli_query($con, "UPDATE event SET name_Event='$eventName' ,description_Event='$EventDescription',sartDate_Event='$sdaytime',endDate_Event='$edaytime',location_Event='$location',organization_name_Event='$organizationName',maxNumOfAttendee='$maxAttendee'
	WHERE event_ID ='$eventID'");

 		if($sql)
            echo " <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> تم </strong>  تعديل الحدث  بنجاح 
       </div> ";
         else{
             echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل</strong>   عملية التعديل يرجى التحقق
       </div> ";
        } 
    }

                        


    ?>

</table>
        
  </form>

    </div>        
  </div>
</div>



<script src="js/javaScriptfile.js"></script>

</body>
</html>