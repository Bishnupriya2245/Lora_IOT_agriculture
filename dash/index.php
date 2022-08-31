 <?php
session_start();
if(!$_SESSION['db1'])
{
    header('location:login.php');
}
 ?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id,temperature,humidity,soiltemp,soilmoisturepercent FROM dht11 WHERE ID = (SELECT MAX(ID) FROM dht11);";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_row($result)) {

 
} else {
  echo "0 results";
}

mysqli_close($conn);
header("refresh: 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

</head>
<body>
    <div class="container">
        <nav>
          <ul>
            <li><a href="#" class="nav-item">
              <span class="material-icons-outlined"> grid_view</span>
              Dashboard
            </a></li>
            <li><a href="#" class="nav-item">
              <span class="material-icons-outlined">
                poll
                </span>
              Statistics
            </a></li>
            <li><a href="#" class="nav-item">
              <span class="material-icons-outlined">
                settings
                </span>
                Settings
            </a></li>
            <li><a href="#" class="nav-item">
              <span class="material-icons-outlined">
                help
                </span>
                Help
              </a></li>
            <li><a href="logout.php" class="logout">
              <span class="material-icons-outlined">
                logout
                </span>
                Logout
            </a></li>
          </ul>
        </nav>
    
    
        <section class="main">
            <div class="main-top">
              <h1>Dashboard</h1>
             
             </div>
          <div class="users">
              <div class="card">
               
                <h4>Temperature</h4>
                <p style="font-size:32px;text-align:center;padding:35px;margin:20px;"> <?php echo  $row[1]; ?>°C</p >
              </div>
            
            <div class="card1">
               
                <h4>Humidity</h4>
                <p style="font-size:32px;text-align:center;padding:35px;margin:20px;"> <?php echo $row[2] ?>%</p>
              </div>
              <div class="card2">
               
                <h4>Soil Temperature</h4>
                <p style="font-size:32px;text-align:center;padding:35px;margin:20px;"><?php echo $row[3] ?>°C</p>
              </div>
              <div class="card3">
               
                <h4>Soil Moisture</h4>
                <p style="font-size:32px;text-align:center;padding:35px;margin:20px;"><?php echo $row[4] ?>%</p>
              </div>
              
            </div>
        </section>
    </div>
</body>
</html>

