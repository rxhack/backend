<?php

include("../dbo/dbo.php");
if(isset($_POST['signin'])){

    $number=$_POST['pnumber'];
    $uid=$_POST['uid'];
    $admin="1111111111";
    $adminpass="1111";

    if($number==$admin&&$uid==$adminpass){
        session_start();
        $_SESSION["user"]=$number;
        $_SESSION["pass"]=$uid;
        header("location:admin.php?msg=WELCOME_ADMIN");
    }else{
    $query = $conn->prepare("SELECT id FROM signup WHERE number=:number AND uid=:uid");
    $query->execute(array(':number' => $number,'uid' => $uid));
    $count=$query->rowCount();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($count){
        session_start();
        $_SESSION['user']=$number;
        $_SESSION['pass']=$uid;
        header("location:user.php?msg=SIGN_IN_SUCCESSFULL");
    }else{
        header("location:index.php?invalid=SIGN_IN_FAILED");
    }

}
    
}

?>