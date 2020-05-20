<?php
  session_start();
  include "koneksi.php";
 ?>

<!DOCTYPE html>
  <head>
    <meta name="viewport" content="width=device-width">
    <title>Login Page CoVMATION | COVID-19 Informations</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo"><img src="img/whitecovmation.png"
        </div>
        <h1>Welcome to COVMATION Login Page</h1>
        </div>
        </header>
    <form class="box" method="post">
      <h1>Login</h1>
      <label for="">Username : </label>
      <input type="text" name="fusername"><br>
      <label for="">Password :</label>
      <input type="password" name="fpassword" value=""><br>
      <button type="submit" name="fmasuk">Login</button>
    </form>

    <?php
    if (isset($_POST ['fmasuk'])) {
      $username = $_POST['fusername'];
      $password = $_POST['fpassword'];
      $qry = mysqli_query($koneksi,"SELECT * FROM tab_login WHERE username = '$username' AND password = md5('$password')");
      $cek = mysqli_num_rows($qry);
      if ($cek ==1) {
        $_SESSION['userweb']=$username;
        header ("location:index.html");
        exit;
      }
      else {
        echo "Sorry your username and password are wrong";
      }
    }
     ?>
  </body>
  <footer>
   <p>COVMATION, Copyright @2020</p>
  </footer>
  </html>
