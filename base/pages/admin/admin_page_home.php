<?php 
if(isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) && $_COOKIE["pass"] != "" && $_COOKIE["user"] != ""){
    $user = $_COOKIE["user"];
    $pass = md5($_COOKIE["pass"]);
    $query = $conn->query("SELECT * FROM `config` WHERE id=1 AND admin_user='$user' AND admin_pass='$pass'");
    setcookie("user",$_COOKIE["user"],time()+3600);
    setcookie("pass",$_COOKIE["pass"],time()+3600);
    if(mysqli_num_rows($query) != 1){
        header('Location: ' . $addres . 'admin/login');
    }
}  else {
    header('Location: ' . $addres . 'admin/login');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CPAdmin</title>
    </head>
    <body>
        <form action="<?php echo $addres . 'admin/edit'; ?>" method="post"><input type="submit" name="tab" value="edit-about" /></form>
        <form action="<?php echo $addres . 'admin/edit'; ?>" method="post"><input type="submit" name="tab" value="edit-contact" /></form>
        <form action="<?php echo $addres . 'admin/products'; ?>" method="post"><input type="submit" name="tab" value="edit-products" /></form>
        <form action="<?php echo $addres . 'admin/gallery'; ?>" method="post"><input type="submit" name="tab" value="edit-gallery" /></form>
        <form action="<?php echo $addres . 'admin/certificates'; ?>" method="post"><input type="submit" name="tab" value="edit-certificates" /></form>
        <form action="<?php echo $addres . 'admin/slider'; ?>" method="post"><input type="submit" name="tab" value="edit-slider" /></form>
    </body>
</html>