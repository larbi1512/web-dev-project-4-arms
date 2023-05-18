<?php
session_start();
$user_id = $_SESSION["user_id"] ?? 1;
require_once "../db.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./newHome.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open Sans:wght@400;600&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Google Sans:wght@400;500&display=swap"
    />

    <style>
      @font-face {
        font-family: "Nasalization";
        src: url("fonts/nasalization-rg.otf");
        font-weight: 400;
      }

      @font-face {
        font-family: "font";
        src: url("fonts/nasalization-rg.otf");
        font-weight: 400;
      }
    </style>
  </head>

  <body>
    <div class="home-page">
      <img class="white-lines" alt="" src="./public/white-lines.svg" />
      <img
        class="skipping-rope-bro-1"
        alt=""
        src="./public/skipping-ropebro-1.svg"
      />
      <div class="logo">
        <img class="frame-icon" alt="" src="./public/frame.svg" />
        <div class="arms">4-ARMS</div>
      </div>
      <div class="nav-bar">
        <style>
          a {
            text-decoration: none;
            color: #ff182c !important;
          }
        </style>
        <div class="arms"><a href="./newHome.html">Home</a></div>
        <div class="arms"><a href="../workout/workout.php">Workout</a></div>
        <div class="arms"><a href="../diet/diet.php">Diet</a></div>
        <div class="arms"><a href="../Shop/supplement.html">Supplement</a></div>
        <button class="arms login-button" id="profile">
          <div class="profile1">Profile</div>
        </button>
      </div>

      <div id="pROFILEContainer" class="popup-overlay" style="display: none">
        <div class="profile">
          <div class="profile-child"></div>
          <img class="profile-item" alt="" src="./public/ellipse-800.svg" />
          <div class="ls">LS</div>
          <div class="larbi-saidchikh">Larbi SAIDCHIKH</div>
          <div class="larbisckgmailcom">larbisck@gmail.com</div>
          <div class="my-progress">my progress</div>
          <div class="my-diet">my diet</div>
          <div class="settings">Settings</div>
          <div class="log-out">Log out</div>
          <div class="my-supplements">my supplements</div>
        </div>
      </div>
      <div class="be-strong-be">Be strong Be fit</div>
      <div class="make-yourself-stronger-container">
        <p class="make-yourself-stronger">Make yourself stronger</p>
        <p class="make-yourself-stronger">than your excuses</p>
      </div>
     


      <a
        href="../workout/workout.php"
        style="display: block; width: 100%; height: 100%"
      >
        <div class="card">
          <?php
          $sql = "SELECT * FROM assigned WHERE user_id = $user_id";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $workout_id = $row['workout_id'];
          $sql = "SELECT * FROM workout_plan WHERE workout_id = $workout_id";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          ?>
          <img
            src="<?php echo $row['workout_img_link'] ?>"
            alt=""
            style="width: 100%; border-radius: 10px"
          />
          <div class="container">
            <h4><b><?php echo $row['workout_name'] ?></b></h4>
            <p>check your workout progress</p>
          </div>
        </div>
      </a>

      <a
        href="../diet/diet.php"
        style="display: block; width: 100%; height: 100%"
      >
        <div class="cardyuh">
                    <?php
                    $sql = "SELECT * FROM assigned WHERE user_id = $user_id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $diet_id = $row['diet_id'];
                    $sql = "SELECT * FROM diet WHERE diet_id = $diet_id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    ?>
          <img
           src="<?php echo $row['diet_link_img'] ?>" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7"
            alt="Diet"
            style="width: 100%; border-radius: 10px"
          />
          <div class="container">
            <h4><b>Be healthy</b></h4>
            <p>Do not forget ur diet</p>
          </div>
        </div>
      </a>

       <a
        href="../Shop/supplement.html"
        style="display: block; width: 100%; height: 100%"
      >
        <div class="cardib">

          <img src="" alt="" style="width: 100%; border-radius: 10px" />
          <div class="container">
            <h4><b>
                our shop
              </b></h4>
            <p>check the latest supplements</p>
          </div>
        </div>
      </a>
      <img class="white-lines" alt="" src="./public/white-lines.svg" />

    </div>

    <script>
      var dietText = document.getElementById("dietText");
      if (dietText) {
        dietText.addEventListener("click", function (e) {
          window.location.href = "./diet1.html";
        });
      }

      var loginButton = document.getElementById("profile");
      if (loginButton) {
        loginButton.addEventListener("click", function () {
          var popup = document.getElementById("pROFILEContainer");
          if (!popup) return;
          var popupStyle = popup.style;
          if (popupStyle) {
            popupStyle.display = "flex";
            popupStyle.zIndex = 100;
            popupStyle.backgroundColor = "rgba(113, 113, 113, 0.3)";
            popupStyle.alignItems = "center";
            popupStyle.justifyContent = "center";
          }
          popup.setAttribute("closable", "");

          var onClick =
            popup.onClick ||
            function (e) {
              if (e.target === popup && popup.hasAttribute("closable")) {
                popupStyle.display = "none";
              }
            };
          popup.addEventListener("click", onClick);
        });
      }
    </script>
  </body>
</html>
