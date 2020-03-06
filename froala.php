<?php
  include_once 'submit.php';
  include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>WYSIWYG</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
    <link rel="stylesheet" href="./css/froala_style.min.css" type="text/css">
    <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    
    <script src="./js/vi.js"></script>
    <style>
      .wrapper{
        text-align:center;
        margin:50px auto;
        width:80%;
      }
      .wrapper input{
        margin-top:20px;
        border-radius:20px;
      }
      .wrapper textarea{
        margin:0 auto;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
    <form method="post" action="">
      <textarea id="edit" name="content">
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
    var editor = new FroalaEditor('#edit',{
      height:350,
      /*--------remove powered by froala---------- */
      attribution: false,
      /*--------change language---------- */
      language: 'vi',
      /*-------upload file----------- */
      fileUploadURL: 'upload-default/file-upload-froala.php',
      fileUploadParams: {
        id: 'my_editor'
      },
      /*-------upload image----------- */
      imageUploadURL: 'upload-default/image-upload-froala.php',
      imageUploadParams: {
        id: 'my_editor'
      },
      /*-------upload video----------- */
      videoUploadURL: 'upload-default/video-upload-froala.php',
      videoUploadParams: {
        id: 'my_editor'
      },
      /*-------download pdf----------- */
      html2pdf:window.html2pdf
    })
  //   $(function() {
  //   $('div#edit').froalaEditor({
  //     // Set the language code.
      
      
  //   })
    
  // });
    </script>
  </body>
</html>
