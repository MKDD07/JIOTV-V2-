<?php

// * Copyright 2021-2024 SnehTV, Inc.
// * Licensed under MIT (https://github.com/mitthu786/TS-JioTV/blob/main/LICENSE)
// * Created By : TechieSneh

error_reporting(0);
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$local_ip = getHostByName(php_uname('n'));
$ip_port = $_SERVER['SERVER_PORT'];
if ($_SERVER['SERVER_ADDR'] !== "127.0.0.1" || 'localhost') {
  $host_jio = $_SERVER['HTTP_HOST'];
} else {
  $host_jio = $local_ip;
}
$jio_path = $protocol . $host_jio  . str_replace(" ", "%20", str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']));

$data = $_REQUEST['data'];
$data = base64_decode($data);
$data = explode("=?=", $data);

$id = $data[1];
$cid = $data[0];
$cid = str_replace("_", " ", $cid);
$pg = $data[2];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>JioTV+ : <?php echo $cid; ?> Catchup</title>
  <meta name="description" content="LIVE JIOTV CATCHUP">
  <meta name="keywords" content="JIOTV, LIVETV, SPORTS, MOVIES, MUSIC">
  <meta name="author" content="TSNEH">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BcjC6R8/jiotv.png">
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<header>
        <div id="jtvh1">
            <a href="http://localhost/index.php">
                <img src="assets/main_assets/main_logo.png" alt="JIOTV+">
            </a>
        </div>
        <div id="userButtons">
            <!-- Ensure proper PHP tag for variable interpolation -->
            <button id="refreshButton">
                <img src="assets/main_assets/reload.svg" alt="Refresh" width="23" height="23" />
            </button>
        </div>
        
    </header>

<div id="jtvh1">
    <a href="index.php">
        <h1><?php echo $cid; ?></br>CATCHUP</h1>
    </a>
</div>

<?php

function get_T_time($startEpoch)
{
    $startTimestampSeconds = $startEpoch / 1000;
    $dateTime = new DateTime('@' . $startTimestampSeconds);
    $newTime = $dateTime->format('Ymd\THis');
    return $newTime;
}

$headers = array(
    'Host' => 'jiotvapi.cdn.jio.com',
    'user-agent' => 'okhttp/4.9.3',
    'Accept-Encoding' => 'gzip'
);

$opts = ['http' => ['method' => 'GET', 'header' => array_map(
    function ($h, $v) {
        return "$h: $v";
    },
    array_keys($headers),
    $headers
)]];
$context = stream_context_create($opts);

$haystacks = @file_get_contents("https://jiotvapi.cdn.jio.com/apis/v1.3/getepg/get?offset=$pg&channel_id=$id&langId=6", false, $context);

if ($haystacks === false) {
    echo 'Error fetching data from external API';
    exit;
}

$catchupDataArr = @json_decode(gzdecode($haystacks), true);

// Start the main row
echo '<div class="main_row" style="display: flex; flex-wrap: wrap;">';
// Loop through each episode in the $catchupDataArr
for ($i = 0; $i < count($catchupDataArr['epg']); $i++) {
    // Extracting episode data
    $episodePoster = "https://jiotv.catchup.cdn.jio.com/dare_images/shows/" . $catchupDataArr['epg'][$i]['episodePoster'];
    $episodedate = $catchupDataArr['epg'][$i]['episodePoster'];
    $result1 = substr($episodedate, 0, 10);
    $showtime = $catchupDataArr['epg'][$i]['showtime'];
    $endtime = $catchupDataArr['epg'][$i]['endtime'];
    $epiShowTime = str_replace(":", "", $showtime);
    $episode_desc = $catchupDataArr['epg'][$i]['description'];
    $name = $catchupDataArr['epg'][$i]['showname'];
    $name = str_replace("/", " ", $name);
    $name = str_replace(" ", " ", $name);
    $srno = $catchupDataArr['epg'][$i]['srno'];

    $begin = get_T_time($catchupDataArr['epg'][$i]['startEpoch']);
    $end = get_T_time($catchupDataArr['epg'][$i]['endEpoch']);

    $data = $name . '=?=' . $id . '=?=' . $epiShowTime . '=?=' . $srno . '=?=' . $begin . '=?=' . $end;
    $link = $jio_path . 'cplay.php?data=' . base64_encode($data);

    // Outputting the episode card



    echo '<div class="movie_card" id="bright" style="background-image: url(' . $episodePoster . '); background-size: cover; background-position: center; max-width: 720px; height: 340px; border-radius: 8px; position: relative; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
    <div class="info_section" style="background: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 8px; height: 100%; box-sizing: border-box;">

          <div class="movie_header_1">
              <h3>' . $name . '</h3>
              <div class="movie_desc_1">
              <p class="text">' . $episode_desc . '</p>
              </div>
              <div class="Information">
              <span class="minutes">' . $result1 . '</span>
              <h4>' . date("g:i A", strtotime($showtime)) . " - " . date("g:i A", strtotime($endtime)) . '</h4>
          
              <div class="movie_social_1">
                  <ul>
                      <li>
                      <a href="' . $link . '" style="text-decoration: none; color: inherit;">
                      <div style="box-sizing: border-box; display: flex; flex-direction: row; justify-content: center; align-items: center; height: 60px; width: 60px;">
                          <img src="assets/main_assets/play.svg" alt="Play Icon" style="width: 100%; height: auto;">
                      </div>
                  </a>
                  
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>'; 
}
?>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.0.1/color-thief.min.js'></script>
<script src='assets/js/script.js'></script>
<style>
  
#refreshButton {
    width: 20px;
    height: 23.04px;
    padding: 0;
    border: none;
    background-color: transparent;
    cursor: pointer;
}

#refreshButton img {
    width: 100%;
    height: 100%;
}

header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px 0px 20px;
      color: #fff;
    }

    @media (max-width: 768px) {
      header {
        flex-direction: row;
        align-items: center;
        text-align: center;
      }
    }
@media (max-width: 1200px) {
  .movie_card {
    max-width: 500px;
  }
}
.movie_card{
  margin:15px;
}
.movie_desc{
  width: 100%;
}
    .movie_social a div:hover {
        background-color: #BA3B46;
        color: #FFFFFF;
    }
    .info_section{
      padding:none;
    }
    h1{
      display:none;
    }
.movie_desc_1{
font-family: 'Roboto';
font-style: normal;
font-weight: 300;
font-size: 12px;
line-height: 17px;
text-align: justify;
letter-spacing: 1px;
text-transform: uppercase;
color: #FFFFFF;
flex: none;
height:51px;
order: 0;
flex-grow: 1;
padding-bottom:180px;
color: rgba(255, 255, 255, 0.5);


}
h3 {
  margin-bottom: 25px;
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400; /* Set the default weight to 400 */
  font-size: 28px;
  line-height: 35px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: #FFFFFF;
  flex: none;
  height: 51px;
  order: 0;
  flex-grow: 1;
}

h3::first-letter {
  font-weight: 700; /* Set the first letter weight to 700 */
}

.Information{
  display:flex;
  gap:10px;
  align-items: center;
}
.minutes {
  background: rgba(35, 37, 40, 0.5);
  filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
}

.minutes, h4 {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 13px 24px;
  gap: 10px;
  height: 46px;
  border: 0.5px solid #FFFFFF;
  border-radius: 8px;
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 400;
  background: rgba(0, 0, 0, 0.2);
  font-size: 16px;
  line-height: 20px;
  letter-spacing: 0.4px;
  text-transform: uppercase;
  color: #FFFFFF;
  cursor: pointer;
  transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}
.minutes:hover, h4:hover {
    box-sizing: border-box;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 13px 24px;
    gap: 10px;
    height: 46px;
    border: 0.5px solid #BA3B46; /* Changed border color to #BA3B46 */
    border-radius: 8px;
    font-family: 'Roboto', sans-serif;
    font-style: normal;
    font-weight: 400;
    background: #BA3B46; /* Changed background color to #BA3B46 */
    font-size: 16px;
    line-height: 20px;
    letter-spacing: 0.4px;
    text-transform: uppercase;
    color: #FFFFFF;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s;
}

ul {
    list-style-type: none; /* Hide bullet points */
}
.movie_social_1{
  margin-left:200px;
}
body{
  background:#232528;
  font-family: 'Roboto', sans-serif;
}
.Information{
  justify-content: space-evenly;
  
}
.main_row{
  justify-content: center;
}
.movie_card {
        transition: transform 0.3s; /* Adding transition for smooth animation */
    }

    .movie_card:hover {
        transform: scale(1.05); /* Scale up by 105% on hover */
    }
    #jtvh1 img{
      width: 150px;
      height:60px;
    }

</style>

<script>
document.getElementById('refreshButton').addEventListener('mouseover', function() {
    this.querySelector('img').src = 'assets/main_assets/reload_hover.svg';
});
document.getElementById('refreshButton').addEventListener('mouseout', function() {
    this.querySelector('img').src = 'assets/main_assets/reload.svg';
});
</script>
<style>
@media (max-width: 768px) {
  .movie_card {
    width: 90%;
    height:350px;
  }
  .movie_desc_1, .text
  {
    width: 90%;
    height:auto;
    padding:0px;
  }
  .Information {
  position: absolute;
  bottom: 120px;
  left: 10px; /* Assuming you want it to be aligned to the left */
  width: 90%; /* Assuming you want it to take the full width */
  display:flex;
  flex-direction: column;
  height:50px;
  gap:10px;
}

.minutes, h4
{
  front-size:10px;
  width: 250px;
  border:none;
}
.movie_card {
  background-size: cover;
  background-position: center;
}
ul{
  padding-left:25px;
  width:300px;
}
}

</style>
</body>

</html>

