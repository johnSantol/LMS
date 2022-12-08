<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Team JuanBayabas">
    <meta name="LMS" content="LMS">
    <title>Library Management System</title>

<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
 
    <form action="JSON.php" method="GET">
    <!-- <form action="JSON.php" name ="submit_form" method="post"> //auto submit -->

    <video id="preview" style="border-radius:0% ;margin-left:0px ;width: 500px; height: 400px;" ></video>
       
    <!-- <form action=""  method="POST"> -->
<!-- get JWT_Token from scanned qrcode then parse it -->
    <input  name="JWT_Token" id="JWT_Token">
    <input  name="srcode" id="srcode">
    <input  name="fullname" id="fullname">
    <input  name="timestamp" id="timestamp">
    <input  name="type" id="type">
    <input  name="userid" id="userid">
    <input class="btn login_btn" type="submit" name="submit_form"/>
<!-- End of parsing -->

</form>
        
    

    
  
<!-- </form> -->
</div>


</main>

<script>
let b64DecodeUnicode = str => decodeURIComponent(Array.prototype.map.call(atob(str), c =>'%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2)).join(''))

let parseJwt = token =>JSON.parse(b64DecodeUnicode(token.split('.')[1].replace('-', '+').replace('_', '/')))
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
          
               // document.getElementById('JWT_Token').value=c;
               var jwt = c;
               
              
               var code = JSON.stringify(parseJwt(jwt))
                document.getElementById('JWT_Token').value = code;
                var obj = JSON.parse(code);
                document.getElementById('srcode').value = obj.srcode;
                document.getElementById('fullname').value = obj.fullname;
                document.getElementById('timestamp').value = obj.timestamp;
                document.getElementById('type').value = obj.type;
                document.getElementById('userid').value = obj.userid;
                alert('QrDetected');
                // document.submit_form.submit();   //auto submit ng form pagkatapos mascan yung qr code para di na kelangan magclick ng button para masubmit
                // e.preventDefault();
           });
           
           // alert(code);
        </script>
      
  </body>
</html>


