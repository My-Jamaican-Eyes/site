<?php

if(isset($_SESSION['email']))
 {
    header("Location:blog.php"); 
 }
else{
  // session_start();            
}

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{

      if ($_POST['email'] ==''){
        $_POST['email'] ='guest';
      }
      else{
          $email = $_POST['email'];
      }

      if ($_POST['password'] ==''){
          $_POST['password'] ='guest';
      }
      else{
          $pass = $_POST['password'];
      }
     $email = $_POST['email'];
     $pass = $_POST['password'];

      if(($email == "lancelot" && $pass == "lanceloteyes")||($email=='guest'&& $pass=='guest'))  // username is  set to "Ank"  and Password   
         {                                   // is 1234 by default     
          session_start();            
          $_SESSION['email']=$email;

         echo '<script type="text/javascript"> window.open("blog.php","_self");</script>';            //  On Successful Login redirects to home.php
        }

        else
        {
          $_SESSION['email']='guest';        
        }
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <form action="" class="text-center rounded" method="post">
        <a href="index.html"><img class="pb-1" srcset="images/usabook.jpeg 3x" alt=""></a>
        <h2 class="pb-2">Log In</h2>
        <div class="mb-3 border-bottom">
            <input type="" name="email" class="form-control border-0 bg-transparent" placeholder="Email"
                id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3 border-bottom">
            <input type="password" name="password" class="form-control border-0 bg-transparent" placeholder="Password"
                id="exampleInputPassword1" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary mb-3">Log In</button>
    </form>

    <div>
        <form method='POST' action="" class="text-center">
            <button type='submit' name="login">Continue as Guest</button>
        </form>
    </div>
</body>

</html>