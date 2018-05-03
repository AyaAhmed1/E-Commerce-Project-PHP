<?php
error_reporting(0);
ini_set('display_errors', 0);

include '../classes/config.php';
include '../model/BaseEntity.php';

include '../model/User.php';
include '../model/Users.php';

$error = "";
if(!empty($_POST))
{
    // $_POST['username'] $_POST['password']
    if(!isset($_POST['username']) || !$_POST['username'])
    {
//error
//        die('No Username');
        $error .= "No Username given<br>";
    }

    if(!isset($_POST['password']) || !$_POST['password'])
    {
//error
//        die('No Password');
        $error .= "No Password given<br>";
    }

    //Success $_POST['username'] $_POST['password']
    if($error == "")
    {
        $loggedIn = false;
        $users = new Users($conn);
        $usersObj = $users->allUsers();
        foreach($usersObj as $user)
        {
            if($user->getUsername() == $_POST['username'] && $user->getPassword() == $_POST['password'])
            {
                //true login
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['userId']=$user->getId();
                $loggedIn = true;
                break;
            }
        }
        if($loggedIn)
        {
            //acount.php
            header('Location: home.php');
            exit;
        }
        else
        {
            //error
            $error .= "Erorr username and password";
        }
    }
}
?>
<html>
    


    <head>
        <style>
            .one {
                border-style: solid;
                border-width: 5px;

            }
        </style>
        <style>
    .error{
        color: red;
    }
</style>

    </head>
    <div align="center" class="one"> 
<h1> Login</h1>
<div class="error">
    <?php echo $error ?>
</div>
<form method="post">
    User Name:<input name="username" type="text" />
    <br/>
    <br/>
    Password:<input name="password" type="password" />
    <br/>
    <br/>
    <button type="submit">Login</button>
</form>
</div>
</html>