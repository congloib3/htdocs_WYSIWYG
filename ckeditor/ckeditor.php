<?php
  include_once 'submit.php';
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
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/decoupled-document/ckeditor.js"></script>
    <style>
      .content{
        margin:50px auto;
        width: 80%;
      }
    </style>
  </head>
  <body>
  <h1>Document editor</h1>

<!-- The toolbar will be rendered in this container. -->
<div id="toolbar-container"></div>

<!-- This container will become the editable. -->
<div id="editor">
    <p>This is the initial editor content.</p>
</div>

    <script>
    //   $('#summernote').summernote({
    //     placeholder: 'Hello bootstrap 4',
    //     tabsize: 2,
    //     height: 200,// set editor height
    //     minHeight: null,             // set minimum height of editor
    //     maxHeight: null,             // set maximum height of editor
    //     focus: true,                  // set focus to editable area after initializing summernote
    //     lang: 'vi-VN'
    //   });
    DecoupledEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>
  </body>
</html>
