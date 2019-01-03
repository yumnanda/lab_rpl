<!DOCTYPE html >
<html>
<head>
<title>Login Admin</title>
<?php include('../../asset/template/admin/css.php'); ?>
<style>
.wrapper{
   margin-top: 9%;
}
body{
   background-color: #0288D1;
}
</style>
</head>
<body>
   <div class="wrapper">
      <div class="row justify-content-center">
         <div class="col-sm-3  py-5 px-5 bg-primary z-depth-2 rounded">
         <h3 class="text-center mb-4 text-white">Login Admin</h3>
         <form action="authen_login.php" method="POST">
            <div class="form-group">
               <label for="username " class="text-white">Username</label>
               <input type="text" class="form-control" id="username" name="user_name" placeholder="Username">
            </div>
            <div class="form-group">
               <label for="password" class="text-white">Password</label>
               <input type="password" class="form-control" id="user_pass" name="user_pass" placeholder="Password">
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-white rounded m-0">Sign in</button>
            </div>
         </form>
         </div>
      </div>
   </div>
   <?php include('../../asset/template/admin/js.php'); ?>
</body>
</html>