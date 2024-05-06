<?php
include 'connect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />



    <title>kudvo</title>
</head>
<body>


  <div class="container">
    <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add item</a></button>

    <form action="" method="GET">
    <div class="input-group mb-3">
  <input type="text" class="form-control" name="search" placeholder="search"  >
    <button type="submit" class="btn btn-primary" value="<?php if(isset($_GET['search'])){
      echo $_GET['search'];
    }?>" >search</button>
</div>



  <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">category</th>
      <th scope="col">Actions</th>
 </tr>
  </thead>
  <tbody>


  <?php
   $sql="SELECT * FROM `blog`";
   $result=mysqli_query($conn,$sql);
   
   if($result){
   
   while( $row=mysqli_fetch_assoc($result)){
   
    $id=$row['id'];
    $title=$row['title'];
    $description=$row['description'];
    $category=$row['category'];

    echo '
    <tr>
          <th scope="row">'.$id.'</th>
          <td>'.$title.'</td>
          <td>'.$description.'</td>
          <td>'.$category.'</td>
          <td>
          <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Edit</a></button>
          <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
        </td>
          
    </tr>'; 
   
   }}



  ?>
  


  </tbody>
</table>

</div>

<hr>



 <script src="https://code.jquery.com/jquery-3.7.1.js"integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );</script>




   
    
</body>
</html>
