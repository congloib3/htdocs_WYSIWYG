<?php
  include_once '../submit.php';
  include_once '../db.php';
?>
<html>
        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>
                <script src="./ckeditor/ckeditor.js"></script>
                <script src="./ckeditor/config.js"></script>
                <script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
        </head>
        <style>
                .wrapper{
                        text-align:center;
                        margin:0 auto;
                        width:75%;
                }
                .wrapper input{
                        margin-top:20px;
                        border-radius:20px;
                }
        </style>
        <body>
                
                <div class="wrapper">
                        <form method="post" action="">
                        <textarea class="editor" name="editor1">
                        <?php
                                $baihienthi=40;
                                $query = "SELECT * FROM editor WHERE id=?";
                                
                                $stmt=mysqli_stmt_init($db);

                                if(!mysqli_stmt_prepare($stmt,$query)){
                                        echo " failed!";
                                }else{
                                        mysqli_stmt_bind_param($stmt,'s',$baihienthi);

                                        mysqli_stmt_execute($stmt);

                                        $result=mysqli_stmt_get_result($stmt);
                                        while($row=mysqli_fetch_assoc($result)){
                                        echo $row['content'];
                                        }
                                }
                                ?>
                        </textarea>
                        <input type="submit" class="btn btn-warning" name="submit" value="SUBMIT">
                        </form>
                </div>







                <script>
                        
                        CKEDITOR.replace( 'editor1',{
                                filebrowserBrowseUrl: '../ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?type=Images',
                                filebrowserUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                mentions: [ { feed: ['Anna', 'Thomas', 'John'], minChars: 0,marker: '@' } ]
                        } );
                        CKFinder.setupCKEditor();
                        CKEDITOR.config.height = '25em'; 
                        CKEDITOR.config.removeButtons = 'Save';
                        CKEDITOR.config.toolbarGroups = [
                                '/',
                                '/',
                                { name: 'document', groups: [ 'document', 'doctools', 'mode' ] },
                                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                                { name: 'forms', groups: [ 'forms' ] },
                                '/',
                                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                                { name: 'links', groups: [ 'links' ] },
                                { name: 'insert', groups: [ 'insert','Youtube','Html5video' ] },
                                '/',
                                { name: 'styles', groups: [ 'styles' ] },
                                { name: 'colors', groups: [ 'colors' ] },
                                { name: 'tools', groups: [ 'tools' ] },
                                { name: 'others', groups: [ 'others' ] },
                                { name: 'about', groups: [ 'about' ] }
                        ];
                        CKEDITOR.config.extraPlugins = 'mentions,youtube,html5video';

                </script>
        </body>
</html>