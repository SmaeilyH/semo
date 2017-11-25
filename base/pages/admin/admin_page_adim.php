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
        ‎<form action="upim" method="post" enctype="multipart/form-data" >
            <label>Title: <input type="text" name="title" value="" /></label><br />
            <label>Date: <input type="text" name="date" value="" /></label><br />
            <label id="label" for="file"> Select Image: <input height="5px" size="30" name="file" type="file" id="file" /></label><br />
            <label dir="rtl">Type:<label>خط تولید<input type="radio" name="type" value="1" /></label><label>آزمایشگاه<input type="radio" name="type" value="2" /></label><label>انبار لوله<input type="radio" name="type" value="3" /></label></label><br />
            <input id="submit" type="submit" name="submit" value="Upload" /><a href="<?php echo $addres . 'admin/gallery'; ?>">Back</a>
        </form> 
    </body>‎
</html>
