<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';

session_start();
$userId = $_SESSION['userId'];

$user = new User($conn, $userId);

if (!empty($_POST)) {
    $filename = $_FILES['fileToUpload']['tmp_name'];
    $filePath = '/upload/' . time() . '.png';
    $destination = __DIR__ . $filePath;
    if (!move_uploaded_file($filename, $destination)) {
        die('cant upload');
    }
    $user->setPhoto($filePath);
    $user->setUsername($_POST['username']);
    $user->setName($_POST['name']);
    $user->setPhone($_POST['phone']);
    $user->setEmail($_POST['email']);
    $user->update();

    header("Location: account.php");
    exit;
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
    <div class="one" align="center">

        <form method="post" enctype="multipart/form-data">

            Name<input name="name" value="<?= $user->getName() ?>" />
            <br/>

            Username<input name="username" value="<?= $user->getUsername() ?>" />
            <br/>

            Email<input name="email" value="<?= $user->getEmail() ?>" />
            <br/>
            Phone<input name="phone" value="<?= $user->getPhone() ?>" />
            <br/>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br/>
            <br/>
            <br/>

            <button type="submit">Update</button>

        </form>
    </div>
</html>
