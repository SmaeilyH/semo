<html>
    <?php include 'ex/_head.php'; ?>
    <body>
    <!-- Start Menu -->
<?php include 'ex/_menu.php'; ?>
    <!-- End Menu -->
        <form  method="get" >
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
            <input type="submit" />
        </form>
    </body>
</html>
