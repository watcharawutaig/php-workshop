<?php  include 'template/header.php'; ?>
<?php //ดักล็อกอิน
 if($_SESSION['username']){
     header('Location: home.php');
     exit();
 }
?>
<?php $ac = $_GET['action'];
 include 'db/connection.php';
if($ac){
    if($ac == "login")
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $hashpassword = hash('SHA256',$pass);

    $sql = "SELECT * FROM table_member WHERE member_username = '$username'AND member_password = '$hashpassword'";
     $query = $conn->query($sql);
     $result = $query->fetch();  
     
     if($result){
         print_r($result);
         $_SESSION['username'] = $result['member_username'] ;
         $_SESSION['user_id'] = $result ['member_id'];
         echo "<script>alert('เข้าสู่ระบบสำเร็จ')</script>";
         echo "<script>window.location= 'home.php'</script>";

     }else{
         echo "<script>alert('ชื่อผู้ใช่ไม่ถูกต้อง')</script>";
         echo "<script>window.history.back()</script>";
     }

     exit();
}

?>

    <div style="width:300px; margin:0 auto;">
    <div class="container">
    <h1>Login Page</h1>
    </div>
        <form action="login.php?action=login" method="post">

            <div class="form-group">
            <label for="username">username</label>
            <input type="text" name="username" id="username"class="form-control">
            </div>

            <div class="form-group">
            <label for="password">password</label>
            <input type="text" name="password" id="password"class="form-control">
            </div>

            <div>
            <input type="submit" value="login" class="form-control">
            </div>
                
        
        </form>
    </div>
    <?php  include 'template/footer.php'; ?>