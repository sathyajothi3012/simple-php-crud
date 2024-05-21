<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>


<style>
/* name="file_array[]" */
    img{
        height: 100;
        width: 100;
        margin: 5px;
    }
    form{
        width:50%;
        padding:3%;
    }
    input[type="file"] {
  display: block;
}
video {
  border: 1px solid black;
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<script>
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#file").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#file");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          
        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support this File type")
  }
});

// const input = document.getElementById('file-input');
// const video = document.getElementById('video');
// const videoSource = document.createElement('source');

// input.addEventListener('change', function() {
//   const files = this.files || [];

//   if (!files.length) return;
  
//   const reader = new FileReader();

//   reader.onload = function (e) {
//     videoSource.setAttribute('src', e.target.result);
//     video.appendChild(videoSource);
//     video.load();
//     video.play();
//   };
  
//   reader.onprogress = function (e) {
//     console.log('progress: ', Math.round((e.loaded * 100) / e.total));
//   };
  
//   reader.readAsDataURL(files[0]);
// });
$('#myform').validate({
    rules: { image: { required: true, accept: "png|jpe?g|gif", filesize: 1048576  }},
    messages: { image: "File must be JPG, GIF or PNG, less than 1MB" }
});
Filevalidation = () => {
		const fi = document.getElementById('file');
		// Check if any file is selected.
		if (fi.files.length > 0) {
			for (const i = 0; i <= fi.files.length - 1; i++) {

				const fsize = fi.files.item(i).size;
				const file = Math.round((fsize / 1024));
				// The size of the file.
				if (file >=2048) {
					alert(
					"File too Big, please select a file less than 2mb");
				} 
                // else if (file < 2048) {
				// 	alert(
				// 	"File too small, please select a file greater than 2mb");
				// } 
                else {
					document.getElementById('size').innerHTML = '<b>'
					+ file + '</b> KB';
				}
			}
		}
	}

</script>
</head>
<body>
  
  
 <form action="upload.php" method="post" enctype="multipart/form-data" id="myform">
  <input type="file" class="form-control" id="file"  name="image" onchange="Filevalidation()" multiple/><br>
 <label for="">chose video</label>
  <input type="file"  class="form-control" id="files"  name="file_array[]" >
    

<br> <br> <input type="submit" name='submit_image' value="submit"/>
 </form>
 <div class="slide">
 <div id="image_preview"></div>
</div> 
	







</body>
</html>