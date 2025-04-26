<style>
  .custom-navbar {
    background-color:rgb(81, 75, 73); /* Replace with your desired color */
  }
</style>
<?php
 $logedin = false;
 if(isset($_SESSION['logedin'])&& $_SESSION['logedin']==true){
  $logedin=true;
}
echo'<nav class="navbar navbar-expand-lg custom-navbar">
<img src="logo.png" alt="Signup Logo" class="img-fluid mb-3" style="max-height: 50px;">

  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Digital Memobook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/welcome.php">Home</a>
        </li>';
      
        if(!$logedin){     
      echo '<li class="nav-item">
        <a class="nav-link" href="/loginsystem/login.php">Log In</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/loginsystem/index.php">Sign Up</a>
        </li>';
        }

                
                if($logedin){     
                 echo '<li class="nav-item">
                  <a class="nav-link" href="/loginsystem/logout.php">Log Out</a>
                 </li>';}
     echo' </ul>
    </div>
  </div>
</nav>';
?>