<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        
        <style>
            
        .carousel-item 
        {
        //height: 100vh;
        height: 80vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
            

            
            .containers{

            //margin-top: 50px;
            margin-bottom: 10px;
            margin-left: 50px;
            margin-right: 50px;
            padding: 30px;
            //background-color: beige;
            border-radius: 25px;
            background-color: white;
            transition:2s;
        }
            
            .containers:hover{
            -webkit-box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            -moz-box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            //margin-top: 50px;
            //margin-bottom: 50px;
            margin-left: 50px;
            margin-right: 50px;
            padding: 30px;
            //background-color: beige;
            border-radius: 25px;
            background-color: white;
            transition:1s;
        }
            
        .card{
            padding: 20px;
            border: none;
            -webkit-box-shadow: 0px 13px 16px -7px rgba(0,0,0,0.41);
            -moz-box-shadow: 0px 13px 16px -7px rgba(0,0,0,0.41);
            box-shadow: 0px 13px 16px -7px rgba(0,0,0,0.41);            
            margin-top: 10px;
            margin-left: 5px;
            margin-right: 5px;
            border-radius: 40px;
            transition:1s;
        }
            .card:hover{
            padding: 20px;
            border: none;
            -webkit-box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            -moz-box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);      
            margin-top: 10px;
            margin-left: 5px;
            margin-right: 5px;
            border-radius: 40px;
            transition:1s;
        }
            
            .card-img-top
            {
                border-radius: 25px;
                
                
            }
            
          
            
            
            .nav-link{
                padding-left: 5px;
                padding-right: 5px;
                font-size: 16px;
                transition: 1.5s;
                color: black;
            }
            
            .nav-link:hover{
                border-radius: 10px;
                color: black;
                font-weight: 700;
                -webkit-box-shadow: -5px 11px 16px 1px rgba(0,0,0,1);
                -moz-box-shadow: -5px 11px 16px 1px rgba(0,0,0,1);
                box-shadow: -5px 11px 16px 1px rgba(0,0,0,1);
                padding-left: 20px;
                padding-right: 20px;
                transition: 0.5s;
            }
            .navbar-brand{
                border-radius: 5px;
                padding-left: 15px;
                padding-right: 15px;
                transition: 1.5s;
            }
            .navbar-brand:hover{
               // background-color: #c4b5c4;
                border-radius: 10px;
                padding-left: 20px;
                padding-right: 20px;
                color: black;
                font-weight: 700;
                -webkit-box-shadow: -5px 11px 16px 1px rgba(0,0,0,1);
                -moz-box-shadow: -5px 11px 16px 1px rgba(0,0,0,1);
                box-shadow: -5px 11px 16px 1px rgba(0,0,0,1);
                transition: 0.5s;
            }
            
            .text_view{
            padding: 10px;
            margin-top: 50px;
            border-radius: 20px;
            margin-left: 50px;
            margin-right:50px;
            margin-bottom: 10px;
            background-color: white;
            transition:2s;
            }
            .text_view:hover{
            padding: 10px;
            margin-top: 50px;
            border-radius: 20px;
            margin-left: 50px;
            margin-right:50px;
            margin-bottom: 10px;
            background-color: white;
            -webkit-box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            -moz-box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            box-shadow: 0px 0px 24px 4px rgba(0,0,0,1);
            transition:1.5s;
            }
            #text-right{
             padding: 50px;
             line-height: 2.1;
             font-size: 24px;
            }
            .text-center{
                
            }
            
            	.button_menu1
				{
                -webkit-box-shadow: 0px 0px 24px -7px rgba(0,0,0,0.41);
                -moz-box-shadow: 0px 0px 24px -7px rgba(0,0,0,0.41);
                box-shadow: 0px 0px 24px -7px rgba(0,0,0,0.41);
				border-radius: 15px;
				background-color:#ffffff;
				//border:none;
				color:#2f3334;
				text-align:center;
				font-size:18px;
				width:315.5px;
				padding-top:10px;
				padding-bottom:10px;
				//transition:all 0.7s;
				cursor:pointer;
				margin-top:50px;
                margin-left: 35%;
                margin-bottom: 15px;
                border-style:none;
                transition:2s;

				}

				.button_menu1 span
				{

					cursor: pointer;
					//display: inline-blpck;
					position: relative;
					transition: 1s;
					//background-color:#000000;

				}

				.button_menu1 span:after
				{

					content:'\00bb';
					position: absolute;
					opacity:0;
					top:0;
					right:50px;
                    font-weight: 900;
                    font-size: 18px;
					transition:1s;
				}

				.button_menu1:hover span
				{

					padding-right:25px;
					background-color:rgba(255, 255, 255, 0);

				}

				.button_menu1:hover
				{
					transition:1s;
					background-color:#f5f2f2;
                    -webkit-box-shadow: 9px 20px 36px -9px rgba(0,0,0,1);
                    -moz-box-shadow: 9px 20px 36px -9px rgba(0,0,0,1);
                    box-shadow: 9px 20px 36px -9px rgba(0,0,0,1);
                    //padding: 15px;
                    border-style:none;
				}

				.button_menu1:hover span:after
				{

					opacity:1;
					right:0;
					background-color:#f5f2f2;
                    border-style:none;
				}
            .display-4{
                font-weight: bolder;
            }
            .lead{
                font-weight: bolder;
            }
            
            .footer
				{
					background-color: #a2a2a2;
					padding-top:1px;
					padding-bottom:1px;
					text-align:center;
					font-size:15px;
					color: #ffffff;
                    margin-left: 46px;
                    margin-right: 46px;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
				}

           
        </style>
        
    </head>
    <body >
       
        
        <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container" id="container_navbar">
  <?php if(!isset($_SESSION['logged_in'])): ?>
    <a class="navbar-brand" href="login.php">التسجيل - تسجيل الدخول</a> 
    <?php else: ?>
      <a class="navbar-brand" href="logout.php">  <?php echo 'مرحبا'.$_SESSION['username'];?> تسجيل الخروج</a> 
    <?php endif ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
          
            <li class="nav-item">
              <a class="nav-link" href="#contact_us">تواصل معنا</a>
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
              <a class="nav-link" href="#index">الصفحة الرئيسية </a>
            </li>
          
          
        </ul>
    </div>
  </div>
</nav>

<header id="index">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('images/19x19.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">اكتشف</h2>
          <p class="lead">اكتشف مجموعة واسعة من الكتب والقصص والروايات</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('images/21x21.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">تعلم</h2>
          <p class="lead">تعلم ونمي ثقافتك العامة في كافة المجالات</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('images/20x20.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">اقرأ</h2>
          <p class="lead">اقرأ عن جميع ما تحب وطور مهاراتك اللغوية بالقراءة</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
    <div id="about_us"></div>
</header>
        
        

        <div class="text_view" >
        
            <h1 class="text-center" >من نحن</h1>
            <p class="text-right" id="text-right">
            المكتبة الالكترونية: هو موقع يتيح لك تحميل وقراءة كل ماتحب من الكتب بكل سهولة وسلاسة، كما يسمح للأعضاء والمستخدمين المسجلين برفع الكتب ومشاركتها، وأيضا يسمح لجميع الأشخاص والزائرين للمكتبة من استعراض وتحميل الكتب في أي وقت
                </p>
            <h1 class="text-center" >أهداف المكتبة الالكترونية</h1>    
            
            <p class="text-right" id="text-right">
                 الوصول والحصول على محتوى مجاني للجميع في أي وقت وزمان دون قيود، زيادة حجم المحتوى الثقافي على الانترنت بشكل عام، تعزيز الثقافة بين أفراد المجتمع والتشجييع على القراءة، تقليل وتوفير الموارد المادية للباحثين والتربويين ولعامة أفراد المجتمع
                
            </p>
            
            
            
        
        </div>

<!-- Page Content -->

  <div class="container-ms" id="view_book">
      
     <div class="containers">
         <h1 class="text-center" >الكتب الأكثر رواجاً</h1>
         
        
        <!-- class = card-groub سوي لهذا الكلاس لوب عشان يعرض الكتب -->        
        <div class="card-group" > 
    
    

    
  <div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
            
            <div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
    
    
  <div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
<div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
            
</div>
        
        <div class="card-group" > 
    
    

    
  <div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
            
            <div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
    
    
  <div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
<div class="card">
   <a href=""> <img class="card-img-top" src="images/21x21.jpg" alt="Card image cap"> </a>
    <div class="card-body">
      <h5 class="text-right">اسم الكتاب</h5>
      <p class="text-right">التصنيف</p>
    </div>
    <div class="text-center">
        <div class="card-footer" >
          <small class="text-right">اسم الناشر</small>
        </div>
    </div>
  </div>
            
</div>
        
 <a href="view_book.php"><button type="submit" class="button_menu1"> <span> عرض المزيد من الكتب </span></button> </a>
      
    </div>
      
      
  </div>

        
        
        <div class="containers">
            <h1 class="text-center" id="add_book">اضافة كتاب</h1>
            
            <h4 class="text-center">تنبيه: يلزم تسجيل الدخول حتى تتمكن من اضافة كتاب، اذا لم تملك حساب انقر<a href="sign_up.html"> هنا لإنشاء حساب جديد </a>   </h4>
        
         <a href="add_book.php"><button class="button_menu1"> <span> اضافة كتاب </span></button> </a>

        
        </div>
       
        
        <div class="containers">
        
         <h1 class="text-center" id="add_book">تواصل معنا</h1>
        
        <h4 class="text-center"> نسعد بتواصلكم معنا، وتقديم الاقتراحات، وكذلك اخبارنا بالمشاكل لكي نتفادها مستقبلاً </h4>
        <h4 class="text-center">نتمنى لكم قراءة ممتعة والمزيد من النجاحات في مستقبلكم المشرق بإذن الله</h4>
            
            <a href="mailto:Abdulaziz.alfayzi@outlook.com?subject=%D8%A7%D9%84%D9%85%D9%83%D8%AA%D8%A8%D8%A9%20%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A%D8%A9%20-%20%D8%AE%D8%AF%D9%85%D8%A9%20%D8%A7%D9%84%D8%AA%D9%88%D8%A7%D8%B5%D9%84%20%D9%85%D9%86%20%D8%A3%D8%AD%D8%AF%20%D8%A7%D9%84%D8%B9%D9%85%D9%84%D8%A7%D8%A1&body=%D8%A7%D9%84%D9%85%D9%83%D8%AA%D8%A8%D8%A9%20%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A%D8%A9%3A%3A-%0D%0A%D8%B3%D9%8A%D8%AA%D9%85%20%D8%A7%D9%84%D8%B1%D8%AF%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D9%81%D9%8A%20%D8%A7%D9%82%D8%B1%D8%A8%20%D9%88%D9%82%D8%AA%20%D9%85%D9%85%D9%83%D9%86%20%D8%A7%D9%86%20%D8%B4%D8%A7%D8%A1%20%D8%A7%D9%84%D9%84%D9%87."><button class="button_menu1"> <span> راسلنا </span></button> </a>
        </div>
        
        <footer>
				<div class="footer" id="contact_us">
					<p class="footer_p"><br>
                        @TVTC ABHA 2021-2020 
                        <br>
                        مشروع طلاب الكلية التقنية في ابها <br> 
                    هادي الجعفري - أحمد مبارك - يوسف الردادي - عبدالعزيز العمري
                        <br>
                    </p>

				</div>

			</footer>
    </body>
</html>                            