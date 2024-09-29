<?php
    session_start(); 

    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'jameye');

    if(!$con)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(!isset($_SESSION['email']) || ($_SESSION['email']!="lancelot"))
    {
      $_SESSION['email'] = 'guest';
    } 
// upload post
    if(isset($_POST['upload'])) {
	
      $title = $_POST["title"];
      $writing = $_POST["writing"];
      $date = date('Y-m-d');
      $date=$date;
      
        $sql = "INSERT INTO `blogpost` (`date`,`title`,`writing`)  VALUE ('$date','$title','$writing')";
        $result = mysqli_query($con, $sql);
    
        echo '<script type="text/javascript"> window.open("blog.php","_self");</script>';            //  On Successful Login redirects to home.php
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lancelot AkaNico's blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-image: url(images/sundarkbase.jpeg);  background-repeat: no-repeat;background-size:cover;">
    <nav class="navbar   navbar-light navbar-expand-lg" style="background-color: rgb(0, 0, 0,0)!important;">
        <div class="container">
            <a href="index.html" class="navbar-brand">
                <h2 style="font-weight: 300;">Lancelot AkaNico</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse  navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto" style="font-size:26px">
                    <li class="nav-item"><a href="index.html" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="index.html#booksection" class="nav-link active">Books</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active">Blog</a></li>
                    <?php
              // if(($_SESSION['email']=='guest')){
              //   echo('<li class="nav-item"><a href="login.php" class="nav-link active">Login</a></li>');
              // }
              if(($_SESSION['email']=='lancelot')){
                echo('<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a></li>');
              }
              ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php 
    if (($_SESSION['email']=='lancelot')){
    echo("
    
      <form class='container col-lg-5' method='POST' action=''>
      <div class=' form-row'>
        <div class='form-group col-md-6'>
          <label >Title</label>
          <input type='text' name='title' class='form-control'  placeholder='Title' required>
        </div>
      </div>

      <div class='form-group'>
      <label for='exampleFormControlTextarea1'>Writing</label>
        <textarea class='form-control' name='writing' type='text' rows='3' required></textarea>
      </div>
      
      <button type='submit' name ='upload' style='background-color: #7292c7;' class='btn  mb-3'>Upload</button>
    </form>"
    );   
    } 
    ?>

    <div class="container  col-lg-9">
        <main class="mt-1">
            <div id="for_rec" class="">
                <div class="list-group pt-3 me-5 rounded-0 list-group-horizontal ">
                    <hr>
                    <h3 class="text-center pb-3">Lancelot AkaNico's Writings</h3>
                    <hr>
                </div>
                <div class=" row row-cols-1 row-cols-md-3 g-4" id="csec">


  <?php
  $sql = "SELECT * FROM blogpost ORDER BY 'date' desc";
  $result = $result = mysqli_query($con, $sql);
  // Associative array
  
  while($row = $result -> fetch_assoc()){
    echo"
    <div class='col my-2'>  
      <div class='card h-100 bg-light'>
        <div class='card-body'>
          <h5 class='card-title'>",$row['title'],"</h5>

          <p class='card-text fs-6'>",$row['writing'],"</p>
        </div>

        <div class='card-footer'>
        <small class='text-muted'>Date: ",$row['date'],"</small>
        </div>
      </div>
    </div>
    ";
  }
  // Free result set
  $result -> free_result();
?>

                </div>
            </div>
        </main>

    </div>

 <!-- The Modal -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    
    <div class="modal-content">
     <p class="for_read"></p>
    </div>
  </div>

  <script  type = "text/javascript" src="script.js"></script>
  </body>

  
  <!-- start footer  -->
  <footer class="" id="contact" style="background-color: #3a3937;">
      <div class="container">
        <div class="row text-light text-center py-4 justify-content-center">
          <div class="col-sm-10 col-m-8 col-lg-6">
            <a href="login.php">
              <h1 class="pb-2 display-4 font-weight-bold" style="color: #bcbdb8;">LANCELOT</h1>
            </a>
                        <h5 style="color: #bcbdb8;">For any media inquiries, please contact:</h5>
            <!-- social media links to be inserted here -->
            <ul class="pt-3 list-unstyled font-weight-bold">
              <a style="color: #bcbdb8;" href="#"> <i class="fa fa-envelope">&nbsp;  jamaicaneyes1016@gmail.com&nbsp; &nbsp; </i></a>
              
            </ul>
          </div>
        </div>
      </div>
    </footer>
  <!-- end footer  -->

  <!-- Start Socket -->
    <div class="socket text-light text-center py-3" style="background-color: #3a3937;">
      <p style="color: #bcbdb8;">&copy; <a class="font-italic" style="color: #bcbdb8;" href="https://www.linkedin.com/in/tyreek-alexander-b142ba22a/" >2024</a></p>
    </div>


</html>