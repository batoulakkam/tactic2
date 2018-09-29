<?php
require_once('php/connectTosql.php');
	
  //Retrieve inserted values:


?>

<!DOCTYPE html>
<html lang="ar">
<head>
<title>إضافة حدث </title>
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
       <h1>إضافة حدث   </h1>
          </div>
    <div class ="container">
        <form action="" class="formDiv" method="post">
          <table class="tabelForm">
    <tr>
  	<td class="rightTd">  <input type="text" id="eventName" name="EventName" placeholder=" اسم الحدث " style=" width:400px" required ></td>
      <td class="leftTd"><label style="color:red">*&nbsp; </label>   <label for="Eventname">: اسم الحدث </label></td>
  </tr>
  <tr>
    <td>   <input type="text" id="organizationName" name="organizationName" placeholder="اسم الشركة"  style=" width:400px" required></td>
    <td><label style="color:red">*&nbsp; </label> <label for="organizationName"> : اسم الشركة المنظمة </label></td>
  </tr>
  <tr>
    <td><input type="text" id="phone" name="Phone" placeholder="رقم الهاتف "  style=" width:400px" ></td>
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
    <td> <textarea id="location" name="location" placeholder="وصف مكان الحدث " required style="height:75px ; width:400px"></textarea>
   </td>
    <td><label style="color:red">*&nbsp; </label> <label for="location">  : مكان الحدث</label></td>
  </tr>

                
 <tr>
    <td><input type="date" name="sdaytime"  required style=" width:400px"></td>
    <td> <label style="color:red">*&nbsp; </label>  <label for="startDate"> : تاريخ بدء الحدث  </label></td>
  </tr>
                
               
 <tr>
    <td><input type="date"   required name="edaytime"  style=" width:400px"></td>
    <td><label style="color:red">*&nbsp; </label> <label for="endDate"> : تاريخ نهاية الحدث  </label></td>
  </tr>
 <tr>
    <td><textarea id="eventDescription" name="EventDescription" placeholder="وصف الحدث " style="height:150px ; width:400px"></textarea></td>
    <td><label for="description"> : وصف الحدث </label></td>
  </tr>  
                
 <tr>
   <td> <input type="submit" value="إضافة" name="add" data-toggle="tooltip" data-placement="bottom" title="اضغط لاضافة حدث" class="btn btn-primary" center>
     <input type="reset" value="الغاء" class="btn btn-danger"></td>
  </tr> 
	<?php
	if(isset($_SESSION['emailconfirm'] ) and $_SESSION['emailconfirm']==1 )
	{
		
	
	if(isset($_POST['add'])){
		$eventName = $_POST['EventName'];
		$EventDescription = $_POST['EventDescription'];
		$sdate = $_POST['sdaytime'] . ' 00:00:00.000';
        $datestart = date('Y-m-d', strtotime($sdate));
		$edate = $_POST['edaytime'] . ' 00:00:00.000';
        $dateend = date('Y-m-d', strtotime($edate));
		$location = $_POST['location'];
    	$organizationName = $_POST['organizationName'];
		$maxAttendee = $_POST['maxAttendee'];
if ($datestart > $dateend )
            echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل  </strong>  يرجى التحقق من تاريخ بداية ونهاية الحدث  
       </div> ";
		else{
			
			$IDT= $_SESSION['organizerID'];
			
		   $sql = mysqli_query($con, "INSERT INTO event ( event_ID, name_Event, descrption_Event ,sartDate_Event,endDate_Event,location_Event,organization_name_Event,maxNumOfAttendee,organizer_ID) VALUES ('','$eventName','$EventDescription','$datestart','$dateend','$location','$organizationName','$maxAttendee','$IDT')")or die(mysqli_error($con));

  
    
			        if($sql)
            echo " <div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> تم </strong>  أضافة حدث جديد 
       </div> ";
               else{
             echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> فشل</strong>  لم تتم عملية الاضافة بنجاح يرجى التحقق
       </div> ";
        } 
	}}
	}
else {
	            echo " <div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <strong> يرجى</strong>   تثبيت الايميل لكي تتمكن من أضافة حدث
       </div> ";
}
			  ?>
</table>
        
  </form>
 </div>  

      
      
  </div>

  <!-- end of  register inputs -->

<script src="js/javaScriptfile.js"></script>
</body>
</html>



