<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
     <!-- cropple -->
    <script src="{{ asset('ahr/bower_components/cropit/dist/jquery.cropit.js')}}"></script>
</head>
<script>
$(document).ready(function() {
$('#image-cropper').cropit();

// In the demos I'm passing in an imageState option
// so it renders an image by default:
// $('#image-cropper').cropit({ imageState: { src: { imageSrc } } });

// Exporting cropped image
$('.download-btn').click(function() {
  var imageData = $('#image-cropper').cropit('export');

});
});
</script>
<body>

<div id="image-cropper">
  <!-- This is where the preview image is displayed -->
  <div class="cropit-preview"></div>

  <!-- This range input controls zoom -->
  <!-- You can add additional elements here, e.g. the image icons -->
  <input type="range" class="cropit-image-zoom-input" />

  <!-- This is where user selects new image -->
  <input type="file" class="cropit-image-input" />

  <!-- The cropit- classes above are needed
       so cropit can identify these elements -->
</div>
<button class="download-btn"></button>

<style>
.cropit-preview {
  /* You can specify preview size in CSS */
  width: 960px;
  height: 540px;
}

</style>
</body>
</html>