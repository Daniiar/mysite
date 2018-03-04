<?php
  function getBasePath () {
    $base_path = new mysqli("", "", "", "");
    return $base_path;
  }

  function checkConnectingToBase ($base_path) {
    if (!$base_path) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $base_path->query("SET NAMES 'utf8'");
  }

  function authentification ($result_set) {
    do {
      if ($row['admin_user'] === $_POST['admin_user'] and $row['password'] === $_POST['password']) {
        $base_path = getBasePath ();
        checkConnectingToBase ($base_path);
        $session = substr(md5(rand(0,mt_getrandmax())),0,10);
        $user = $_POST['admin_user'];
        $sql = ("UPDATE  `mysite`.`admin_users` SET  `session` =  '$session' WHERE  `admin_users`.`admin_user` =  '$user'");
        $base_path->query($sql);
        // setting Cookie into browser
        setcookie("session", $session);
        setcookie("user", $user); // httponly !!!
        header("Location: /mysite");
        exit;
      } else {
        echo 'Email or password is invalid';
      }
    } while (($row = $result_set->fetch_assoc()) != false);
  }

  function checkCookieOnLogin ($result_set) {
    while (($row = $result_set->fetch_assoc()) != false) {
      // print_r ($row); // for viewing
      if ($row['admin_user'] === $_COOKIE['user'] and $row['session'] === $_COOKIE['session']) {
        echo "WELCOME";
        header("Location: index.php");
        exit;
      } else {
        if(isset($_POST['submit'])) {
          $base_path = getBasePath ();
          checkConnectingToBase ($base_path);
          $admin_user = $_POST['admin_user'];
          $sql = "SELECT * FROM `admin_users` WHERE admin_user='$admin_user'";
          $result_set = $base_path->query ($sql);
          authentification ($result_set);
        }
      }
    }
  }

  function checkSessionOnLogin () {
    $base_path = getBasePath ();
    checkConnectingToBase ($base_path);
    $user_cookie = $_COOKIE['user'];
    $user_sql = "SELECT * FROM `admin_users` WHERE admin_user='$user_cookie'";
    $result_set = $base_path->query($user_sql);
    checkCookieOnLogin ($result_set);
    mysqli_close($base_path);
  }

  function checkCookieOnIndex ($result_set) {
    while (($row = $result_set->fetch_assoc()) != false) {
      // print_r ($row); // for viewing
      if ($row['admin_user'] === $_COOKIE['user'] and $row['session'] === $_COOKIE['session']) {
        echo "WELCOME";
      } else {
        header("Location: login.php");
        exit;
      }
    }
  }

  function checkSessionOnIndex () {
    $base_path = getBasePath ();
    checkConnectingToBase ($base_path);
    $user_cookie = $_COOKIE['user'];
    $user_sql = "SELECT * FROM `admin_users` WHERE admin_user='$user_cookie'";
    $result_set = $base_path->query($user_sql);
    checkCookieOnIndex ($result_set);
    mysqli_close($base_path);
  }
?>