<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';

$errorUsername = $errorPassword = "";
if (!empty($_POST)) {
    if (!isset($_POST['username']) || !$_POST['username']) {
        $errorUsername .= "This Field required.";
    } else {
        if (strlen($_POST['username']) > 20 || strlen($_POST['username']) < 5) {
            $errorUsername .= "Max Legth is 20Char AND Min Length 6";
        } else {
            //check database
        }
    }

    if (!isset($_POST['password']) || !$_POST['password'] || !isset($_POST['confirm_password']) || !$_POST['confirm_password']) {
        $errorPassword = "Password ANd confirm paswword is required";
    } else {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errorPassword = "Password Not Match";
        }
    }
    if ($errorPassword == "" && $errorUsername == "") {
        $filename = $_FILES['fileToUpload']['tmp_name'];
        $filePath = '/upload/' . time() . '.png';
        $destination = __DIR__ . $filePath;
        if (!move_uploaded_file($filename, $destination)) {

            die('cant upload');
            echo $filePath;
            echo $filename;
            echo $destination;
        }

        //mysqli_query($conn, $sql)
        echo '1';
        session_start();
        $user = new User($conn);
        $user->setPhoto($filePath);
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        $_SESSION['userId'] = $user->save();

        header('Location:home.php');
        exit;
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
        
    </head>
    <body>
        <div align="center" class="one" >
            <h1>Register Now </h1>
            <form method="post" enctype="multipart/form-data">
             
                Username:<input name="username" type="text"  value="<?php echo isset($_POST['username']) ? $_POST['username'] : "" ?>"/>
                <br/>
                <br/>
              
<?php echo $errorUsername ?>
             
                Email:<input name="email" type="email" />
                <br/>
                <br/>
                Password<input name="password" type="password" />
                <br/>
                <br/>
                Confirm Password:<input name="confirm_password" type="password" />
                <br/>
                <br/>
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload"/>
                </br>
                </br>
<?php echo $errorPassword ?>
                <br/>
                <div align ="right">
                <button type="submit"> Register</button>
                </div>
            </form>
        </div>
    </body>
</html>
