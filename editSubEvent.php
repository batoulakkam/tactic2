<?php
require_once('php/connectTosql.php');
// لا تنسي تشيلي الكومنت عن السيشين 
//if(isset($_SESSION['orgEmail']) && !empty($_SESSION['password'])) {
 //  header('Location:LogIn.php');
// $organizerID = $_SESSION['organizerID'];
// الكويري هيك لازم تكون 
//("SELECT name_Event  FROM `event` WHERE `organizer_ID` = '$organizerID'")
//select event.name_Event, subevent.nameSubEvent from event  inner join  subevent ON event.event_ID = subevent.event_ID
//$query = mysql_query("select event.name_Event, subevent.nameSubEvent
//from event  inner join  subevent ON event.event_ID = subevent.event_ID")or die(mysql_error());
$query = mysql_query("SELECT e.name_Event ,s.nameSubEvent

FROM event e, subevent s


WHERE e.event_ID = s.event_ID

")or die(mysql_error());

	

?>
<!DOCTYPE html>
<html lang="ar">
<head>
<title> تعديل حدث فرعي   </title>
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
                                    <li class="pure-menu-item "class="list-group-item"><a href="addSubEvent.html" class="pure-menu-link"> إضافة حدث فرعي  <span class="fa fa-plus-square"></span> </a></li>
                                    <li class="pure-menu-item " class="list-group-item"><a href="editSubEvent.html" class="pure-menu-link"> تعديل حدث فرعي   <span  class=" fa fa-edit"></span></a></li>
                                    <li class="pure-menu-item " class="list-group-item"><a href="deleteSubEvent.html" class="pure-menu-link">  حذف حدث فرعي <span  class=" paddingElement fa fa-trash"> </span> </a></li>
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
                        <li class="pure-menu-item " class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse5"><span class="fa fa-angle-double-down arrowSpan"></span>   ادارة نموذج التسجل <img src="../image/registform.png" ></a></li>  
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
                        <li class="pure-menu-item" class="panel-title" ><a  class="pure-menu-link" data-toggle="collapse" href="#collapse7"><span class="fa fa-angle-double-down"></span> تتبع الحضور  <img src="../image/trackattendee.png">  </a></li>  
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
       <h1> تعديل  حدث  فرعي </h1>
          </div>
    <div class ="container">

        <form action="" class="formDiv">
            
            <table class="tabelForm">
    <tr>
    <td> 
        <select id="editEvent" name="editEvent" style=" width:400px"  dir="rtl">
         <?php while($row = mysql_fetch_array($query)){
        ?><option value="<?php echo $row['name_Event']; ?>"> <?php echo $row['name_Event'];?></option> <?php }?>
     
            </select></td>
                <td class="leftTd">  <label for="fname">:  الحدث الرئيسي </label></td>
                
                </tr>
				
				
				 <tr>
    <td> 
        <select id="editSubEvent" name="editSubEvent" style=" width:400px"  dir="rtl">
          <?php while($row = mysql_fetch_array($query)){
        ?><option value="<?php echo $row['nameSubEvent']; ?>"> <?php echo $row['nameSubEvent'];?></option> <?php }?>
     
            </select></td>
                <td class="leftTd">  <label for="fname">:  الحدث الفرعي </label></td>
                
                </tr>
				
				 <tr>
    
    <td class="rightTd">  <input type="text" id="sname" name="Sname" placeholder=" اسم الحدث الفرعي " style=" width:400px" required dir ="rtl"></td>
      <td class="leftTd">  <label for="sname">: اسم الحدث الفرعي </label></td>
  </tr>
  
   <tr>
    <td><textarea id="subdescription" name="subdescription" placeholder="وصف الحدث " style="height:150px ; width:400px" dir ="rtl"></textarea></td>
    <td><label for="subdescription"> : وصف الحدث الفرعي </label></td>
  </tr>
  
  <tr>
   <td> <input type="reset" value="الغاء" class="btn btn-danger" >
   <input type="submit" value="حفظ" data-toggle="tooltip" data-placement="bottom"  class="btn btn-primary" >
     </td>
  </tr> 
</table>
        
  </form>
<?php 
if($query){

echo "true";}?>

    </div>        
  </div>
</div>


<script src="js/javaScriptfile.js"></script>
</body>
</html>
