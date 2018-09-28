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

</head>
<body>
<div class ="headerNav">
               <nav class="navbar navbar-inverse"  data-offset-top="10">
                
                <div class="container-fluid">
       
                 
                  <ul class="nav navbar-nav" >
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> تسجيل الخروج</a></li>
                             
                    
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span> اسم صاحب الحساب <span class=" fa fa-user"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">تعديل كلمة المرور <span class="fa fa-lock"></span></a></li>
                        <li><a href="#">تعديل المعلومات الشخصية  <span class=" fa fa-user"></span> </a></li>
                        
                      </ul>
                    </li>
                  </ul>
                  <div class="navbar-header navbar-right  " >
                      <button class="navbar-brand titleNav fa fa-bars btn" onclick="toggleMenu()"></button>
                      <a class="navbar-brand titleNav" href="#" style ="color:cornflowerblue">تكتيك</a>
                    </div>
                </div>
              </nav>
    
    
    </div>
<div>
    
  <nav class="rightNav" id="menu-box" style="display: none">
     
    <div class="navbar-inverse " >

            <ul class="navbar-inverse">
                    
                 <!------------------------------------------------------------------------------------------------>
                                
                            <div class="panel-heading " class="panel-group" class="pure-menu">       
                <li class="pure-menu-item" class="panel-title"  ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse1"><span class="fa fa-angle-double-down arrowSpan" ></span>   إدارة الأحداث <span class="fa fa-sitemap"></span>  </a></li>  
                            </div> 
                            <div id="collapse1" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="pure-menu-item "class="list-group-item"><a href="addEvent.html" class="pure-menu-link"> إضافة حدث  <span class="fa fa-plus-square"></span> </a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="deleteEvent.html" class="pure-menu-link">  حذف حدث <span  class=" paddingElement fa fa-trash"> </span> </a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="editEvent.html" class="pure-menu-link"> تعديل حدث   <span  class=" fa fa-edit"></span></a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="showEvent.html" class="pure-menu-link"> عرض الأحداث <span  class="fa fa-eye">  </span> </a></li>
                            </ul>
                           </div>
                
                
                <!------------------------------------------------------------------------------------------>
               
                                
                            <div class="panel-heading " class="panel-group" class="pure-menu">       
                <li class="pure-menu-item" class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse2"><span class="fa fa-angle-double-down"></span>  إدارة الأحداث الفرعية <span class="fa fa-sitemap"></span> </a></li>  
                            </div> 
                            <div id="collapse2" class="panel-collapse collapse">
                            <ul class="list-group">
                                    <li class="pure-menu-item "class="list-group-item"><a href="#" class="pure-menu-link"> إضافة حدث فرعي  <span class="fa fa-plus-square"></span> </a></li>
                                    <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link">  حذف حدث فرعي <span  class=" paddingElement fa fa-trash"> </span> </a></li>
                                    <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> تعديل حدث فرعي   <span  class=" fa fa-edit"></span></a></li>
                            </ul>
                           </div>
                
                <!------------------------------------------------------------------------------------------>
                                           <div class="panel-heading " class="panel-group" class="pure-menu">       
                <li class="pure-menu-item" class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse3"> <span class="fa fa-angle-double-down"></span> إدارة البطاقات التعريفية <span class="	fa fa-id-badge"></span>  </a></li>  
                            </div> 
                            <div id="collapse3" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="pure-menu-item "class="list-group-item"><a href="#" class="pure-menu-link"> إضافة بطاقة  <span class="fa fa-plus-square"></span> </a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link">  حذف بطاقة <span  class=" paddingElement fa fa-trash"> </span> </a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> تعديل بطاقة   <span  class=" fa fa-edit"></span></a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> طباعة بطاقة   <span  class=" fa fa-print"></span></a></li>

                            </ul>
                           </div>
                
                
                <!------------------------------------------------------------------------------------------>
            

                 <div class="panel-heading " class="panel-group" class="pure-menu">       
                <li class="pure-menu-item" class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse4"><span class="fa fa-angle-double-down"></span>  إدارة الشهادات <span class="	fa fa-drivers-license"></span> </a></li>  
                            </div> 
                            <div id="collapse4" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="pure-menu-item "class="list-group-item"><a href="#" class="pure-menu-link"> إضافة شهادة <span class="fa fa-plus-square"></span> </a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> حذف شهادة  <span  class=" paddingElement fa fa-trash"> </span> </a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> تعديل شهادة  <span  class=" fa fa-edit"></span></a></li>
                                <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> طباعة شهادة  <span  class=" fa fa-print"></span></a></li>

                            </ul>
                           </div>
                <!------------------------------------------------------------------------------------------>
                                                
                <div class="panel-heading " class="panel-group" class="pure-menu">       
                        <li class="pure-menu-item " class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse5"><span class="fa fa-angle-double-down arrowSpan"></span>   ادارة نموذج التسجل <img src="../image/registform.png"> </a></li>  
                                    </div> 
                                    <div id="collapse5" class="panel-collapse collapse">
                                    <ul class="list-group">
                                            <li class="pure-menu-item "class="list-group-item"><a href="#" class="pure-menu-link"> انشاء نموذج التسجيل  <span class="fa fa-plus-square"></span> </a></li>
                                            <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link">  حذف النموذج <span  class=" paddingElement fa fa-trash"> </span> </a></li>
                                            <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link">  تعديل النموذج  <span  class=" fa fa-edit"></span></a></li>
                                    </ul>
                                   </div>
                        
                        
                 <!------------------------------------------------------------------------------------------>
                 <div class="panel-heading " class="panel-group" class="pure-menu">       
                        <li class="pure-menu-item" class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse6"><span class="fa fa-angle-double-down"></span>   إدارة الجوائز <span class= "fa fa-gift"></span></a></li>  
                                    </div> 
                                    <div id="collapse6" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        <li class="pure-menu-item "class="list-group-item"><a href="#" class="pure-menu-link"> إضافة جائزة  <span class="fa fa-plus-square"></span> </a></li>
                                        <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link">  حذف جائزة <span  class=" paddingElement fa fa-trash"> </span> </a></li>
                                        <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link"> تعديل جائزة   <span  class=" fa fa-edit"></span></a></li>
                                        <li class="pure-menu-item " class="list-group-item"><a href="#" class="pure-menu-link">اختار الفائز </a></li>
                                    </ul>
                                   </div>
                 <!------------------------------------------------------------------------------------------>
                 <div class="panel-heading " class="panel-group" class="pure-menu">       
                        <li class="pure-menu-item" class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse7"><span class="fa fa-angle-double-down"></span> تتبع الحضور  <img src="../image/trackattendee.png"> </a></li>  
                                    </div> 
                                    <div id="collapse7" class="panel-collapse collapse">
                                    <ul class="list-group">
                                        <li class="pure-menu-item "class="list-group-item"><a href="#" class="pure-menu-link">  تتبع مباشر  <span class="fa fa-plus-square"></span> </a></li>
                                       </ul>
                                   </div>
                <!------------------------------------------------------------------------------------------>
                <div class="panel-heading " class="panel-group" class="pure-menu"> 
                
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">إرسال بريد الكتروني <span class="fa fa-envelope" ></span></a></li>
               </div>
               <div class="panel-heading " class="panel-group" class="pure-menu"> 
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">التقيمات <span class="fa fa-star-half-o"></span> </a></li>
                </div>
                <div class="panel-heading " class="panel-group" class="pure-menu"> 
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">الإحصائيات <span class="fa fa-bar-chart" ></span> </a></li>
                </div>



                       


            </ul>
        </div>
  </nav>

  
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