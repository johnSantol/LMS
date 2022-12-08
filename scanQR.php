<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Team JuanBayabas">
    <meta name="LMS" content="LMS">
    <title>Library Management System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
     <style>
        /*ito ang para sa scanner na css*/
        /*.qr-scanner {
        background-image:
            linear-gradient(0deg,
            transparent 24%,
            rgba(32, 255, 77, 0.1) 25%,
            rgba(32, 255, 77, 0.1) 26%,
            transparent 27%,
            transparent 74%,
            rgba(32, 255, 77, 0.1) 75%,
            rgba(32, 255, 77, 0.1) 76%,
            transparent 77%,
            transparent),
            linear-gradient(90deg,
            transparent 24%,
            rgba(32, 255, 77, 0.1) 25%,
            rgba(32, 255, 77, 0.1) 26%,
            transparent 27%,
            transparent 74%,
            rgba(32, 255, 77, 0.1) 75%,
            rgba(32, 255, 77, 0.1) 76%,
            transparent 77%,
            transparent);
        background-size: 3rem 3rem;
        background-position: -1rem -1rem;
        width: 100%;
        height: 100%;
        position: relative;
        background-color: #111;
    }*/

    .qr-scanner .box {
        width: 38vw;
        height: 33vw;
        max-height: 33vh;
        max-width: 38vh;
        position: absolute;
        left: 20%;
        top: 10%;
        transform: translate(-50%, -50%);
        overflow: hidden;
        border: 0.1rem solid rgba(0, 255, 51, 0.2);
    }

    .qr-scanner .line {
        height: calc(100% - 2px);
        width: 100%;
        background: linear-gradient(180deg, rgba(0, 255, 51, 0) 43%, #00ff33 211%);
        /*border-bottom: 3px solid #00ff33;*/
        transform: translateY(-100%);
        animation: radar-beam 2s infinite;
        animation-timing-function: cubic-bezier(0.53, 0, 0.43, 0.99);
        animation-delay: 1.4s;
    }

    .qr-scanner .box:after,
    .qr-scanner .box:before,
    .qr-scanner .angle:after,
    .qr-scanner .angle:before {
        content: '';
        display: block;
        position: absolute;
        width: 3vw;
        height: 3vw;

        border: 0.2rem solid transparent;
    }

    .qr-scanner .box:after,
    .qr-scanner .box:before {
        top: 0;
        border-top-color: #00ff33;
    }

    .qr-scanner .angle:after,
    .qr-scanner .angle:before {
        bottom: 0;
        border-bottom-color: #00ff33;
    }

    .qr-scanner .box:before,
    .qr-scanner .angle:before {
        left: 0;
        border-left-color: #00ff33;
    }

    .qr-scanner .box:after,
    .qr-scanner .angle:after {
        right: 0;
        border-right-color: #00ff33;
    }

    @keyframes radar-beam {
        0% {
            transform: translateY(-100%);
        }

        100% {
            transform: translateY(0);
        }
    }
    /*huling part ng scanner css*/
        body {
        margin: 0px;
        padding: 0px;
        /*background-color: #088F8F;*/
        }
        .page-title{
            font-size: 60px;
            text-align: center;

        }
        .date-time{
        /*text-align: center;*/
        font-size: 90px;
        position: absolute;
        top: 130px;
        right: -50px;
        }
        /*.box {
  width: 500px; 
  height: 100px;  
  border: solid 5px #000;
  border-color: #000 transparent transparent transparent;
  border-radius: 100px ;*/
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
       <!--  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li> -->
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="scanQR.php">ScanQR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sign_in-admin.php">Log Out</a>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

<main class="container" style="position: ;">
  <div class="bg-light p-5 rounded">
    <form action="runSMS.php" name="formscan" method="post">
    <h2 style="margin-left: 150px;">SCAN QR CODE</h2>
    <div class="col-md-6" style="border-radius:0%">
    <video id="preview" style="border-radius:0% ;margin-left:0px ;width: 500px; height: 400px;" ></video>
        <div class="qr-scanner">
        <div class="box">
            <div class="line"></div>
            <div class="angle"></div>
        </div>
        </div>
                </div>

    <div class="col-md-6">
                <div style="font-size: 30px; margin-left:150px;">
                        <input type="radio" name="STATUS" id="IN" value="IN" required />
                        <label  for="IN">TIME IN </label>
                    </div>
                    
                    <div style="font-size: 30px; margin-left:150px;">
                        <input  type="radio" name="STATUS" id="OUT" value="OUT"  required/>
                        <label for="OUT">TIME OUT</label>
                        </div>                
                    
                    <div >
                    <input hidden type="text" name="text" id="text" readonly="" placeholder="scan qrcode" class="form-control">
                    <input   hidden type="text" name="timee" id="timee" readonly="" placeholder="scan qrcode" class="form-control">
                </div>

    
    <!-- <a style="margin-left:150px;" class="btn btn-lg btn-primary" href="QR.php" role="button">STOP SCANNING</a> -->
    <div class="col-md-6 date-time">
                     <?php

                     // dito ang sa date

                    $day=date('D');
                    $fullDayName=date('l');
                    $month=date('m');
                    $fullMonthName=date('F');
                    $dateNumber=date('d');
                    $fullYear=date('Y');
                    $year=date('y');
                    // dito ang sa time
                    $hours=date('h');
                    $minutes=date('i');
                    $seconds=date('s');
                    $meridiem=date('A');

                    echo "".$fullDayName. ",<br> ". $fullMonthName." ".$dateNumber. ", ". $fullYear. " <br>";
                    // echo $hours.":".$minutes.":".$seconds." ".$meridiem;
                    ?>
                                <label id="time_span"></label><br>
                                <!-- <label><-- Scan QR Code Here</label> -->
  </div>
  <div></div>
</form>


</main>
<script>
    timer();

function timer(){
 var currentTime = new Date()
var hours = currentTime.getHours()
var minutes = currentTime.getMinutes()
var sec = currentTime.getSeconds()
if (minutes < 10){
    minutes = "0" + minutes
}
if (sec < 10){
    sec = "0" + sec
}
var t_str = hours + ":" + minutes + ":" + sec + " ";
if(hours > 11){
    t_str += "PM";
} else {
   t_str += "AM";
}
 document.getElementById('time_span').innerHTML = t_str;
 document.getElementById('time_span').value = t_str;
 setTimeout(timer,1000);
}
</script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
               alert('QrDetected');
               document.formscan.submit();
           });
           
           // alert(code);
        </script>
      
  </body>
</html>


