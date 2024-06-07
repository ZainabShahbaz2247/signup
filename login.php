<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

  $sql="Select * from `registeration` where 
  username='$username' and password='$password'";

  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
       $login=1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');
    }else{
        $invalid=1;
    }

   
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
      body {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: #fff;
        display: flex;
        justify-content: center;
       align-items: center;
        height: 100vh;
        margin: 0;
      }
      .container {
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        width: 300px;
       
      }
      .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        color: #fff;
      }
      .form-control:focus {
        box-shadow: none;
        background: rgba(255, 255, 255, 0.2);
      }
      .btn-primary {
        background: #2575fc;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        transition: background 0.3s ease-in-out;
      }
      .btn-primary:hover {
        background: #6a11cb;
      }
    </style>

    <title>Login page</title>
  </head>
  <body>

  <?php
  if($login){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success</strong> You Are Successfully logged in.  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
  }
  ?>

<?php
  if($invalid){
   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error</strong> Invalid credentials.  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
  }
  ?>




    <div class="container">
      <h1 class="text-center mb-4">Login</h1>
      <form action="login.php" method="post">
        <div class="form-group">
          <label for="username">Name</label>
          <input type="text" class="form-control" placeholder="Enter Your Username" name="username" id="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" placeholder="Enter Your Password" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </body>
</html>
