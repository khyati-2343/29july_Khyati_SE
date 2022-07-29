<form method="post" class="form-horizontal">
   
 <div class="form-group">
 <label class="col-sm-5 control-label">Hobbies</label>
 <div class="col-sm-6">
 <input type="checkbox" name="chk_fruit[]" value="apple">Apple 
 <input type="checkbox" name="chk_fruit[]" value="banana">Banana 
 <input type="checkbox" name="chk_fruit[]" value="orange">Orange 
 <input type="checkbox" name="chk_fruit[]" value="mango">Mango 
 </div>
 </div>
    
 <div class="form-group">
 <div class="col-sm-offset-5 col-sm-9 m-t-15">
 <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
 <a href="index.php" class="btn btn-danger">Cancel</a>
 </div>
 </div>
    
</form>
<?php

require_once("connection.php");

if(isset($_REQUEST["btn_insert"]))
{
 if(isset($_REQUEST["chk_fruit"]))
 {
  $fruit=implode(",",$_REQUEST["chk_fruit"]);
 }
 
 if(empty($fruit))
 {
  $errorMsg="Please Select Checkbox";
 }














 
 else
 {
  try
  {
   if(!isset($errorMsg))
   {
    $insert_stmt=$db->prepare("INSERT INTO tbl_fruits(name) VALUES(:fname)"); //sql insert query     
    $insert_stmt->bindParam(':fname',$fruit); //bind parameter
    
    if($insert_stmt->execute())
    {
     $insertMsg="Insert Successfullt....."; //execute query success message
     header("refresh:3;index.php"); //refresh 3 second and after redirect to index.php page
    }
   }
  }
  catch(PDOException $e)
  {
   echo $e->getMessage();
  }
 }
}

?>