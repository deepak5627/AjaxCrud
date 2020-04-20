
<?php

    // $text3 = $_POST['text3'];
    // $text4 = $_POST['text4'];
    // $res = $text3 +$text4;
    // echo  $res;
    // exit;
    $fname = $_POST['fname'];
    $city  = $_POST['city'];
    
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else 
    {
       

        $fileName = $_FILES['file']['name'];

        $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
            echo"extension not allowed, please choose a JPG or JPEG or PNG file.";
        }
    
        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name']);
       
        $conn = mysqli_connect("sql3.freemysqlhosting.net","sql3334623", "xniRV9R8VN", "sql3334623");
        
        $sql = "INSERT INTO project (fname, city, name)
        VALUES ('$fname', '$city', '$fileName')";

        if (mysqli_query($conn, $sql)){
            die(" hehe");
        }else{
            die(" haha");
        }  
    }
