<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
           img{
        height: 100;
        width: 100;
        margin: 5px;
    }
        form {

padding: 5%;
margin: auto;
width: 50%;
}

h3 {
text-align: center;

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

.error {
color: red;
margin-left: 5px;
}
    </style>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

<script>
    $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');

jQuery(function ($) {
    "use strict";
    $('#update_profile').validate({
        rules: {
            FirstName: {
                required: true,
                maxlength: 20
            },
            image: {
                required: true,
               // extension: "jpg,jpeg",
                filesize: 2000048,
            }
        },
    });
});
//  $(document).ready(function() {
            
            

//  $("#registration-form").validate({
//                 rules: {
                
//                     image:{
//                         required: true,
                       
//                         filesize : 50000,
//                     }
//                 },
//                 // messages: { image: "" },
//               //  submitHandler: function(insertrecord)
//               submitHandler:function(form) 
//                  {
//                     form.submit();
//                 }
//             });
//            });
           $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#image").on("change", function(e) {
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
            "</span>").insertAfter("#image");
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

</script>
</head>
<body>
<!-- <form name="insertrecord" id="registration-form" method="post" enctype='multipart/form-data'>
          

                <div class="row">
                   
                    <div class="col-md-6"><b>Image</b><br><br>
                    <input type="file"  class="form-control" name="image" id="image" value="" multiple/>
                        <br><br>
                       
                    </div>
                </div>

                <div class="row" style="margin-top:1%">
                    <div class="col-md-6">
                        <input type="submit" id="submit" name="submit" value="submit">
                    </div>
                    

                </div>

        </form> -->
       
<form id="update_profile" method="post" action="">
  <input type="file" name="image" />
  <input type="submit" value="Save" />
</form>

</body>
</html>