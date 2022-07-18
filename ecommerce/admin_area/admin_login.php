<?php include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/adminlogin.webp" alt="Admin Registration" class="image-fluid">
        </div>
        <div class="col-lg-6 col-xl-5">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for ="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter username" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for ="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" required="required" class="form-control">
                </div>
                
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                </div>
            </form>
        </div>

    </div>    


    </div>

</body>
</html>

<?php

if(isset($_POST['admin_login'])){
  $admin_name=$_POST['admin_name'];
  $admin_password=$_POST['admin_password'];
  
  $select_query="Select * from `admin_table` where admin_name='$admin_name'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);

  
  if($row_count>0){
    $_SESSION['admin_name']=$admin_name;
    if(password_verify($admin_password,$row_data['admin_password'])){
      if($row_count==1 and  $row_count_cart==0 ){
        $_SESSION['admin_name']=$admin_name;
        echo "<script>alert('Login Successfull!')</script>";
        echo "<script>window.open('../admin_area/index.php','_self')</script>";
      }else{
        echo "<script>alert('Invalid Credentials')</script>";
      }
    }else{
      echo "<script>alert('Invalid Credentials')</script>";
    }
  }else{
    echo "<script>alert('Invalid Credentials')</script>";
  }

}


?>
