<?php
session_start();
include 'config.php';

if(!isset($_SESSION['logged_in'])){
    header('location:login.php');
    die();
}

$error  = '';
$namebook = '' . $option = '' . $filepdf = '' . $imagebook = ''; 
$count=0;
$headtext = 'رفع ملفات الكتاب';


  if($_SERVER["REQUEST_METHOD"] == "POST"){
      $filepdf = $_FILES['filepdf']['tmp_name'];
      $imagebook = $_FILES['imagebook']['tmp_name']; 
      $namebook = $_POST['namebook'];
      $option = $_POST['option'];

      if(empty($namebook)){
          $error = 'يرجى اكمال البيانات';
      }elseif(empty($option)){
          $error = 'يرجى اكمال البيانات';
      }elseif(empty($filepdf)){
          $error = 'يرجى ادخال الملف';   
      }elseif(mime_content_type($filepdf) != 'application/pdf'){
          $error = 'الملف غير مسموح به يرجى ادخال ملف pdf';
        }else{
            if(mime_content_type($imagebook) != 'image/png'){
                $error = 'يرجى ادخال الصورة بصيغة صحيحه ';
            }
              move_uploaded_file($filepdf,'books/',$_FILES['filepdf']['type']);
              move_uploaded_file($imagebook,'imagesbook/',$_FILES['imagebook']['type']);              
              
                // prepare and bind param 
                $stmt = $conn->prepare("INSERT INTO books (username , pdfname ,imagebook, namebook, options) VALUES ( ? , ?, ? , ? , ?)");
                $stmt->bind_param("sssss", $_SESSION['username'] , $_FILES['filepdf']['name'] , $_FILES['imagebook']['name'] ,$namebook , $option);
                $stmt->execute();
                $completed = 'تم الرفع بنجاح';
                $count=1;

            $stmt->close();
            $conn->close();
      }
  }

?> 
<!DOCTYPE html>
<html>
    
    <head>
    <title>
        رفع الكتب
    </title>
                  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <style>
     body {
        //background-color: #F3EBF6;
         background-image:url(images/19x19.jpg); 
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
        height: 550px;
        margin: 7em auto;
        border-radius: 1.5em;

        
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }
    
    .upload {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 28px;
    }
        
        .text {
            
        margin-bottom: 1px;
        color: #3b1a4d;
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
    margin-left: 46px;
    text-align: center;
    font-family: 'Ubuntu', sans-serif;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }
    
    
    
    
    
   
    .un:focus {
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
        margin-left: 32%;
        font-size: 16px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    

    
    a 
    {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
    
    @media (max-width: 600px)
    {
        .main 
        {
            border-radius: 0px;
        }
    }
        
        
        
        select
        {
            color: rgb(38, 50, 56);
            font-weight: 700;
        font-size: 18px;
        appearance: none;
        outline: 0;
        box-shadow: none;
        border: 0;
        border-radius: 20px;
        background: #ffffff;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        margin-left: 46px;
        margin-bottom: 15px;
        //background-image: none;
        }
        /* Remove IE arrow */
        select::-ms-expand 
        {
        //display: none;
        }
        /* Custom Select */
        .select
        {
            
        margin-right: 46px;
        position: relative;
        display: flex;
        height: auto;
        line-height: 3;
        background: #ffffff;
        overflow: hidden;
        border-radius: 20px;
            
            
        }
        select
        {
        flex: 1;
       padding: 10px 20px;
        color: #000000;
        cursor: pointer;
        }
        /* Arrow */
        
        /* Transition */
      .Sign_up
        {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 10px;
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
        <?php echo $error; ?>
    <p class="upload" align="center"><?php if($count == 0 ){echo $headtext;}elseif($count == 1){
        echo $completed;
        echo '<head><META http-equiv="refresh" content="5;URL=index.php"></head> ';} 
         ?>  </p>

        <form action="" method="post" enctype="multipart/form-data">
           
    
            <p class="text" align="center"> pdf رفع الكتاب بصيغة </p>
        <input class="un" name="filepdf" type="file"  id="0000000">
            
            <p class="text" align="center"> صورة غلاف الكتاب</p>
        <input class="un" name="imagebook" type="file" id="00000000">
            
            <p class="text" align="center"> اسم الكتاب</p>
        <input class="un" name="namebook" type="text" align="center" id="00000000">
             <p class="text" align="center"> حدد تصنيف الكتاب</p>
            
    <div class="select" dir="rtl">
        <select name="option" id="slct">
            <option selected disabled>التصنيف:</option>
            <option value="ثقافة وفنون">ثقافة وفنون</option>
            <option value="تاريخ وأدب">تاريخ وأدب</option>
            <option value="اقتصاد وسياسة">اقتصاد وسياسة</option>
            <option value="علوم وسياسة">علوم وسياسة</option>
            <option value="رياضة">رياضة</option>
            <option value="دين">دين</option>
            <option value="علوم ولغات">علوم ولغات</option>
            <option value="اخرى">أخرى</option>
        </select>
    </div>
            
        <input class="submit" type="submit" value="رفع الملفات" name="submit" id="00000000">
            
            <p class="Sign_up" align="center"><a href="index.html">الغاء والعودة للصفحة الرئيسية</p>
            
            
            
    
    
</form>
    </div>    
    
    

</body>
</html>