<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register JogjaWonders</title>
    <link rel="stylesheet" href="../../css/pages/register.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    // include database connection file
    include_once("../connect.php");

    session_start();

    $nama = $username = $email = $phone = $pass = $passConf = $status = "";
    $errors = array();
    $flag = false;

    if (isset($_POST['submit'])) {
        if (empty($_POST["nama"])) {
            $errors["nama"] = "Name is required";
        } else {
            $nama = test_input($_POST["nama"]);
            // cek nama hanya contains letters dan whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
                $errors["nama"] = "(Name) Only letters and white space allowed";
            }
        }

        if (empty($_POST["username"])) {
            $errors["username"] = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
            // cek username hanya contains letters dan whitespace
            if (!preg_match("/^[0-9-a-zA-Z-']*$/", $username)) {
                $errors["username"] = "(Username) Only letters and number are allowed";
            }
            // cek apakah email sudah pernah di daftarkan sebelumnya
            $sql = "SELECT UsernameMitra FROM mitra WHERE UsernameMitra = '$username'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($query) > 0) {
                $errors["username"] = "(Username) Username already exists!";
            }
        }
        if (empty($_POST["email"])) {
            $errors["email"] = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // cek e-mail address sudah sesuai format xyz@xyz.xyz
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "(Email) Invalid email format";
            }
            // cek apakah email sudah pernah di daftarkan sebelumnya
            $sql = "SELECT EmailMitra FROM mitra WHERE EmailMitra = '$email'";
            $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($query) > 0) {
                $errors["email"] = "(Email) Email already exists!";
            }
        }

        if (empty($_POST["phone"])) {
            $errors["phone"] = "Phone Number is required";
        } else {
            $phone = test_input($_POST["phone"]);
            // cek phone hanya contains number dan sebanyak 10 - 13 angka saja
            if (!preg_match("/^[0-9]{10,13}$/", $phone)) {
                $errors["phone"] = "(Phone Number) Only 10 - 13 number are allowed";
            }
        }

        if (empty($_POST["password"])) {
            $errors["password"] = "Password is required";
        } else {
            $pass = password_hash(test_input($_POST["password"]), PASSWORD_DEFAULT);
        }

        if (empty($_POST["confirmPassword"])) {
            $errors["confirmPassword"] = "Password Confirmation is required";
        } else if ($_POST["password"] != $_POST["confirmPassword"]) {
            $errors["confirmPassword"] = "Password do not match";
        } else {
            $passConf = password_hash(test_input($_POST["confirmPassword"]), PASSWORD_DEFAULT);
        }

        $status = test_input("Pending");

        if (empty($errors)) {
            $sql = "INSERT INTO mitra (NamaMitra, UsernameMitra, EmailMitra, KontakMitra, PasswordMitra, Status) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "ssssss", $nama, $username, $email, $phone, $pass, $status);
                mysqli_stmt_execute($stmt);
                $flag = true;
            } else {
                die("Something went wrong");
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <div class="container">
        <h1>Register</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            // Display error message if exists
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            if ($flag) {
                echo "<div class='alert alert-success'>You are registered successfully, please wait until we <b>Approve You</b>.</div>";
            }
            ?>
            <div class="input-box">
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" />
                <i class='bx bxs-user-account'></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Username" />
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email" />
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="tel" name="phone" id="phone" placeholder="Phone Number" />
                <i class='bx bxs-phone'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <input type="submit" name="submit" value="Register" class="submit-btn" />
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>