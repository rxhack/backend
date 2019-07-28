<?php
@include("../dbo/dbo.php");

if(isset($_POST['signup'])){

    $name=$_POST['username'];
    $number=$_POST['pnumber'];
    $uid=$_POST['uid'];
    $cuid=$_POST['cuid'];

    if(strlen((string)$number)==10){
        if(strlen((string)$uid)==4 && strlen((string)$cuid)==4){
            if($uid==$cuid){
                $stmt = $conn->prepare("SELECT number FROM signup WHERE number = :number");
                $stmt->execute(array(':number' => $number));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if(!empty($row['number'])){
                    header("location:index.php?invalidnum=NUMBER_ALREADY_EXISTS");
                }else{
                    $stmt = $conn->prepare('INSERT INTO signup (name,number,uid) VALUES (:name, :number,:uid)');
                    $stmt->execute(array(':name' => $name,':number' => $number,'uid' => $uid));
                    if($stmt){
                        header("location:index.php?success=SIGN_UP_SUCCESSFULL");
                    }else{
                        header("location:index.php?failed=SIGN_UP_FAILED");
                    }
                }
            }else{
                header("location:index.php?uidconfirmation=UID_CONFIRMATION_FAILED");
            }
        }else{
            header("location:index.php?invaliduid1=INVALID_UID");
        }
    }else{
        header("location:index.php?invalidnum1=INVALID_NUMBER");
    }
}

?>