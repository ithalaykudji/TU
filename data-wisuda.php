<?php if(!isset($_SESSION[''])){session_start();}
    if(!isset($_SESSION['id-user'])){header("Location: ./");exit;}
    require_once("Application/controller/script.php");
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("Application/access/header.php")?></head>
    <body>
        <?php require_once("Application/access/navbar.php")?>
        
        <?php require_once("Application/access/footer.php")?>
    </body>
</html>