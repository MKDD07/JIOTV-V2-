<?php

// * Copyright 2021-2024 SnehTV, Inc.
// * Licensed under MIT (https://github.com/mitthu786/TS-JioTV/blob/main/LICENSE)
// * Created By : TechieSneh

error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

include "functions.php";

function handleLogin()
{
  $msg = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $otp_data = send_jio_otp($user);

    if ($otp_data["status"] == "error") {
      $msg = $otp_data["message"];
      header("Location: index.php?OtpError&msg=" . urlencode($msg));
      exit();
    } else {
      header("Location: otpVerify.php?user=" . $user);
      exit();
    }
  }

  renderLoginForm($msg);
}

function renderLoginForm($msg)
{
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BcjC6R8/jiotv.png">
    <link rel="stylesheet" href="../assets/css/tslogin.css">
    <title>JioTV Login</title>
  </head>

  <body>
  <div class="content-container">
    <img src="https://i.ibb.co/BcjC6R8/jiotv.png" alt="JioTV Logo" width="250px" height="250px" style="margin-left: auto; margin-right: auto; display: block" />
    
    <div class="alert" style="display: none">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    
    <tab-container>
        <tab-content>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="formcontainer">
                    <div class="container">
                        <h3 style="text-align: left; font-size: 20px; color: #FFFFFF; opacity: 1.0;">Login to continue</h3>
                        <div class="input-row">
                            <div class="col-2">
                                <span class="country-code">+91</span>
                            </div>
                            <div class="col-10">
                                <input id="username" name="username" type="text" minlength="10" maxlength="10" placeholder="Your Mobile Number" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" />
                            </div>
                        </div>
                        <button type="submit" style="display: block; width: 100%; padding: 10px; background-color: #BA3B46; color: white; border: none; height: 46px; border-radius: 8px; font-size: 14px; font-weight: 600;">LOGIN</button>
                    </div>
                </div>
            </form>
        </tab-content>
    </tab-container>
    
    <p style="text-align: center; font-size: small; opacity: 0.5">
        JioTV [ SNEH-TV ]
    </p>
</div>

  </body>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const params = new URLSearchParams(window.location.search);
      const alertEl = document.querySelector(".alert");

      if (params.has("success")) {
        showAlert(alertEl, "Success!", "You have been logged in", "success", "#70c1b3");
        const currentProtocol = window.location.protocol;
        const currentHost = window.location.host;
        const currentPathname = window.location.pathname.replace("app/login/index.php", "index.php");
        setTimeout(function() {
          const newURL = currentProtocol + "//" + currentHost + currentPathname;
          window.location.replace(newURL);
        }, 500);
      } else if (params.has("error") || params.has("OtpError")) {
        const errorMsg = params.get("msg");
        showAlert(alertEl, "Error!", errorMsg, "error", "#BA3B46");
      }
    });

    function showAlert(alertEl, title, message, type, color) {
      alertEl.innerHTML = `
      <span class="closebtn" onclick="closeAlert(this.parentElement);" style="border-radius: 8px;">&times;</span>
      <strong>${title}</strong> ${message}
    `;
      alertEl.classList.add(type);
      alertEl.style.backgroundColor = color;
      alertEl.style.display = "block";
    }

    function closeAlert(alertContainer) {
      alertContainer.style.display = "none";
    }
  </script>
<style>
  .input-row {
    display: flex; /* Use flexbox for layout */
    align-items: center; /* Center items vertically */
    border-bottom: 2px solid #FFFFFF; /* Add bottom border */
    margin-bottom:25px;
  }

  /* Style for the country code column */
  .col-2 {
    flex: 0 0 30px; /* Set width to 30px */
  }

  /* Style for the input field column */
  .col-10 {
    flex: 1; /* Allow the input field to grow and fill the remaining space */
    margin-left: 10px; /* Add some margin between columns */
  }

  /* Style for the "+91" text */
  .country-code {
    font-size: 20px; /* Font size */
    font-weight: 600; /* Font weight */
    color: #fff; /* Text color */
  }

  /* Style for the input field */
  #username {
    border: none; /* Remove default border */
    background-color: transparent; /* Set background color to transparent */
    padding: 8px; /* Add padding for spacing */
    font-size: 20px; /* Increase font size */
    font-weight: 600; /* Set font weight to semi-bold */
    color: #000000; /* Set text color */
    outline: none; /* Remove outline on focus */
    transition: border-color 0.3s; /* Add transition effect for border color */
  }

  /* Style for input field when focused */
  #username:focus {
    border-color: #BA3B46; /* Change border color when focused */
    opacity: 0.8; /* Reduce opacity when focused */
  }
        body{
      background-color: #232528;
      overflow: hidden;
      position: relative;
    }

    .box-1 {
      position: fixed;
      transform: rotate(80deg); 
      top: 0;
      left: 0;
    }

    .box-2 {
      position: fixed;
      transform: rotate(80deg); 
      top: 0;
      right: -500px;
    }

    .wave {
      position: absolute;
      opacity: .4;
      width: 1500px;
      height: 1300px;
      border-radius: 43%;
      margin-left: -250px;
  margin-top: -250px;
    }

    .wave.-one {
      animation: rotate 10000ms infinite linear;
      opacity: 5%;
      background: white;
    }

    .wave.-two {
      animation: rotate 6000ms infinite linear;
      opacity: 10%;
      background: white;
    }

    @keyframes rotate {
      from {transform: rotate(0deg);}
      to {transform: rotate(360deg);}
    }
    h1 {
  text-transform: uppercase;
}
.alert{
  background-color:#BA3B46;
}
.toggleLabel{
  background-color:#393A3D;
  border-radius: 8px 8px 0 0;
}
.submit{
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 13px 32px;
  gap: 10px;
  width: 127px;
  height: 46px;
  border: 0.5px solid #FFFFFF;
  border-radius: 8px;
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 20px;
  letter-spacing: 0.4px;
  text-transform: uppercase;
  color: #FFFFFF;
  background-color: transparent;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}
.tab-container{
  width:50%;
}
  </style>
</head>
<body>
  <div class='box-1'>
    <div class='wave -one'></div>
    <div class='wave -two'></div>
  </div>
  <div class='box-2'>
    <div class='wave -one'></div>
    <div class='wave -two'></div>
  </div>
      <style>
  @keyframes slideInFromBottom {
    0% {
      opacity: 0;
      transform: translateY(100%);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .tab-container {
    animation: slideInFromBottom 0.5s ease-out forwards;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  .formcontainer {
    position: relative;
    z-index: 999; /* Set the z-index to bring this content on top of other content */
}
@media only screen and (max-width: 768px) {
  .wave {
      position: absolute;
      opacity: .4;
      width: 600px;
      height: 1000px;
      border-radius: 43%;
      margin-left: -250px;
     margin-top: -250px;
    }
}
</style>

</body>
  </html>

<?php
}

handleLogin();
?>
