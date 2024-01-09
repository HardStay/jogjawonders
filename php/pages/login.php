<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login JogjaWonders</title>
  <link rel="stylesheet" href="../../css/pages/login.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <?php
  include_once("../connect.php");

  session_start();

  if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errors = array();
    $sql = "SELECT UsernameMitra, PasswordMitra, Status, IDMitra FROM mitra WHERE UsernameMitra = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $sql_admin = "SELECT Username, Password FROM admin WHERE Username = '$username'";
    $result_admin = mysqli_query($conn, $sql_admin);
    $admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
    if ($user) {
      $sql .= " AND Status = 'Approved'";
      $result = mysqli_query($conn, $sql);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if ($user) {
        if (password_verify($password, $user["PasswordMitra"]) or $password == $user["PasswordMitra"]) {
          $_SESSION["user"] = $user["UsernameMitra"];
          $_SESSION["user_id"] = $user["IDMitra"];
          header("Location: ../../index.php");
          die();
        } else {
          $errors["password"] = "Password does not match";
        }
      } else {
        $errors["status"] = "Your Account Still On Verification";
      }
    } else if ($admin) {
      if ($password == $admin["Password"]) {
        $_SESSION["admin"] = $admin["Username"];
        header("Location: ../../index.php");
        die();
      } else {
        $errors["password"] = "Password does not match";
      }
    } else {
      $errors["username"] = "Username does not match";
    }
  }


  ?>
  <div class="container">
    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <?php
      // Display error message if exists
      if (isset($errors)) {
        foreach ($errors as $error) {
          echo "<div class='alert alert-danger'>$error</div>";
        }
      }
      ?>
      <div class="input-box">
        <input type="text" name="username" id="username" placeholder="Username" />
        <i class="bx bxs-user"></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Password" />
        <i class="bx bxs-lock-alt"></i>
      </div>
      <input type="submit" name="login" value="Login" class="submit-btn" />
      <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>

</html>