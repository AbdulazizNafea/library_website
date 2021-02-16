<?php
session_start();
include 'config.php';

if(isset($_SESSION['logged_in'])){
  header('location:index.php');
  die();
}

$froms_error = $email_error  = $password_error = $username = $email = ''; 

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = $_POST['username']; 
  $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
  $password = $_POST['password']; 
  $conf_password = $_POST['conf_password'];

  if(empty($username) && empty($password) && empty($conf_password)){
    $froms_error =  "يرجى التحقق من ملى البيانات";
      setcookie('name',$username); 
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $email_error = "يرجى التحقق من الايميل";
      setcookie('email',$email);  
    }elseif($password != $conf_password){
      $password_error = "كلمة السر غير متطابقه !";
    }elseif($password < 6 ){
      $password_error = "كلمة السر يجب ان تكون اكبر من 6 خانات ";
    }else {

      unset($_COOKIE[$username] , $_COOKIE[$email]);
      
      // prepare and bind
      $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
      $stmt->bind_param("sss",$username , $email , $password);
      $stmt->execute();
      $_SESSION['logged_in'] = true ; 
      $_SESSION['username'] = $username; 
      header('location:index.php');
      die();

      $stmt->close();
      $conn->close();
    }
  }
?>
<!DOCTYPE html>


<html>

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>
        
    </title>
    </head>
    <style>
     body {
        //background-color: #F3EBF6;
         background-image:url(images/20x20.jpg); 
        font-family: 'Ubuntu', sans-serif;
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
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 520px;
        margin: 7em auto;
        border-radius: 1.5em;
       box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        
    }
    
    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }

    #sign {
        padding-top: 5px;
        color: red;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 18px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #ffffff;
        background: linear-gradient(to right, #ada870, #777555);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 46px;
        font-size: 15px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
        </style>
        
    
    
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
          <a class="nav-link" href="#add_book">اضافة كتاب جديد</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#view_book">استعراض الكتب</a>
          
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
    
    
    
    <div class="main">
        
    <p class="sign" align="center">Sign in</p>
        
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form1" >
    <p id="sign" align="center">
    <?php echo $froms_error ; ?>
    <?php echo $email_error ; ?>
    <?php echo $password_error ; ?>    
    </p> 
        <input id="username" name="username" value="<?php if(!isset($_COOKIE[$username])){echo $username;} ?>" class="un" type="text" align="center" placeholder="Username">
        
        <input id="email" name="email" value="<?php if(!isset($_COOKIE[$email])){echo $email;} ?>" class="un" type="text" align="center" placeholder="E-Mail">
        
        <input id="password" name="password" class="pass" type="password" align="center" placeholder="Password">
        
        <input id="conf_password" name="conf_password" class="pass" type="password" align="center" placeholder="Confirm Password">
       
        <input type="submit" class="submit" align="center" value="متابعة">
    
            
                
    </div>
    
    </body>
</html>
    