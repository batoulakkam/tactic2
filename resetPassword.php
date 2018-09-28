<!DOCTYPE html>
<html>
<head>
<title> استعادة كلمة المرور </title>
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
          <form method="post" action="php/resetPassword.php" class="formDiv" autocomplete="on">
            
            <table class="tabelForm">
                <tr>
                <td>   <input type="text" id="email" name="emailOrg" placeholder="أدخل بريدك الإلكتروني" autocomplete="on" style=" width:400px" required  ></td>
                <td><label for="email"> :أدخل البريد الالكتروني لاستعادة كلمة المرور  </label></td>
              </tr>
                <tr>
               <td> <input type="submit" value=" استعادة" class="btn btn-primary" center id="submit"  name="submit_email"> </td>
              </tr> 
				    <?php
   
    if(isset($_GET['sent'] )){
	if ($_GET['sent'] = true)
     echo "<div class='alert alert-success  ' role='alert'>
  تم ارسال ايميل لتغير كلمة المرور
</div>";
   else  echo "<div class='alert alert-danger ' role='alert'>
  يرجى التحقق من البريد الالكتروني
</div>";}
    
                
    
      ?>
              </table>

              </form>
       
       
  
    </div> 


    </div> 
  

</body>
</html>