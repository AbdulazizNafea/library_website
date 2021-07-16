<?php
session_start();
include '../config.php';

if(!isset($_SESSION['admin'])){
    header('location: login.php');
    die(); 
}


if (isset($_GET['delete'])) {
    
    // query delete user

    $delete = $_GET['delete'];

    $querydelete = $conn->prepare("delete FROM users where id = ?");
    $querydelete->bind_param('s' ,$delete);
    $querydelete->execute();
    $querydelete->close();
    header('location: index.php');

    }
    elseif (isset($_GET['view'])) {
        $view = $_GET['view'];
        header('location: user_book.php?view='.$view);

    }

   // query get all user 
   $stmt = $conn->prepare("select * FROM users");
   $stmt->execute();

    $result  = $stmt->get_result();
    
    $stmt->close();
    $conn->close();


?>
<html lang="ar">

<head>

    <title>عرض الأعضاء</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {}

        .container-ms {
            margin-top: 100px;
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
                        <a class="nav-link" href="All_book.php">عرض الكتب</a>
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
    <br>

    <div class="container">
        <center>
            <h1 class="center">استعراض جميع الأعضاء</h1>
        </center>
        <br>
        <br>

        <form action='' method='get'>

        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>رقم المستخدم</th>
                    <th>اسم المستخدم</th>
                    <th>البريد الكتروني</th>
                    <th>عرض الكتب</th>
                    <th>حذف المستخدم</th>


                </tr>
            </thead>
            <tbody>
            <?php while($userfound = $result->fetch_assoc()):?>
                <tr>
                
                    <td><?php echo $userfound['id'];?></td>
                    <td><?php echo $userfound['username'];?></td>
                    <td><?php echo $userfound['email'];?></td>
                    <td><button type="submit" name="view" value="<?php echo $userfound['email']; ?>" class="btn btn-success"><i class="fa fa-eye" style="font-size:24px"></i></button></td>
                    <?php if($userfound['id'] != 1): ?>
                    <td><button type="submit" name="delete" value="<?php echo $userfound['id']; ?>" class="btn btn-danger"><i class="material-icons">delete</i></button></td>
                    <?php endif; ?>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </form>

    </div>


</body></html>