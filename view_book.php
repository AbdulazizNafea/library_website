<?php
session_start();
include 'config.php';

// prepare and bind
$stmt = $conn->prepare("select  id ,username ,namebook , options FROM books ");
//$stmt->bind_param('s' , $email);
$stmt->execute();

$result = $stmt->get_result();



?>
<html>
    
    <head>
    
    <title>
        استعراض الكتب
    </title>
    
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        
        .containers{
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 50px;
            margin-right: 50px;
            padding: 30px;
            background-color: beige;
            border-radius: 25px;
        }
        .card{
            padding: 20px;
            border: none;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            margin-top: 10px;
            margin-left: 5px;
            margin-right: 5px;
            border-radius: 40px;
        }
        
         li{
                padding-left: 5px;
                padding-right: 5px;
            }
            
            li:hover{
                background-color: #c4b5c4;
                border-radius: 5px;
                color: black;
                font-weight: 700;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
               // padding: -1px;
               // margin: -2px;
                padding-left: 20px;
                padding-right: 20px;
                
            }
            .navbar-brand{
                background-color: #c4b5c4;
                border-radius: 5px;
                padding-left: 15px;
                padding-right: 15px;
            }
            .navbar-brand:hover{
                background-color: white;
                border-radius: 5px;
                padding-left: 20px;
                padding-right: 20px;
                color: black;
                font-weight: 700;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            }


    </style>
        </head>
<body>
    
    
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">تواصل معنا
                <span class="sr-only">(current)</span>
              </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#view_book">اضافة كتاب جديد</a>
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about_us">من نحن </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="slide_img2.html">الصفحة الرئيسية </a>
        </li>      </ul>
    </div>
  </div>
</nav>
    
    
    
    
    
    <div class="containers">
        
        <!-- class = card-groub سوي لهذا الكلاس لوب عشان يعرض الكتب -->
        
   <?php while($userfound = $result->fetch_assoc()):?>           
<div class="card-group" > 
    


  <div class="card">

   <a href="  "> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> 
    <div class="card-body">
      <h5 class="text-right"><?php echo $userfound['namebook']; ?></h5>
      </a>
      <p class="text-right"><?php echo $userfound['options'];?></p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right"><?php echo $userfound['username']; ?></small>
        </div>
    </div>
    
  </div>

  <?php  endwhile; ?>
 
    
    
  
        
       
   
    </div>
</body>

</html>