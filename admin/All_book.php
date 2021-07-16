<?php
session_start();
include '../config.php';

if(!isset($_SESSION['admin'])){
    header('location: login.php');
    die(); 
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $delete = $_POST['delete'];
     
    //query delete book
    
    $querydelete = $conn->prepare("delete FROM books where id = ?");
    $querydelete->bind_param('s' ,$delete);
    $querydelete->execute();
    $querydelete->close();
    header('location: All_book.php');
}

   // query get all books

    $stmt = $conn->prepare("select  id ,username ,namebook , imagebook , pdfname , options FROM books");
    $stmt->execute();

    $result  = $stmt->get_result();
    
    $stmt->close();
    $conn->close();

?>
<html>

<head>

    <title>
        استعراض الكتب
    </title>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .containers {
            // box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-left: 50px;
            margin-right: 50px;
            padding: 30px;
            //background-color: beige;
            border-radius: 25px;
        }

        .col-lg-4 {
            padding: 20px;
            border: none;
            //box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            margin-top: 10px;
            // margin-left: 0.1px;
            //margin-right: 0.1px;
            border-radius: 40px;
            transition: 2s;
            border-style: solid;
            border-color: rgba(0, 0, 0, 0.08);
        }

        .col-lg-4:hover {
            padding: 20px;
            border: none;
            -webkit-box-shadow: 0px 0px 24px 4px rgba(0, 0, 0, 1);
            -moz-box-shadow: 0px 0px 24px 4px rgba(0, 0, 0, 1);
            box-shadow: 0px 0px 24px 4px rgba(0, 0, 0, 1);
            margin-top: 10px;
            //margin-left: 5px;
            //margin-right: 5px;
            border-radius: 40px;
            transition: 2s;
        }

        .card-img-top {
            border-radius: 25px;


        }

        .nav-link {
            padding-left: 5px;
            padding-right: 5px;
            //font-size: 16px;
            transition: 1.5s;
            color: #ff0000;
            font-size: 1.3em;
            font-weight: bold;

        }

        .nav-link:hover {
            border-radius: 10px;
            color: #ff0000;
            font-weight: bold;
            -webkit-box-shadow: -5px 11px 16px 1px rgba(0, 0, 0, 1);
            -moz-box-shadow: -5px 11px 16px 1px rgba(0, 0, 0, 1);
            box-shadow: -5px 11px 16px 1px rgba(0, 0, 0, 1);
            padding-left: 20px;
            padding-right: 20px;
            transition: 0.5s;
        }

        .navbar-brand {
            border-radius: 5px;
            padding-left: 15px;
            padding-right: 15px;
            transition: 1.5s;
            font-size: 1.3em;
            //font-weight: 600;

        }

        .navbar-brand:hover {
            // background-color: #c4b5c4;
            border-radius: 10px;
            //padding-left: 20px;
            //padding-right: 20px;
            color: black;
           // font-weight: 700;
            -webkit-box-shadow: -5px 11px 16px 1px rgba(0, 0, 0, 1);
            -moz-box-shadow: -5px 11px 16px 1px rgba(0, 0, 0, 1);
            box-shadow: -5px 11px 16px 1px rgba(0, 0, 0, 1);
            transition: 0.5s;
        }


        .text-right {
            line-height: 2.1;
            font-size: 1.5em;
        }

        a .text-right {
            font-size: 2em;
        }

        .card-img-top {
            border-radius: 25px;
            max-width: 100%;
            height: 48vh;

        }

        @media screen and (max-device-width: 580px) {
            a {
                font-size: 1.8em;
            }

            p {
                font-size: 1.5em;
            }

            h1 {
                font-size: 4em;
                font-weight: bold;
            }

            .button_menu1 {
                font-size: 1em;
                padding: inherit;
            }

            small {
                font-size: 1.5em;
            }

            .display-4 {
                font-size: 5em;
            }

            .lead {
                font-size: 2.3em;
                font-weight: bolder;
            }

            #text-right {
                font-size: 2.5em;
            }

            h4 {
                font-size: 1.6em;
            }

            .footer_p {
                font-size: 1.6em;
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

            .text-right {
                //line-height: 2.1;
                font-size: 2em;
            }

            .nav-item {
                font-size: 1em;
            }

            .card-img-top {
                border-radius: 25px;
                max-width: 100%;
                height: auto;

            }


        }
    </style>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container" id="container_navbar">


            <a class="navbar-brand" href="logout.php">تسجيل الخروج</a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">



                    <li class="nav-item">
                        <a class="nav-link" href="index.php">عرض المستخدمين </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">الصفحة الرئيسية </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

<br>
    <br>
<br>


<center>
            <h1 class="center">استعراض جميع الكتب</h1>
        </center>

    <div class="container-ms" id="view_book">

        <div class="containers">


        <form action="" method='post'>
            <div class="card-group">
            <?php while($userfound = $result->fetch_assoc()): ?>             
                <div class="col-lg-4">
                    <div class="card-body">
                        <a href="../<?php echo htmlspecialchars($userfound['pdfname']); ?>">
                            <img class="card-img-top" src="../<?php echo htmlspecialchars($userfound['imagebook']); ?>" alt="Card image cap">
                            <h5 class="text-right">
                            <?php echo htmlspecialchars($userfound['namebook']); ?>
                            </h5>
                        </a>
                        <p class="text-right">
                        <?php echo htmlspecialchars($userfound['options']);?>
                        </p>

                        <div class="text-center">
                            <div class="card-footer">

                                <small class="text-right">
                                <?php echo htmlspecialchars($userfound['username']); ?>
                                </small>
                            </div>
                            <button type="submit" name='delete' value='<?php echo $userfound['id'];?>' class="btn btn-danger"><i class="material-icons">delete</i></button><br>حذف

                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
        </form>

    </div>
</body></html>
