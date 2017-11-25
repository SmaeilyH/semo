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
        <script src="../ex/ckeditor/ckeditor.js" type="text/javascript"></script>
    </head>
    <body>
        ‎<form action="uppr" method="post" enctype="multipart/form-data" >
            <label>Name: <input type="text" name="name" value="" /></label><br />
            <label id="label" for="file"> Select Image: <input height="5px" size="30" name="file" type="file" id="file" /></label><br />
            <label>Description: 
                <textarea name="text" id="editor1" rows="10" cols="80">
                    Please type a description
                </textarea>
            </label><br />
            <label dir="rtl">Type:<label>لوله<input type="radio" name="type" value="1" /></label><label>اتصال<input type="radio" name="type" value="2" /></label></label><br />
            <input id="submit" type="submit" name="submit" value="Upload" /><a href="<?php echo $addres . 'admin/products'; ?>">Back</a>
        </form> 
        <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'text' );
        </script>
    </body>‎
</html>
