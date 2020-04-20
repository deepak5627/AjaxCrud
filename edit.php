 <?php
    $id = $_POST['id'];
  
	  $conn = mysqli_connect("sql3.freemysqlhosting.net","sql3334623","xniRV9R8VN", "sql3334623");
   
    $query = "SELECT * from project where id='$id'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);

    if($total != 0){
      $res = mysqli_fetch_assoc($data);
      $id = $res['id'];
      $fname = $res['fname'];
      $city = $res['city'];
      $image = $res['name'];
      $output ='<div class="form-group">
      <input type="hidden" id="oldImage" name="oldImage" value="'.$image.'" >
            <label>First Name</label>
            <input id="fname" type="text" name="fname" class="form-control" placeholder="Enter Name " value="'.$fname.'" /><br>
          </div>
          <div class="form-group">
            <label>City</label>
            <input id="city" type="text" name="city" class="form-control" placeholder="Enter City" value="'.$city.'" /><br>
          </div>
          <div class="form-group">
          <label>Select File </label>
            <input id="sortpicture"  type="file" name="sortpic" class="form-control" /><br><br>
            <img src="upload/'.$image.'" width="100" height="100">
          </div>
          <button class="btn btn-primary" onclick="editSave('.$id.')" type="button" id="upload">Upload</button>';
    }else{
      $output = '';
    }

    echo $output; die;
?>