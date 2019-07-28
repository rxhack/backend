<?php
session_start();
@include("../dbo/dbo.php");

$query="INSERT INTO finaldata(cid,pname,pcode,pcolor,ptype,pfor,adderid) SELECT cid,pname,pcode,pcolor,ptype,pfor,adderid FROM data";
$query_run=$conn->query($query);
    if($query_run){
        header("location:user.php?confirmed=DATA_SUBMITTED_SUCCESSFULLY");
        $queryd="DELETE FROM data";
        $r=$conn->query($queryd);
    }else{
        header("location:user.php?FAILED");
    }
?>