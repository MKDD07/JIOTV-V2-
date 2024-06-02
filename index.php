<!--
* Copyright 2021-2024 SnehTV, Inc.
* Licensed under MIT (https://github.com/mitthu786/TS-JioTV/blob/main/LICENSE)
* Created By : TechieSneh
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>JIOTV+</title>
    <meta charset="utf-8">
    <meta name="description" content="ENJOY FREE LIVE JIOTV">
    <meta name="keywords" content="JIOTV, LIVETV, SPORTS, MOVIES, MUSIC">
    <meta name="author" content="Techie Sneh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/BcjC6R8/jiotv.png">
    <link rel="stylesheet" href="app/assets/css/techiesneh.min.css">
    <link rel="stylesheet" href="app/assets/css/search.css">
    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.5/lazysizes.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .watermark {
            position: fixed;
            bottom: 10px;
            right: 10px;
            opacity: 0.25;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <header>
        <div id="jtvh1">
            <img src="app/assets/main_assets/main_logo.png" alt="JIOTV+">
        </div>
        <div id="userButtons">
            <button id="loginButton">Login</button>
            <button id="logoutButton">Logout</button>
            <button id="PlayListButton">PlayList</button>
            <button id="refreshButton">
                <img src="app/assets/main_assets/reload.svg" alt="Refresh">
            </button>
        </div>
    </header>
    <br>
    <div class="frame-120">
        <div class="search-menu">
            <input type="text" name="searchBar" id="searchBar" placeholder="Search for Zee TV HD" />
            <img src="app/assets/main_assets/search_alt_light.svg" alt="Search Icon" class="search-icon">
        </div>
    </div>

    <div class="filters">
        <select id="catchupFilter">
            <option value="">CATCHUP</option>
            <option value="">All</option>
            <option value="y">True</option>
            <option value="n">False</option>
        </select>

        <select id="genreFilter">
            <option value="">GENRE FILTER</option>
            <option value="">All</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Movies">Movies</option>
            <option value="Kids">Kids</option>
            <option value="Sports">Sports</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Infotainment">Infotainment</option>
            <option value="News">News</option>
            <option value="Music">Music</option>
            <option value="Devotional">Devotional</option>
            <option value="Business">Business</option>
            <option value="Educational">Educational</option>
            <option value="Shopping">Shopping</option>
            <option value="JioDarshan">JioDarshan</option>
        </select>

        <select id="langFilter">
            <option value="">LANGUAGE</option>
            <option value="">All</option>
            <option value="Hindi">Hindi</option>
            <option value="English">English</option>
            <option value="Marathi">Marathi</option>
            <option value="Punjabi">Punjabi</option>
            <option value="Urdu">Urdu</option>
            <option value="Bengali">Bengali</option>
            <option value="Malayalam">Malayalam</option>
            <option value="Tamil">Tamil</option>
            <option value="Gujarati">Gujarati</option>
            <option value="Odia">Odia</option>
            <option value="Telugu">Telugu</option>
            <option value="Bhojpuri">Bhojpuri</option>
            <option value="Kannada">Kannada</option>
            <option value="Assamese">Assamese</option>
            <option value="Nepali">Nepali</option>
            <option value="French">French</option>
        </select>
    </div>
    <div id="content">
        <div class="container">
            <div id="charactersList" class="row">
            </div>
        </div>
    </div>
    <img src="app/catchup/assets/main_assets/felix.png" alt="Felix" class="watermark" id="felixImage">
    <script>
        let clickCount = 0;
        const felixImage = document.getElementById('felixImage');

        felixImage.addEventListener('click', () => {
            clickCount++;
            if (clickCount === 3) {
                window.location.href = 'app/assets/main_assets/felix.html';
            }
        });
    </script>
    <script src="app/assets/js/search.js"></script>
    <style>
        .row{
            display:flex;
            justify-content: center;
        }
#logoutButton
 {
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

#logoutButton:hover, #logoutButton:active {
  background-color: #FFFFFF;
  color: #232528;
}
.card-title{
    display:flex;
    margin:2px;
    align-content: center;
    justify-content: center;
    align-items: center;

}
#searchBar {
    padding-left: 20px; /* Padding on the left */
    padding-right: 40px; /* Adjust this value based on the width of the search icon */
    height: 36px; /* Adjust to match your design */
    box-sizing: border-box;
    background: url('app/assets/main_assets/search_alt_light.svg') no-repeat right center;
}
/* Frame 120 */
.frame-120 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 0px 6px;
    gap: 10px;

    width: auto;
    height: 46px;

    flex: none;
    order: 0;
    align-self: stretch;
    flex-grow: 0;
}

/* Search Menu */
.search-menu {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 6px 20px;
    gap: 10px;

    margin: 0 auto;
    width: 800px;
    height: 46px;

    background: #393A3D;
    border-radius: 8px;

    flex: none;
    order: 0;
    flex-grow: 0;
}

#searchBar {
    width: calc(100% - 44px); /* Adjust the width to fill the space excluding the icon */
    height: 24px;

    font-family: 'Roboto', sans-serif;
    font-style: italic;
    font-weight: 400;
    font-size: 12px;
    line-height: 24px;
    letter-spacing: 1.0px;

    color: #FFFFFF;
    background: none;
    border: none;
    outline: none;

    flex: none;
    order: 0;
    flex-grow: 0;
}

.search-icon {
    margin: 0 auto;
    width: 24px;
    height: 24px;

    flex: none;
    order: 1;
    flex-grow: 0;
}

/* Additional styles for icons (Ellipses and Vector) - assumed to be decorative elements */

.ellipse-65,
.ellipse-66,
.vector-109 {
    position: absolute;
    border: 1px solid #FFFFFF;
}

.ellipse-65 {
    left: 20.83%;
    right: 29.17%;
    top: 20.83%;
    bottom: 29.17%;
}

.ellipse-66 {
    left: 33.33%;
    right: 41.67%;
    top: 33.33%;
    bottom: 41.67%;
}

.vector-109 {
    left: 70.83%;
    right: 16.67%;
    top: 70.83%;
    bottom: 16.67%;
}
.search-menu:hover, .search-menu:active{
    border:1px solid #fff;

}
.watermark {
    position: fixed;
    bottom: 10px;
    right: 10px;
    opacity: 0.25;
    z-index: 1000;
    width:30px;
    height:30px;
}
    </style>
</body>

</html>
