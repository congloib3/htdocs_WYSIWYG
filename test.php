<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <!-- Include all Editor plugins CSS style. -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-rc.1/css/froala_editor.pkgd.min.css"></script>

    <!-- Include Code Mirror CSS. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <!-- Include all Editor plugins JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-rc.1/js/froala_editor.pkgd.min.js"></script>

    <!-- Include Code Mirror JS. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <!-- Include PDF export JS lib. -->
    <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

  </head>
  <body>
    <div id="example"></div>
  </body>
  <script>
    var editor = new FroalaEditor('#example',{
		html2pdf:window.html2pdf
	});
  </script>
</html>