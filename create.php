<?php  include 'template/header.php'; ?>
<?php //ดักล็อกอิน
 if(!$_SESSION['username']){
     header('Location: login.php');
     exit();
 }
?>
<?php 
   $action = $_GET['action'];
   if($action) {
       if($action === 'create'){
           $topic = $_POST['topic'];
           $content = $_POST['content'];
           $userID = $_SESSION['user_id'];
        
           $sql = "INSERT INTO table_board (
               board_topic,
               board_content,
               board_member_id
           ) VALUES (
               '$topic',
               '$content',
               '$userID'
           )";

        $result = $conn->exec($sql);

        if($result){
            echo "<script>alert('สร้างสำเร็จ')</script>";
            echo "<script>window.location='home.php'</script>";

          }else{
            echo "<script>alert('ล้มเหลว!')</script>";
            echo "<script>widow.history.back()</script>";
              
          }

           exit();
       }
   }
?>

<div class="container">
<h2>Create board</h2>
<form action="create.php?action=create" method="post">
 <div class="form-group">
  <label for="topic">topic</label>
  <input type="text" name="topic" id="topic">
 </div>

 <div class="form-group">
 <label for="content">content</label>
  <textarea class="form-conttrol" name="content" id="" cols="30" rows="10"></textarea>
 
 </div>
<input type="submit" class="btn btn-primary" value="create">

</div>
</form>
<?php  include 'template/footer.php'; ?>