

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<title>Upload file </title>

		<script type="text/javascript">
			$(document).ready(function(){


				$('#upload').on('click', function() {
				    var fname = $('#fname').val();   
				    var city = $('#city').val();   
				    var file_data = $('#sortpicture').prop('files')[0];   
				    var form_data = new FormData();                  
				    form_data.append('fname', fname);
				    form_data.append('city', city);
				    form_data.append('file', file_data);
				                               
				    $.ajax({
				        url: 'load.php', // point to server-side PHP script 
				        dataType: 'text',  // what to expect back from the PHP script, if anything
				        cache: false,
				        contentType: false,
				        processData: false,
				        data: form_data,                         
				        type: 'post',
				        success: function(data,success){
		                  console.log(success);
		                  location.reload();
				        }
				     });
				});
			});	
			


		</script>
	</head>
	<body>
	
	
		<div class="container">


    <h2 class="text-center">Crud</h2>

    <a href="viewData.php" class="btn btn-primary">View Data</a>
      <div id="error"></div>
      <div class="form-group">
        <label>First Name</label>
        <input id="fname" type="text" name="fname" class="form-control" placeholder="Enter Name " /><br>
      </div>
      <div class="form-group">
        <label>City</label>
        <input id="city" type="text" name="city" class="form-control" placeholder="Enter City" /><br>
      </div>
      <div class="form-group">
      <label>Select File </label>
        <input id="sortpicture"  type="file" name="sortpic" class="form-control" /><br><br>
      </div>
      <button  class="btn btn-primary" id="upload">Upload</button>    
    </div>
   
    
  </body>
</html>
