<?php
    $login=false;
    $showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{

     include 'partials/dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
   
   $sql="select * from users where username='$username'";
   $result=mysqli_query($conn,$sql);
   $num=mysqli_num_rows($result);
   if($num==1){
    while($row=mysqli_fetch_assoc($result)){
      if(password_verify($password,$row['password'])){
        $login=true;

        session_start();
        $_SESSION['logedin']=true;
        $_SESSION['username']=$username;
        header("location:welcome.php");
      }
      else{
        $showError=true;
       }
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
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="logins.css">
  </head>
  <body>
    <?php require'partials/nav.php'?>
<?php
if($login){
   echo'
   <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Sucess!</strong> You are loged in .
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
}
?>
<?php
if($showError){
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid Crendetials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
 }
?>

     <div class="main">
    <div class="container">
    <img src="logo.png" alt="Signup Logo" class="img-fluid" style="max-height: 200px;">
      
        <form action="/loginsystem/login.php" method="post">


        <div class="mb-3 col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

  </div>

  <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password1" name="password">
  </div>
  
 
  <button type="submit" class="btn btn-primary">log in</button>
</form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>