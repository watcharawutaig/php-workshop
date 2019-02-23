<?php  include 'template/header.php'; ?>
<?php include 'db/connection.php' ?>
<?php //ดักล็อกอิน
 if($_SESSION['username']){
     header('Location: home.php');
     exit();
 }
?>
<?php
    $action = $_GET['action'];
    if ($action){
        if ($action==='register'){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $lname = $_POST['lastName'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $hashPassword = hash('SHA256', $password);

            $sql = "INSERT INTO table_member (member_username,
                                                member_password,
                                                member_role,
                                                member_name,
                                                member_lastName,
                                                member_email,
                                                member_gender) 
                    VALUES ('$username',
                            '$hashPassword',
                            '0',
                            '$name',
                            '$lname',
                            '$email',
                            '$gender')";
                            
            $result = $conn ->exec($sql);

            if($result){
                echo "<script>alert('ลงทะเบียนสำเร็จ')</script>;";
                echo "<script>widow.location='login.php'</script>";
            }else {
                echo "<script>alert('ลงทะเบียนไม่สำเร็จ')</script>";
           echo "<script>window.history.back()</script>";
                
            }
        }
    }

?>
<div class="container">
<H1>Register</H1>
    <form action="register.php?action=register" method="post">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" placeholder="Username" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" placeholder="Name" name="name" id="name" class="form-control">
    </div> 
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" placeholder="Last Name" name="lastName" id="lastName" class="form-control">
    </div>
        <input type="email" placeholder="Email" name="email" id="" class="form-control">
        <input type="radio" name="gender" id="" value="m" class="form">Male
        <input type="radio" name="gender" id="" value="f" class="form">Female

        <input type="submit" value="OK">
    </form>

</div>

<?php  include 'template/footer.php'; ?>