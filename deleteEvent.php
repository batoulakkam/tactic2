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

</head>
<body>
<div class ="headerNav">
               <nav class="navbar navbar-inverse"  data-offset-top="10">
                
                <div class="container-fluid">
       
                 
                  <ul class="nav navbar-nav" >
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> تسجيل الخروج</a></li>
                             
                    
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="caret"></span> اسم صاحب الحساب <span class=" fa fa-user"></span></a>
                      <ul class="dropdown-menu ">
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
                        <li class="pure-menu-item " class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse5"><span class="fa fa-angle-double-down arrowSpan"></span>   ادارة نموذج التسجل <img src="../image/registform.png"></a></li>  
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