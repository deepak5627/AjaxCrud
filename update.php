<?php
	
	$fname = $_POST['fname'];
	$city = $_POST['city'];
	$old_image = $_POST['oldImage'];
    $id = $_GET['id'];
	
    $newImage = $_FILES['file']['name'];

    $imageFile = '';

    if($newImage ==''){
    	$imageFile = $old_image;
    }
    else{
	    $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
	  
	    $extensions= array("jpeg","jpg","png");
	    
	    if(in_array($file_ext,$extensions) === false){
	        echo"extension not allowed, please choose a JPG or JPEG or PNG file.";
	    }

	    move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name']);
    	$imageFile = $newImage;
    	
    }

    $conn = mysqli_connect("sql3.freemysqlhosting.net","sql3334623","xniRV9R8VN","sql3334623");
    $query= "UPDATE project set fname='$fname', city='$city', name='$imageFile' where id='$id'";
   	
    $data = mysqli_query($conn, $query);
    
    

?>