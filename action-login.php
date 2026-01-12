<?php       
    // memulai session
    session_start();

    // mengambil isian dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "conf/conn.php";
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    
    // Use prepared statement to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND pass = MD5(?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;
    
    // pengecekan kredensial login    
    if ($rows == 1) {
        session_start();
        $_SESSION['username'] = $username;  
        while ($row = $result->fetch_assoc())
        {
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['akses'] = $row['akses'];            
        }             
        header("Location: index.php");
    } 
    else {
        header("Location: login.php");        
   }
   $stmt->close();
?>