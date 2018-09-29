<?php
require_once('php/connectTosql.php');

//$query = mysql_query("SELECT s.nameSubEvent , e.name_Event


//FROM  subevent s , event e


//WHERE e.event_ID = s.event_ID
$query = mysqli_query($con, "SELECT event_ID,name_Event FROM event ") or die(mysqli_error($con));
    
    
    //$query = mysql_query("SELECT e.name_Event, s.nameSubEvent FROM event AS e INNER JOIN subevent as s ON e.event_ID=s.event_ID")or die(mysql_error());
?>
 

<!DOCTYPE html>
<html lang="ar">
<head>
<title>حذف حدث فرعي   </title>
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
       <h1> حذف  حدث  فرعي </h1>
          </div>
    <div class ="container">
        <form action="" class="formDiv" method="post">
            
            <table class="tabelForm">
    <tr>
    <td> 
        <select id="deleteEvent" name="deleteEvent" style=" width:400px"  dir="rtl">
            
         <?php
while ($row = mysqli_fetch_array($query)):
    echo "<option value='" . $row['event_ID'] . "'>" . $row['name_Event'] . "</option>";
    ?>
	     <?php endwhile;?>
            </select></td>
                <td class="leftTd">  <label for="fname">:  الحدث الرئيسي </label></td>
                
                </tr>
				
				 
				 <tr>
    <td> 
         <select id="deleteSubEvent" name="deleteSubEvent" style=" width:400px"  dir="rtl">
          
     
            </select></td>
                <td class="leftTd">  <label for="fname">:  الحدث الفرعي </label></td>
                
                </tr>
	        <?php
if (isset($_POST['delete'])) {
    $event_ID = $_POST['deleteEvent'];

    $query1 = mysqli_query($con, "DELETE FROM subevent WHERE event_ID ='$event_ID'");

    if ($query1 != null) {
        echo "<div class='alert alert-success ' role='alert'>
                تمت الحذف بنجاح
    </div>";
    } else {
        echo "<div class='alert alert-danger ' role='alert'> فشل يرجى التحقق من الادخال
             </div>";
    }
}

?>			
				
  <tr>
   <td> <input type="reset" value="الغاء" class="btn btn-danger" >
   <input type="submit" value="حذف" name= "delete" data-toggle="tooltip" data-placement="bottom"  class="btn btn-primary" >
     </td>
  </tr> 
</table>
        
  </form>

    </div>        
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    $(function () {
        //  اقوم بعمل تحقق اذا تم تغيير قيمة القائمة الخاصة بالدول
       $('#deleteEvent').on("change",function(){
           // ا جلبت رقم الدولة حسب ما اختاره المتسخدم عند تغيير القائمة
           var dropValue = $('#deleteEvent').val();
           $.ajax({
            url: 'edit.php',
            type: "POST",
            data:{value:dropValue},
            success: function (data) {
          // console.log(data);
             $('#deleteSubEvent').html(data);

            }
        });

       });
    });


</script>
<script src="js/javaScriptfile.js"></script>

</body>
</html>
