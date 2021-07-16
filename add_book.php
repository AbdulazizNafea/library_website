<?php
session_start();
include 'config.php';

if (!isset( $_SESSION['logged_in'] ) ) {
    header( 'location:login.php' );
    die();
}

$error  = '';
$namebook = '' . $option = '' . $filepdf = '' . $imagebook = '';

$count = 0;
$headtext = 'رفع ملفات الكتاب';

if ( $_SERVER["REQUEST_METHOD"] == "POST" )
{
    $filepdf = $_FILES['filepdf']['tmp_name'];
    $imagebook = $_FILES['imagebook']['tmp_name'];

    $namebook = $_POST['namebook'];
    $option = $_POST['option'];

    if (empty($namebook)){
        $error = 'يرجى اكمال البيانات';
    } elseif(empty($option) ) {
        $error = 'يرجى اكمال البيانات';
    } elseif(mime_content_type($filepdf) != 'application/pdf' ) {
        $error = 'الملف غير مسموح به يرجى ادخال ملف pdf';
    }
    
    
    else
    {
            // upload pdf files
            $dir = 'books/';
            $name   = uniqid().time(); // 5dab1961e93a7-1571494241
            $extension  = pathinfo($_FILES["filepdf"]["name"], PATHINFO_EXTENSION);
            $filename = $dir.$name. "." .$extension;
            move_uploaded_file($filepdf,$filename);
            
            // upload image book 
            $dir = 'img_book/';
            $name   = uniqid().time(); // 5dab1961e93a7-1571494241
            $extension  = pathinfo($_FILES["imagebook"]["name"], PATHINFO_EXTENSION);
            $imagename = $dir.$name . "." .$extension;
            move_uploaded_file($imagebook, $imagename);

            // prepare and bind param
            $stmt = $conn->prepare( "INSERT INTO books (username , email ,pdfname ,imagebook, namebook, options) VALUES ( ? , ? , ?, ? , ? , ?)" );
            $stmt->bind_param( "ssssss", $_SESSION['username'], $_SESSION['email'] , $filename, $imagename, $namebook, $option);
            $stmt->execute();
            $completed = 'تم الرفع بنجاح';
            $count = 1;
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
        background-image: url(images/19x19.jpg );

        font-family: 'Ubuntu', sans-serif;
    }

    li {
        padding-left: 5px;
        padding-right: 5px;
    }

    li:hover {
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

    .navbar-brand {
        background-color: #c4b5c4;
        border-radius: 5px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .navbar-brand:hover {
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

    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 1.7em;
    }

    #sign {
        font-weight: bold;
        font-size: 1.5em;
        color: red;
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
        font-size: 1.2em;
        //letter-spacing: 1px;
        background: rgba(136, 126, 126, 0.04);
        padding: 8px 16px;
        border: none;
        border-radius: 20px;
        outline: none;
        box-sizing: border-box;
        border: 2px solid rgba(0, 0, 0, 0.02);
        margin-left: 46px;
        text-align: center;
        font-family: 'Ubuntu', sans-serif;
        -webkit-box-shadow: 0px 3px 13px -7px rgba(0, 0, 0, 0.58);
        -moz-box-shadow: 0px 3px 13px -7px rgba(0, 0, 0, 0.58);
        box-shadow: 0px 3px 13px -7px rgba(0, 0, 0, 0.58);
    }

    #un_name {
        font-size: 1.5em;

    }

    .un:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;

    }

    .upload_file {
        width: 100%;

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
        margin-top: 15px;
    }

    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }


    select {
        color: rgb(38, 50, 56);
        font-weight: 700;
        font-size: 18px;
        appearance: none;
        outline: 0;
        //box-shadow: none;
        border: 0;
        border-radius: 20px;
        background: rgba(136, 126, 126, 0.04);
        -webkit-box-shadow: 0px 3px 13px -7px rgba(0, 0, 0, 0.58);
        -moz-box-shadow: 0px 3px 13px -7px rgba(0, 0, 0, 0.58);
        box-shadow: 0px 3px 13px -7px rgba(0, 0, 0, 0.58);
        margin-left: 46px;
        margin-top: 15px;
        //margin-bottom: 15px;
        //background-image: none;
        margin: 20px;
        //width: 50%;
    }



    /* Custom Select */
    .select {

        margin-left: 22px;
        position: relative;
        display: flex;
        height: auto;
        line-height: 1.5;
        background: #ffffff;
        overflow: hidden;
        border-radius: 20px;
        margin-top: 10px;
        //height: auto;
        width: 87%;


    }

    select {
        flex: 1;
        padding: 15px 20px;
        //color: #000000;
        cursor: pointer;
    }


    .Sign_up {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 10px;
    }
           .nav-item{
                //background-color: #c4b5c4;
                border-radius: 5px;
                padding-left: 15px;
                padding-right: 15px;
                float: right;
                margin-right: 130px;
                transition: 2s;
                font-weight: bolder;
                font-size: 1.4em;
                color:red;
                border-radius: 5px;
            }
            .nav-item:hover{
                background-color: white;
                border-radius: 25px;
                padding-left: 20px;
                padding-right: 20px;
                color: black;
                font-weight: bolder;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
                transition: 1.5s;
                 cursor: pointer;
            }
        li{
            color: darkslateblue;
        }
    

    @media screen and (max-device-width: 550px) {

        body {
            background-color: #b4bfa6;
        }


        .main {
            margin-top: 8vh;
            border-radius: 50px;
            // width: 90vw;
            height: 100%;
            //font-size: 5em;

            width: 90%;
            // height: 100%;


        }

        .navbar-brand {
            font-size: 3em;
        }

        .nav-link {
            font-size: 3em;
        }

        .footer_p {
            font-size: 2em;
        }

        .un {
            width: 80vw;
            padding: 50px;
            border-radius: 80px;
            font-size: 3.5em;

        }

        .sign {
            font-size: 5em;
        }

        .submit {
            padding: 30px;
            width: 60vw;
            font-size: 3.5em;
            margin-left: 150px;
            margin-bottom: 50px;
        }

        .Signup {
            margin-top: 20px;
            //margin-bottom: 100px;
            padding-bottom: 50px;
            font-size: 3.5em;
        }

        #sign {
            font-size: 4em;
            color: red;
        }

        .text {
            font-size: 1em;
        }

        .select {
            width: 83vw;
            height: 10vh;
            //padding-right: 10px;
            //border-radius: 25px;
            //font-size: 4em;
            
        }
        select{
            //width: 80vw;
            padding-right: 50px;
            border-radius: 30px;
            font-size: 3.2em;
            
        }
       
        
 

    }

</style>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
   <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="index.php" class="nav-link">الصفحة الرئيسية</a>
    </li>
    
  </ul>
  
</nav>



    <div class="main">
        <?php echo $error;
?>
        <p class="sign" align="center">

    <?php if ( $count == 0 ) {echo $headtext;}elseif ($count == 1) {echo $completed;
    echo '<head><META http-equiv="refresh" content="5;URL=index.php"></head> ';}

?>

        </p>

        <form action="" method="post" enctype="multipart/form-data">

            <p class="un" align="center">
                pdf رفع الكتاب بصيغة
                <input class="upload_file" name="filepdf" type="file">
            </p>
            <p class="un" align="center"> صورة غلاف الكتاب
                <input class="upload_file" name="imagebook" type="file">
            </p>

            <input class="un" name="namebook" type="text" align="center" placeholder="اسم الكتاب">
            
           
            <div class="select" dir="rtl">
                <select name="option">
                    <option selected disabled >تصنيف الكتاب:</option>
                    <option value="ثقافة وفنون">ثقافة وفنون</option>
                    <option value="تاريخ وأدب">تاريخ وأدب</option>
                    <option value="اقتصاد وادارة">اقتصاد وادارة</option>
                    <option value="علوم وسياسة">علوم وسياسة</option>
                    <option value="رياضة">رياضة</option>
                    <option value="دين">دين</option>
                    <option value="علوم ولغات">علوم ولغات</option>
                    <option value="اخرى">أخرى</option>
                </select>
            </div>

            <input class="submit" type="submit" value="رفع الملفات" name="submit" id="00000000">


        </form>
    </div>

</body>

</html>
