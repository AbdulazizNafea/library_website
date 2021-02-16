<?php 
session_start();
include 'config.php'; 

if(isset($_SESSION['logged_in'])){
    header('location:index.php');
    die();
}

$email = $error = ''; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $email = $_POST['email']; 
    $password = $_POST['password']; 

    if(empty($email)){
        $error = 'يرجى ملئ البيانات ';
    }elseif(empty($password)){
        $error = 'يرجى كتابة كلمة السر';
    }else{
    
    // prepare and bind
    $stmt = $conn->prepare("select  username ,email ,password FROM users where email = ?");
    $stmt->bind_param('s' , $email);
    $stmt->execute();

    $result  = $stmt->get_result();
    $userfound = $result->fetch_array(MYSQLI_ASSOC);

    if($password == $userfound['password']){
        $_SESSION['logged_in'] = true ; 
        $_SESSION['username'] = $userfound['username'];
        unset($_COOKIE[$email]); 
        header('location: index.php');
        die();
    }else {
        setcookie($email);
        $error = 'يرجى التحقق من الايميل او كلمة السر'; 
    }
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
         background-image:url(20x20.jpg); 
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
                //background-color: #c4b5c4;
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
        height: 400px;
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
        margin-left: 35%;
        font-size: 15px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .Signup {
       
        color: #000000;
        padding-top: 20px;
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        font-size: 23px;

    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #574747;
        text-decoration: none;
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
        
    <p class="sign" align="center">تسجيل الدخول</p>
        
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="form1" >
    <p id="sign" align="center">
        <?php echo $error;  ?>
        </p>
      <input name="email" class="un" type="text" align="center" value="<?php if(!isset($_COOKIE[$email])){echo $email;} ?>" placeholder="Username">
        
      <input name="password" class="pass" type="password" align="center" placeholder="Password">
        
      <input type="submit" class="submit" value="تسجيل الدخول" align="center">
        
      <p class="Signup" align="center">
          <a href="sign_up.php">
              تسجيل جديد
          </a>
          
      </p>
            
                
    </div>
    
    </body>
</html>