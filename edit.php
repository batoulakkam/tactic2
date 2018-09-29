 <?php
require_once 'php/connectTosql.php';
if (isset($_POST['value'])) {
	$idSelected = filter_var($_POST['value'], FILTER_SANITIZE_NUMBER_INT);
    $query2 = mysqli_query($con, "SELECT subevent_ID, nameSubEvent FROM subevent WHERE event_ID ='$idSelected' ") or die(mysqli_error($con));
    if ($query2) {
        while ($row = mysqli_fetch_array($query2)) {
           
   echo "<option value='".$row['subevent_ID']."' >".$row['nameSubEvent']."</option> ";
   }
    } 
   
}

?>