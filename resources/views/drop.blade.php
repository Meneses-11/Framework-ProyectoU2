<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<h3>drag and drop</h3>
<form action="{{ route('imgStore') }}" method="POST" enctype="multipart/form-data" id="image-upload" class="dropzone">
@csrf
</form>
<script type="text/javascript">
new Dropzone('#image-upload',{
    maxFilesize: 100,
    acceptedFiles: ".jpg,.jpeg,.png",
    dictInvalidFileType: "Solo se permiten imágenes de tipo JPG, JPEG, o PNG.",
    dictFileTooBig: "La imagen es demasiado grande",
    addRemoveLinks: true,
    dictRemoveFileConfirmation: "¿Estás seguro de que quieres eliminar esta imagen?",
    thumbnailWidth: 200,
    init: function() {
      this.on("success", function(file, response) {
        console.log(response);
      });
    }
  });
</script>
</body>
</html>
