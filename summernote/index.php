
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>WYSIWYG</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 

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
      <form >
        <textarea id="summernote"></textarea>
        <!-- <input type="submit" name="submit" value="SUBMIT"> -->
      </form>
    </div>
    <script>$(document).ready(function() {
$("#summernote").summernote({
        placeholder: 'enter directions here...',
        height: 300,
         callbacks: {
        onImageUpload : function(files, editor, welEditable) {

             for(var i = files.length - 1; i >= 0; i--) {
                     sendFile(files[i], this);
            }
        }
    }
    });
    /*-------------------------------------------------*/
    function sendFile(file, el) {
      var form_data = new FormData();
      form_data.append('file', file);
      $.ajax({
          data: form_data,
          type: "POST",
          url: 'uploader.php',
          cache: false,
          contentType: false,
          processData: false,
          success: function(url) {
              $(el).summernote('editor.insertImage', url);
          }
      });
      }

      /*------------------------------------------------*/
      $('button[data-original-title="Picture"]').click(function(){
                    // Set handler on Inset Image button when dialog window is opened  
                    $('.modal-dialog .note-image-btn').one('click', function(e) {
                        // Get Image URL area
                        var imageUrl = $('.modal-dialog .note-image-url').val();
                        // Send it to your backend
                        $.ajax({
                            url: "upload_img_url.php",
                            data: "url="+imageUrl,
                            type: "POST",
                            dataType: 'json',
                            success:function(data) {
                              if (typeof data[0] === 'string') {
                                  $('img[src="'+imageUrl+'"]').attr('src', data);
                              } else {
                                  // What to do if image downloading failed
                                  window.alert('oops2');
                              }
                            }
                    });
                });  
      });
});

</script>
  </body>
</html>
