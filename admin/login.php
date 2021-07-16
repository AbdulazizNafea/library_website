<?php
session_start();
include '../config.php';

$error = $email = '';

if(isset($_SESSION['admin'])){
    header('location: login.php');
    die(); 
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];


    // prepare and bind
    $stmt = $conn->prepare("select  username ,email ,password FROM users where email = ?");
    $stmt->bind_param('s' , $email);
    $stmt->execute();

    $result  = $stmt->get_result();
    $userfound = $result->fetch_array(MYSQLI_ASSOC);

    if($userfound['email'] == 'admin@admin.com'){

            if($password == $userfound['password']){
                $_SESSION['admin'] = true ; 
                unset($_COOKIE[$email]); 
                header('location: index.php');
                die();
            }
        }else{
        setcookie($email);
        $error = 'يرجى التحقق من الايميل او كلمة السر'; 
    
}
    $stmt->close();
    $conn->close();
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


    <link rel="stylesheet" type="text/css" href="core.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="print.css" media="print" />
    <title>
        تسجيل الدخول
    </title>
</head>
<style>
    body {
        background-color: #b4bfa6;
        //background-image:url(images/20x20.jpg); 
        font-family: 'Ubuntu', sans-serif;
    }

    .nav-item {
        //background-color: #c4b5c4;
        border-radius: 5px;
        padding-left: 15px;
        padding-right: 15px;
        float: right;
        margin-right: 130px;
        transition: 2s;
        font-weight: bolder;
        font-size: 1.4em;
        color: red;
        border-radius: 5px;
    }

    .nav-item:hover {
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

    li {
        color: darkslateblue;
    }

    .main {
        background-color: #FFFFFF;
        width: 400px;
        //height: 400px;
        height: auto;
        margin: 7em auto;
        border-radius: 1.5em;



        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 1.5em;
    }

    #sign {
        font-weight: bold;
        font-size: 1.5em;
        color: red;
    }

    .un {
        width: 76%;
        color: rgb(38, 50, 56);
        font-weight: 700;
        font-size: 1.5em;
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




    .un:focus,
    .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;

    }

    .submit {
        cursor: pointer;
        border-radius: 5em;
        color: #ffffff;
        //background: linear-gradient(to right, #ada870, #777555);
        border: 0;
        background-color: darkslategrey;
        padding-left: 60px;
        padding-right: 60px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 20%;
        font-size: 1.5em;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }

    .Signup {

        color: #000000;
        padding-top: 20px;
        padding-bottom: 20px;
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        font-size: 1.9em;

    }

    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #574747;
        text-decoration: none;
    }

    @media screen and (max-device-width: 580px) {

        body {
            background-color: #b4bfa6;
        }


        .main {
            margin-top: 20vh;
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
            background-color: darkslategrey;
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

    }

</style>



<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="../index.php" class="nav-link">الصفحة الرئيسية</a>
            </li>

        </ul>

    </nav>


    <div class="main">
    <p id="sign" align="center">
        <?php echo $error;  ?>
        </p>
        <p class="sign" align="center">ِAdmin Login</p>
        <form action="" method="post" class="form1">
            <p id="sign" align="center"></p>

            <input name="email" class="un" type="text" align="center" value="<?php if(!isset($_COOKIE[$email])){echo $email;} ?>" placeholder="البريد الإلكتروني">

            <input name="password" class="un" type="password" align="center" placeholder="كلمة السر">

            <input type="submit" class="submit" align="center" value="تسجيل الدخول" align="center">

            <br><br><br>



        </form>

    </div>

</body>

</html>
