<?php
@include("../dbo/dbo.php");
session_start();
$id=0;
$tpname="";
$tpcode="";
$tpcolor="";
$tptype="";
$tpfor="";
$update=false;
$_SESSION["user"];
$_SESSION["pass"];

if(isset($_POST['save'])){
    $cname=$_POST['cname'];
    $cid=$_POST['cid'];
    $cgst=$_POST['cgst'];
    $queryx="SELECT cid FROM companydb WHERE cid='$cid'";
    $qr=$conn->query($queryx);
    $count=$qr->rowCount();
    if($count!=1){
    $q="INSERT INTO companydb(cname,cid,cgst) values('$cname','$cid','$cgst')";
    $result=$conn->query($q);
    }
do{
    $pc=bin2hex(random_bytes(8));
    $q=("SELECT pcode FROM data WHERE pcode='$pc'");
    $res=$conn->query($q);
    $count=$res->rowCount();
}while($count==1);
    $pname=$_POST['pname'];
    $pcode=$pc;
    $pcolor=$_POST['pcolor'];
    $ptype=$_POST['ptype'];
    $pfor=$_POST['pfor'];
    $pby=$_SESSION["user"];
    $query="INSERT INTO data(cid,pname,pcode,pcolor,ptype,pfor,adderid) values('$cid','$pname','$pcode','$pcolor','$ptype','$pfor','$pby')";
    $query_run=$conn->query($query);
    if($query_run || $result){
        header("location:user.php?success=DATA_ADDED_SUCCESSFULLY");
    }else{
        header("location:user.php?failed=DATA_ADDED_FAILED");
    }
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $queryd="DELETE FROM data WHERE id=$id";
    $resultd=$conn->query($queryd);
    if($resultd){
        header("location:user.php?success=DATA _DELETE_SUCCESSFULLY");
    }else{
        header("location:user.php?failed=DATA_DELETION_FAILED");
    }
}
 if(isset($_POST['update'])){
    $id=$_POST['id'];
    $pname=$_POST['pname'];
    $pcode=$_POST['pcode'];
    $pcolor=$_POST['pcolor'];
    $ptype=$_POST['ptype'];
    $pfor=$_POST['pfor'];
    $queryu="UPDATE data SET pname='$pname',pcolor='$pcolor',ptype='$ptype',pfor='$pfor' WHERE id=$id";
    $query_run=$conn->query($queryu);
    if($query_run){
        header("location:user.php?success=DATA_UPDATED_SUCCESSFULLY");
    }else{
        header("location:user.php?failed=DATA_UPDATATION_FAILED");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
@include("header.php");
?>
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
if((@$_GET['confirmed'])){
    @$message = '<div class="alert alert-success" role="alert">DATA SUBMITTED SUCCESSFULL!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></div>';
    echo @$message;
}else{
    @$message='';
    echo @$message;
}
?>
    
<div class="container">
    <form action="" method="post">
    <label>company name</label><br>
    <input type="text"name="cname"placeholder="enter company name" class="form-control" required ><br>
    <label>company ID</label><br>
    <input type="text"name="cid"placeholder="enter company ID" class="form-control" required ><br>
    <label>company GST</label><br>
    <input type="text"name="cgst"placeholder="enter company GST no" class="form-control" required ><br>
    <label>product name</label><br>
    <input type="text"name="pname"placeholder="enter product name" class="form-control" required><br>
    <label>product code</label><br>
    <input type="text"name="pcode"placeholder="auto Generated" class="form-control" required disabled><br>
    <label>product color</label><br>
    <input type="text"name="pcolor"placeholder="enter product color" class="form-control" required><br>
    <label>product type</label><br>
    <input type="text"name="ptype"placeholder="enter product type" class="form-control" required><br>
    <label>product for</label><br>
    <input type="text"name="pfor"placeholder="enter product for" class="form-control" required><br>
    <button type="submit"name="save" class="btn btn-primary">save</button>
    </form>
</div>
<div class="table-responsive"> 
<?php
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        $querye="SELECT * FROM data WHERE id=$id";
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
<div style="width:90%;margin:auto;">
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
    transition:0.2s;
    border:2px solid #262626;
}
</style>        
    <form action="" method="post">
    <tbody>
    <tr>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <td><input type="text"name="cid" value="<?php echo $cid; ?>"class="bxs" disabled><br></td>
    <td><input type="text"name="pname" value="<?php echo $tpname; ?>"class="bxs" required><br></td>
    <td><input type="text"name="pcode"value="<?php echo $tpcode; ?>"class="bxs" required disabled><br></td>
    <td><input type="text"name="pcolor" value="<?php echo $tpcolor; ?>"class="bxs" required><br></td>
    <td><input type="text"name="ptype" value="<?php echo $tptype; ?>"class="bxs" required><br></td>
    <td><input type="text"name="pfor" value="<?php echo $tpfor; ?>"class="bxs" required><br></td>
    <td><input type="text"name="pby" value="<?php echo $tpby; ?>"class="bxs" disabled><br></td>
    <td><button type="submit"name="update" class="btn btn-success">update</button></td>
</tr>
</table>
    </form>
    
</div>
        <?php }else{ ?> 
    <div style="width:90%;margin:auto;margin-bottom:20px;">
    <?php 
                    $query1="SELECT * FROM data";
                    $result=$conn->query($query1);
                    if($result->rowCount()>0){
                        while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    ?>
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
                    <tbody>
                    <tr>
                    <td><?php echo $row["cid"];?></td>
                    <td><?php echo $row["pname"];?></td>
                    <td><?php echo $row["pcode"];?></td>
                    <td><?php echo $row["pcolor"];?></td>
                    <td><?php echo $row["ptype"];?></td>
                    <td><?php echo $row["pfor"];?></td>
                    <td><?php echo $row["adderid"];?></td>
                    <td><button class="btn btn-primary"><a style="color:White;"href="user.php?edit=<?php echo$row["id"];?>">EDIT</a></button></td>
                    <td><button class="btn btn-danger"><a style="color:White;"href="user.php?delete=<?php echo$row["id"];?>"onclick="return confirm('Are you sure?')">Delete</a></button></td>
                    </tr>
                    </tbody>
                    </table>
                    <?php  }
                    echo'<button class="btn btn-primary"> <a style="color:white;" href="confirm.php?confirm ?>"onclick="return confirm("CONFIRM?")">CONFIRM</a></button>';
                    }else{
                        echo'<div class="container">';
                        echo'<h1>NO DATA  IN THE DATABAE</h1>';
                        echo'</div>';
                    }
                ?>
        <?php }?>
        </div>
</div>     
</body>
</html>