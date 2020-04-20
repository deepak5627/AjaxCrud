<?php
    $id = $_POST['id'];
    $conn = mysqli_connect("sql3.freemysqlhosting.net","sql3334623", "xniRV9R8VN", "sql3334623");
    $query = "DELETE from project where id='$id'";
    mysqli_query($conn, $query);

?>