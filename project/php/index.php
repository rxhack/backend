<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/inven/style.css">
    <title>login</title>

</head>
<body>
    <header>
        <h1>LOGO</h1>
        <div class="nav">
            <a href="#">CONTACT</a>
            <a href="#">ABOUT US</a>
            <a href="index.php">LOGIN</a>
        </div>
    </header>
    <div class="container">
        <form action="insert.php"method="post" class="registration">
            <h1>SIGN-UP</h1>
            <div>
                <?php
                    if(@$_GET['invaliduid']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">UID value already exists</p>
                    <?php
                    }
                ?>

                <?php
                    if(@$_GET['invalidnum']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">NUMBER already exists</p>
                    <?php
                    }
                ?>

                <?php
                    if(@$_GET['invalidnum1']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">ENTER A VALID NUMBER</p>
                    <?php
                    }
                ?>
                <?php
                    if(@$_GET['invaliduid1']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">PLEASE ENTER A 4 DIGIT UID</p>
                    <?php
                    }
                ?>
                <?php
                    if(@$_GET['uidconfirmation']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">PLEASE CONFIRM YOUR UID</p>
                    <?php
                    }
                ?>
                <?php
                    if(@$_GET['success']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">SIGN UP SUCCESSFULL</p>
                    <?php
                    }
                ?>
                <?php
                    if(@$_GET['failed']==true)
                    {
                    ?>
                    <p style="color:orange;font-family:Calibri;">SIGN UP FAILED</p>
                    <?php
                    }
                ?>

            </div>
        <input type="text"placeholder="enter name" name="username" class="ibox" required><br>
        <input type="number" placeholder="enter phone number" name="pnumber" class="ibox"required><br>
        <input type="number" placeholder="enter unique id" name="uid" class="ibox"required><br>
        <input type="number" placeholder="confirm unique id" name="cuid" class="ibox"required><br>
        <input type="submit"value="sign up" name="signup" class="btn">
    </form>
        <form action="login.php"method="post"class="login">
            <h1>SIGN-IN</h1>
            <div>
                <?php
                if(@$_GET['invalid']==true)
                {
                ?>
                <p style="color:orange;font-family:Calibri;">INVALID USERNAME OR PASSWORD</p>
                <?php
                }
                ?>
            </div>
        <input type="number" placeholder="enter phone number" name="pnumber" class="ibox"required><br>
        <input type="number" placeholder="enter unique id" name="uid" class="ibox"required><br>
        <input type="submit"value="sign in" name="signin" class="btn">
    </form>
    </div>

</body>
</html>
