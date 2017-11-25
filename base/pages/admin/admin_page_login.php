<?php
if (isset($_POST['user']) && isset($_POST['pass'])){
    setcookie("user",$_POST['user'],time()+3600);
    setcookie("pass",$_POST['pass'],time()+3600);
    header('Location: ' . $addres . 'admin/home');
}

echo '<form method="post">
            <h2>Login CPAdmin</h2>
            <label>UserName :<input type="text" name="user"/></label><br />
            <label>PassWord :<input type="password" name="pass"/></label><br />
            <input type="submit" value="Login" />
        </form>';
?>