<?php

// * Copyright 2021-2024 SnehTV, Inc.
// * Licensed under MIT (https://github.com/mitthu786/TS-JioTV/blob/main/LICENSE)
// * Created By : TechieSneh

error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

include "functions.php";
$user = @$_REQUEST['user'];

function handleLogin()
{
  global $user;
  $msg = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'];
    $otp_data = verify_jio_otp($user, $otp);

    if ($otp_data["status"] == "error") {
      $users = $otp_data["user"];
      $msg = $otp_data["message"];
      header("Location: otpVerify.php?OtpError&user=" . $users . "&msg=" . urlencode($msg));
      exit();
    } else {
      header("Location: otpVerify.php?success");
    }
  }

  renderLoginForm($user);
}

function renderLoginForm($user)
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
    <div>
    <img src="https://i.ibb.co/BcjC6R8/jiotv.png" alt="JioTV Logo" width="250px" height="250px" style="margin-left: auto; margin-right: auto; display: block" />
      <div class="alert" style="display: none">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      </div>
      <tab-container>
        <tab-content>
          <form action="<?php echo $_SERVER['PHP_SELF'] . '?user=' . $user; ?>" method="POST">
            <div class="formcontainer">
              <div class="container">
                <input id="otp" name="otp" type="text" minlength="6" maxlength="6" placeholder="Enter OTP" <?php echo isset($_POST['otp']) ? 'value="' . htmlspecialchars($_POST['otp']) . '"' : ''; ?> />
              </div>
              <button type="submit" style="display: block; width: 100%; padding: 10px; background-color: #BA3B46; color: white; border: none; height: 46px; border-radius: 8px; font-size: 14px; font-weight: 600;">VERIFY</button>
              <p style="text-align: center; font-size: small; opacity: 0.5">
                JioTV [ SNEH-TV ]
              </p>
            </div>
          </form>
        </tab-content>
      </tab-container>
    </div>
  </body>
  <style>
        body{
      background-color: #232528;
      overflow: hidden;
      position: relative;
    }
    #otp {
  border: none;
  border-bottom: 2px solid #FFFFFF; /* Bottom border */
  background-color: transparent;
  padding: 8px;
  font-size: 20px;
  font-weight: 600;
  color: #FFFFFF; /* Text color */
  outline: none;
  transition: border-color 0.3s;
}

#otp:focus {
  border-color: #BA3B46;
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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const params = new URLSearchParams(window.location.search);
      const alertEl = document.querySelector(".alert");

if (params.has("success")) {
  showAlert(alertEl, "Success!", "You have been logged in", "success", "#70c1b3");
  const currentProtocol = window.location.protocol;
  const currentHost = window.location.host;
  const currentPathname = window.location.pathname.replace("app/login/otpVerify.php", "index.php");
  setTimeout(function() {
    const newURL = currentProtocol + "//" + currentHost + currentPathname;
    window.location.replace(newURL);
  }, 500);
} else if (params.has("error") || params.has("OtpError")) {
  const errorMsg = params.get("msg");
  showAlert(alertEl, "Error!", errorMsg, "error", "#BA3B46");
}

function showAlert(element, title, message, type, color) {
  element.innerHTML = `
    <div class="alert ${type}" style="background-color: ${color}; border-radius: 8px;">
      <strong>${title}</strong> ${message}
    </div>
  `;
}


    });

    function showAlert(alertEl, title, message, type, color) {
      alertEl.innerHTML = `
      <span class="closebtn" onclick="closeAlert(this.parentElement);">&times;</span>
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

  </html>

<?php
}

handleLogin();
?>
