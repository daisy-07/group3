<?php 
require_once("includes/config.php");
if(!empty($_POST["bookid"])) {
  $bookid=$_POST["bookid"];
 
    $sql ="SELECT BookName,id,Qunatity FROM tblbooks WHERE (ISBNNumber=:bookid)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
  foreach ($results as $result) {
if($result->Qunatity > 0){?>
<option value="<?php echo htmlentities($result->id);?>" id="book"><?php echo htmlentities($result->BookName);?></option>
<b>Book Name :</b> 
<?php  
echo htmlentities($result->BookName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
 else{?>
  
<option class="others" id="book">No Available Book</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
 break;
}
}
}
 else{?>
 
<option class="others" id="book"> Invalid ISBN Number</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}
 else{?>
 
<option class="others" id="book"> Invalid ISBN Number</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}



?>
