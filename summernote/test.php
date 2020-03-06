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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <script src="./js/summernote-vi-VN.js"></script>
    <style>
      .content{
        margin:50px auto;
        width: 80%;
      }
    </style>
  </head>
  <body>
    <div class="content">

      <?php if(!empty($statusMsg)) { ?>

    <p class="stmsg"><?php   echo $statusMsg; ?></p>

    <?php } ?>

      <form method="post" action="">
        <textarea id="summernote" name="editordata"></textarea>
        <input type="submit" name="submit" value="SUBMIT">
      </form>
    </div>
    
    <?php if(!empty($editorContent)) { ?>
      <div class="ed-cont">
        <h4>Inserted Content</h4>
        <?php echo $editorContent;  ?>
      </div>
    <?php } ?>
    <?php
      $query = "SELECT * FROM editor";
      $result = mysqli_query($db, $query);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          echo '<div class="ed-cont">';
          echo $row['content'];
        echo '</div>';
        }
      }
    ?>
    <?php
    $baihienthi=1;
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

    <script>
          $('#summernote').summernote({
              placeholder: 'Hello bootstrap 4',
              tabsize: 2,
              height: 200,// set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true,                  // set focus to editable area after initializing summernote
              lang: 'vi-VN',
          });
    </script>
  </body>
</html>
