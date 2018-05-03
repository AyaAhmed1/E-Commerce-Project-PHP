<?php
include '../classes/config.php';
include '../model/BaseEntity.php';
include '../model/User.php';

session_start();

if (!isset($_SESSION['userId']) || !$_SESSION['userId']) {
    header("Location: login.php");
    exit;
}
$userId = $_SESSION['userId'];

if (isset($_GET['id']) && $_GET['id']) {
    $userId = $_GET['id'];
}

$user = new User($conn, $userId);
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

    <div class="one" align="center" >
        <h1> Welcome <?= $user->getUsername() ?></h1>
        <br/>
        <br/>
        <img src="<?= $user->getPhoto() ?>" width="200" height="200" />
        <h3>Username: <?= $user->getUsername() ?></h3>
        <h3>Email: <?= $user->getEmail() ?></h3>
        <h3>Phone: <?= $user->getPhone() ?></h3>
<?php if ($userId == $_SESSION['userId']): ?>
            <h3><a href="editprofile.php">Edit Ptofile</a></h3>
        <?php endif; ?>

        <a href="home.php" > Home </a>
    </div>
</html>