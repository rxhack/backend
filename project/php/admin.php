<?php
@include("../dbo/dbo.php");

session_start();
$_SESSION["user"];
$_SESSION["pass"];

if($_SESSION["user"]==1111111111){
  $_SESSION["user"]="ADMIN";
}
$id=0;
$tpname="";
$tpcode="";
$tpcolor="";
$tptype="";
$tpfor="";
$update=false;
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $queryd="DELETE FROM finaldata WHERE id=$id";
    $resultd=$conn->query($queryd);
    if($resultd){
        header("location:admin.php?success=DATA _DELETE_SUCCESSFULLY");
    }else{
        header("location:admin.php?failed=DATA_DELETION_FAILED");
    }
}
 if(isset($_POST['update'])){
    $id=$_POST['id'];
    $pname=$_POST['pname'];
    $pcode=$_POST['pcode'];
    $pcolor=$_POST['pcolor'];
    $ptype=$_POST['ptype'];
    $pfor=$_POST['pfor'];
    $queryu="UPDATE finaldata SET pname='$pname',pcolor='$pcolor',ptype='$ptype',pfor='$pfor' WHERE id=$id";
    $query_run=$conn->query($queryu);
    if($query_run){
        header("location:admin.php?success=DATA_UPDATED_SUCCESSFULLY");
    }else{
        header("location:admin.php?failed=DATA_UPDATATION_FAILED");
    }
}

?>
<!doctype html>

<html lang="en">
<?php
@include("header.php");
?>
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3">WELCOME ADMIN</h1>
            <hr class="my-2">
        </div>
    </div>

<div class="container">
    <?php 
    if(@$_GET['success']){
        @$message = '<div class="alert alert-success" role="alert">operation SUCCESSFULL!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button></div>';
    echo @$message;
    }else{
        @$message='';
        echo @$message;
    }
    if((@$_GET['failed'])){
        @$message = '<div class="alert alert-danger" role="alert">operaion FAILED!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>';
        echo @$message;
    }else{
        @$message='';
        echo @$message;
    }
    ?>
</div>

<div class="table-responsive">
  <?php
  if(isset($_GET['edit'])){
      $id=$_GET['edit'];
      $update=true;
      $querye="SELECT * FROM finaldata WHERE id=$id";
      $row=$conn->query($querye);
          $row=$row ->fetch();
          $cid=$row['cid'];
          $tpname=$row['pname'];
          $tpcode=$row['pcode'];
          $tpcolor=$row['pcolor'];
          $tptype=$row['ptype'];
          $tpfor=$row['pfor'];
          $tpby=$row['adderid'];
      ?>
<div style="width:100%;margin:auto;">
          <table class="table">
              <thead class="thead-dark">
                  <tr>
                      <th scope="col">company ID</th>
                      <th scope="col">product name</th>
                      <th scope="col">product code</th>
                      <th scope="col">product color</th>
                      <th scope="col">product type</th>
                      <th scope="col">product for</th>
                      <th scope="col">added by</th>
                      <th scope="col" colspan="2">action</th>
                  </tr>
              </thead>
<style>
.bxs{
  text-align:center;
  border:1px solid #262626;
  height:37px;
  border-radius: 20px;
  outline:none;
}
.bxs:focus{
  transition:0.5s;
  border:2px solid #262626;
}
</style>        
  <form action="" method="post">
  <tbody>
  <tr>
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <td><input type="text"name="cid" value="<?php echo $cid; ?>"class="bxs" required disabled><br></td>
  <td><input type="text"name="pname" value="<?php echo $tpname; ?>"class="bxs" required><br></td>
  <td><input type="text"name="pcode"value="<?php echo $tpcode; ?>"class="bxs" required disabled><br></td>
  <td><input type="text"name="pcolor" value="<?php echo $tpcolor; ?>"class="bxs" required><br></td>
  <td><input type="text"name="ptype" value="<?php echo $tptype; ?>"class="bxs" required><br></td>
  <td><input type="text"name="pfor" value="<?php echo $tpfor; ?>"class="bxs" required><br></td>
  <td><input type="text"name="pby" value="<?php echo $tpby; ?>"class="bxs" required disabled><br></td>
  <td><button type="submit"name="update" class="btn btn-success">update</button></td>
</tr>
</table>
  </form>
  
</div>
      <?php }else{ ?> 
  <div style="width:100%;margin:auto;">
                  <table class="table">
                  <thead class="thead-dark">
                  <tr>
                  <th scope="col">company ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Code</th>
                  <th scope="col">Product Color</th>
                  <th scope="col">Product type</th>
                  <th scope="col">Product for</th>
                  <th scope="col">added by</th>
                  <th scope="col"colspan="2">Action</th>
                  </tr>
                  </thead>
                  <?php 
                  $query1="SELECT * FROM finaldata";
                  $result=$conn->query($query1);
                  if($result->rowCount()>0){
                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <tbody>
                  <tr>
                  <td><?php echo $row["cid"];?></td>
                  <td><?php echo $row["pname"];?></td>
                  <td><?php echo $row["pcode"];?></td>
                  <td><?php echo $row["pcolor"];?></td>
                  <td><?php echo $row["ptype"];?></td>
                  <td><?php echo $row["pfor"];?></td>
                  <td><?php echo $row["adderid"];?></td>
                  <td><button class="btn btn-primary"><a style="color:White;"href="admin.php?edit=<?php echo$row["id"];?>">EDIT</a></button></td>
                  <td><button class="btn btn-danger"><a style="color:White;"href="admin.php?delete=<?php echo$row["id"];?>"onclick="return confirm('Are you sure?')">Delete</a></button></td>
                  </tr>
                  <?php                         }
                  }else{
                  }
              ?>
                  </tbody>
          </table>
      <?php }?>
      </div>
    
</div>
</body>
</html>
