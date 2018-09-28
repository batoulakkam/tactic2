<?php
require_once('php/connectTosql.php');
$password ="" ;
$confirm_password ="";


?>
<!DOCTYPE html>
<html>
<head>
<title> ادخال كلمة المرور </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/earlyaccess/notokufiarabic.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="css/layouts/custom.css">
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <!-- lobrary of icon  fa fa- --->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- lobrary of style bootstrab 3  --->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- lobrary of style bootstrab 4  --->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-------------------------------------------------------------------------->

    <link rel="shortcut icon" href="image/logo.ico" type="image/x-icon" />

</head>
<body>
<div class ="headerNav">
               <nav class="navbar navbar-inverse"  data-offset-top="10">
                
                <div class="container-fluid">
       
                 
              
                    
					<a class="navbar-brand titleNav" href="#" style ="color:cornflowerblue;float:right;">تكتيك</a>
                        
                    
						  

                </div>
              </nav>
    </div>
	 <!-- Body of register Page -->
  <div class="mainContent">
    <div class="pageTitel">
       <h1> استعادة كلمة المرور   </h1>
          </div>

   <div class ="container">
          <form method="post" action="" class="formDiv" autocomplete="on">
            
            <table class="tabelForm">
                <tr>
                <td>   <input type="text" id="password" name="password" placeholder="كلمة المرور" autocomplete="on" style=" width:400px" required  ></td>
                <td><label for="password"> :ادخل كلمة المرور  </label></td>
              </tr>
			    <tr>
                <td>   <input type="text" id="password" name="confirmPassword" placeholder="كلمة المرور" autocomplete="on" style=" width:400px" required  ></td>
                <td><label for="email"> :تأكيد كلمة المرور  </label></td>
              </tr>
                <tr>
               <td> <input type="submit" value="حفظ" class="btn btn-primary" center id="submit"  name="submitPassword"> </td>
									       <?php
	   if(isset($_GET['key'])){
$email=$_GET['key'];
if (isset($_POST['password']) && isset($_POST['confirmPassword'])){
 $password=$_POST['password'];
$confirm_password = $_POST['confirmPassword'];

if($password == $confirm_password ){
//$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
 $select=mysqli_query($con,"update account set passwordOrg='$password' WHERE `emailOrg` = '$email'");
if ($select){
	             
        header('Location:LogIn.php?edit=true');
        exit();
        } 


}
else {
	echo "<div class='alert alert-danger ' role='alert'>
  تحقق من تطابق كلمة المرور  
</div>";}
	
	
}	
}
					else{header('Location:LogIn.php');}
?>
              </tr> 

       

              </table>

              </form>

  
    </div> 


    </div> 
  

</body>
</html>