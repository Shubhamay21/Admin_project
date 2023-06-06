<link href="css/sb-admin-2.min.css" rel="stylesheet">
<?php
$servername ="localhost";
$username="root";
$password="";
$dbname="dash_demo";
$conn = mysqli_connect($servername,$username,$password,$dbname);
if ($conn) {
    // echo "Database Connection Done!";
 }else
 {
    echo '<div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-1 mt-2">
                    <div class="card">
                        <div class="card-body">
                         <h1 class="card-title bg-danger text-white">Database Connection Failed!</h1>
                         <h2 class="card-title">Database Failure!</h2>
                         <p class="card-text">Please Check Your Database Connection!</p>
                         <a href="#" class="btn btn-primary">:(</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
 }
 $conn->close();
?>