

 <!DOCTYPE html>
 <html>
 <head>
 	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
	 <body>
		<form  method="post" enctype="multipart/form-data">

	 	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Edit Data</h4>
	        </div>
	        <div class="modal-body">
	           
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	 </form>
	 </body>
 </html>




<?php
		// Create connection
	$conn = mysqli_connect("sql3.freemysqlhosting.net","sql3334623", "xniRV9R8VN", "sql3334623");;
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM project";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    ?>
	    <a href="index.php" class="btn btn-primary">Add Data</a>
	    <table border="1px" class="table table-stripped">
	    <tr>
	    	<th>Name</th>
	    	<th>Cite</th>
	    	<th>Image</th>
	    	<th>Edit</th>
	    	<th>Delete</th>
		</tr>	    
	    <?php
	    while($row = $result->fetch_assoc()) {
	    	 ?>
	    	 <tr id="tr<?php echo $row['id'] ?>">
		    	 <td><?php echo $row['fname']?></td>
		    	 <td><?php echo $row['city']?></td>
		    	 <td><img src="upload/<?php echo $row['name']?>" height="100px" width="150px"/></td>
		    	 <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="editData(<?php echo $row['id'] ?>)">Edit</button></td>
		    	 <td><button  class="btn btn-danger" onclick="deleteData(<?php echo $row['id'] ?>)">Delete</button></td>
	    	 </tr>
	    	 <?php
	    }
	    ?>
	    </table>
	    <?php
	} else {
	    echo "0 results";
	}
?>

<script type="text/javascript">
	function editData(id){
		
		$.ajax({
	        url: 'edit.php',
	        data: { 'id':id },                         
	        type: 'post',
	        success: function(data,success){
	        	$('.modal-body').empty();
      			if(data != ''){
      				$('.modal-body').html(data);
      			}else{
      				$('.modal-body').html("No Data found");
      			}      			
	        }
	     });
	}
	function deleteData(id){
		$.ajax({
	        url: 'delete.php',
	        data: { 'id':id },                         
	        type: 'post',
	        success: function(data,success){
      			$('#tr'+id).remove();
	        }
	     });	
	}
	
	function editSave(id){
		var fname = $('#fname').val();   
	    var city = $('#city').val();   
	    var oldImage = $('#oldImage').val();   
	    var file_data = $('#sortpicture').prop('files')[0];   
	    var form_data = new FormData();                  
	    form_data.append('fname', fname);
	    form_data.append('city', city);
	    form_data.append('oldImage', oldImage);
	    form_data.append('file', file_data);
	                               
	    $.ajax({
	        url: 'update.php?id='+id, // point to server-side PHP script 
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
	}
	
</script>
