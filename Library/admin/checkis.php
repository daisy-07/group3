<?php 
require_once("includes/config.php");
if(!empty($_POST["isbn"])) {
  $studentid= strtoupper($_POST["isbn"]);

 $sql ="SELECT count(id) count FROM `tblbooks` WHERE ISBNNumber =:studentid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':studentid', $studentid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);
}


?>