
<?php
/*//fetch.php
session_start();
include '../app/connect.php';
$m;*/
$connect = mysqli_connect("localhost", "root", "", "blood_donation");
$output = '';
/*echo $_POST['bdgroup'];
 exit;*/
 //localStorage.setItem("storageName","AB -ve");

 $sql = "
  SELECT * FROM tbl_user 
  WHERE user_Address LIKE '".$_POST["search"]."%' AND user_bloodgroup='".$_POST['bloodgroup']."'";


$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     
     <th>Address</th>
     <th>Customer Name</th>
     <th>number</th>
     <th>blood Group</th>
     <th>Age</th>
     <th>address</th>
     <th>Action</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    
    <td>'.$row["user_Address"].'</td>
    <td>'.$row["user_Firstname"].'</td>
    <td>'.$row["user_phonenumber"].'</td>
    <td>'.$row["user_bloodgroup"].'</td>
    <td>'.$row["user_age"].'</td>
    <td>'.$row["user_status"].'</td>
    <td><div align="center">
                            <a href="" data-toggle="modal" data-target="#exampleModal'.$row['user_id'].'">  <i class="fa fa-address-book" aria-hidden="true"> </i>
                            </a></div><div align="center">
                            <a href="" data-toggle="modal" data-target="#mailModal'.$row['user_id'].'"><i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                            </div></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo '';
}
?>
<html>
<body>

<form name=""  method="POST" action="sa.php">
                  <div class="modal fade" id="exampleModal<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Your Message</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" >
                      <div class="form-group">
                        <label class="col-sm-3  control-label no-padding-right" for="form-field-1">Phone No </label>
                        <div class="col-sm-9">
                          <input type="text" name="num" id="form-field-1" readonly placeholder="Username" value="977<?php echo $user_phone; ?>" class="col-xs-10 col-sm-5">

                        </div>
                      </div>



                      <div >
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Message Here</label>
                        <div class="col-sm-7">
                          <textarea class="form-control" name="msg" placeholder="Your Message Here"></textarea>
                        </div
                      </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="samrat" class="btn btn-primary">Send</button>

                        </div>
                      </div>
                    </div>
                  </div>

                   </form>
                   
                    <form name=""  method="POST" action="sa.php">
                  <div class="modal fade" id="mailModal<?php echo $v['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Your Message</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" >
                      <div class="form-group">
                        <label class="col-sm-3  control-label no-padding-right" for="form-field-1">Email </label>
                        <div class="col-sm-9">
                          <input type="text" name="email" id="form-field-1" readonly placeholder="Username" value="<?php echo $user_email; ?>" class="col-xs-10 col-sm-5">

                        </div>
                      </div>



                      <div >
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Message Here</label>
                        <div class="col-sm-7">
                          <textarea class="form-control" name="msg" placeholder="Your Message Here..."></textarea>
                        </div>
                      </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" name="samrat" class="btn btn-primary">Send</button>

                        </div>
                      </div>
                    </div>
                  </div>




 

</form>
</body>
</html>    