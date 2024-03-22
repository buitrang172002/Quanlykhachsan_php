
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SUN RISE ADMIN</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">


      <div id="login">

        <form method="post">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> 
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>
            <p><input type="submit" name="sub"  value="Login"></p>

          </fieldset>

        </form>

       

      </div>

    </div>
    
  
  
</body>
</html>

<?php
session_start();

if (isset($_SESSION["user"])) {
    header("location: chay.php");
    exit();
}

include('db.php');

$max_attempts = 5;
$login_attempts = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($con, $_POST['user']);
    $mypassword = mysqli_real_escape_string($con, $_POST['pass']);

    $sql = "SELECT iduser FROM user WHERE username = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = $myusername;
        header("location: chay.php");
        exit();
    } else {
        $login_attempts++;

        if ($login_attempts >= $max_attempts) {
            echo '<script>alert("Bạn đã nhập sai tai khoản hoặc mật khẩu. Vui lòng nhập lại.")</script>';
            $_SESSION['login_attempts'] = 0;
            $_SESSION['last_attempt_time'] = time();
        } else {
            echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng. Bạn còn ' . ($max_attempts - $login_attempts) . ' lần thử.")</script>';
        }

        $_SESSION['login_attempts'] = $login_attempts;
    }
}
?>