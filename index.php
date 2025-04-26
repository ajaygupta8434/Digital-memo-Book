<?php
    $show=false;
    $showError=false;
    $ferror=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{

     include 'partials/dbconnect.php';
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
   $cpassword=$_POST["cpassword"];
    $exists = "SELECT * FROM `users` WHERE username='$username'";
  $result=mysqli_query($conn,$exists);
  $numExistsRows=mysqli_num_rows($result);
  if($numExistsRows>0){
  $exists=true;
  //$showError=true;
  }
  else{
    $exists=false;
    
  }

   if(($password==$cpassword) && $exists==false){
    $hash=password_hash($password, PASSWORD_DEFAULT);
   $sql="INSERT INTO `users` (`username`, `email`, `password`, `dt`) VALUES ( '$username', '$email', '$hash', current_timestamp())";
   $result=mysqli_query($conn,$sql);
   if($result){
   $show=true;
   }
}
   else{
    $showError=true;
   }
   
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="signups.css">
  </head>
  <body>
    <?php require'partials/nav.php'?>
<?php
if($show){
   echo'
   <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Sucess!</strong> Your account is now created and you can login.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
}
?>
<?php
if($showError){
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Password do not match or you have already signup.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
 }
?>
   <div class="main">
  
    <div class="container my-4 left" >
      
    <img src="logo.png" alt="Signup Logo" class="img-fluid" style="max-height: 200px;">
      
        <form action="/loginsystem/index.php" method="post">

   <div class="signupbox">
         <div class="mb-3 col-md-6 " id="signup">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"></div>

        <div class="mb-3 col-md-6">
        <label for="emailid" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3 col-md-6">
        <label for="password" class="form-label">Password</label>
           <input type="password" class="form-control" id="password1" name="password">
        </div>
        <div class="mb-3 col-md-6">
                <label for="cpassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make sure to type same password.</div>
  </div>
</div>
  <button type="submit" class="btn btn-primary">Sign up</button>
</form>
    </div>
    <div class="right">
    <img src="memobook.png" alt="Signup Logo" class="img-fluid" >
    </div>

</div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>