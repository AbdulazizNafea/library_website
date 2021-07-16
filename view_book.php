<?php
session_start();
include 'config.php';

$stmt = $conn->prepare("select  id ,username ,namebook , pdfname , imagebook, options FROM books");
$stmt->execute();

$result = $stmt->get_result();
 
?>

<html>

<head>

    <title> استعراض الكتب </title>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

        .nav-item {
            //background-color: #c4b5c4;
            border-radius: 5px;
            padding-left: 15px;
            padding-right: 15px;
            float: right;
            margin-right: 130px;
            transition: 1.5s;
            font-weight: bolder;
            font-size: 1.2em;
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
            transition: 1s;
            cursor: pointer;
        }

        li {
            color: darkslateblue;
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



    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">الصفحة الرئيسية</a>

            </li>


        </ul>

    </nav>





    <div class="container-ms" id="view_book">

        <div class="containers">


            <div class="card-group">
                <?php while($userfound = $result->fetch_assoc()):?>
                <div class="col-lg-4">
                    <div class="card-body">
                        <a href="<?php echo htmlspecialchars($userfound['pdfname']); ?>">
                            <img class="card-img-top" src="<?php echo htmlspecialchars($userfound['imagebook']); ?>" alt="Card image cap">

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
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>


    </div>
</body>

</html>
