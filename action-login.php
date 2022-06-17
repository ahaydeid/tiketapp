<?php       
    // memulai session
    // session_start();

    // mengambil isian dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "conf/conn.php";
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
    $query=mysqli_query($mysqli, "SELECT * FROM users USR 
    WHERE USR.username = '$username' AND USR.pass = md5('$password')");    
    $rows = mysqli_num_rows($query);      
    // pengecekan kredensial login    
    if ($rows == 1) {
        session_start();
        $_SESSION['username'] = $username;  
        while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
        {
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['akses'] = $row['akses'];            
        }             
        header("Location: index.php");
    } 
    else {
        header("Location: login.php");        
   }
?>