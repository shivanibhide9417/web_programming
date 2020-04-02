<?
$img = rand(1,10);
    session_start();
    if(!isset($_SESSION["name"])){
        header('Location:login.html');
        exit();
    }
    $_SESSION['count'] = $_SESSION['count']+1;
?>
<html>
    <body>
    <h1>Welcome <i><? echo $_SESSION["name"]; ?>!</i>
    <img src="<?php echo $img; ?>.gif"height="100" width="100"/><br></h1>
    Number of times you have visited this page: 
    <b><? echo $_SESSION["count"];?> </b> <br>
    <a href="logout.php">Log out</a>
    </body>

</html>