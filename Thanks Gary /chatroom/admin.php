<!DOCTYPE html>
<html>
<body>
  
<!-- SESSION ID SEARCH BUTTON -->
<form action="conn.php">
  Session Search:<br>
  <input type="text" name="SessionID">
  <input type="submit" value="Submit">
</form>
<!-- START CODE FOR GETTING SESSION ID SEARCH RESULTS -->
<div style="border-style: solid">
<?php
  if(!empty($_REQUEST['SessionID'])) {
    $UserID = mysqli_real_escape_string($db,$_REQUEST['SessionID']);
    $sql = "SELECT * FROM session WHERE session_ID LIKE '%".$SessionID."%'";
    $r_query = mysqli_query($db,$sql);
?><font style="font-size:25px"><b>Result(s):</b></font><br><u>
      <?php echo 'for session ID ' .$SessionID. ':'; ?></u><br>
      <?php while ($row = mysqli_fetch_array($r_query)){
              echo '<br /> creation date: ' .$row['creation_date'].
                   ' || session stopped: ' .$row['session_stopped'];
            }
  }   ?>
</div>
<!-- END CODE FOR GETTING SEARCH RESULTS -->
  
  
<!-- USER ID SEARCH BUTTON -->
<form action="conn.php">
  User Search:<br>
  <input type="text" name="UserID">
  <input type="submit" value="Submit">
</form>
<!-- START CODE FOR GETTING USER ID SEARCH RESULTS -->
<div style="border-style: solid">
  <?php
    if(!empty($_REQUEST['UserID'])) {
      $UserID = mysqli_real_escape_string($db,$_REQUEST['UserID']);
      $sql = "SELECT * FROM messages WHERE user_ID LIKE '%".$UserID."%'";
      $r_query = mysqli_query($db,$sql);
      ?><font style="font-size:25px"><b>Result(s):</b></font><br><u>
        <?php echo 'for user ID ' .$UserID. ':'; ?></u><br>
        <?php while ($row = mysqli_fetch_array($r_query)){
                echo '<br /> \"' .$row['msg_contents']. 
                     '\" || ' .$row['msg_timestamp']. 
                     ' ||  user ID = ' .$row['user_ID'];
              }
    }
  ?>
  </div>
<!-- END CODE FOR GETTING SEARCH RESULTS -->
  
<!-- USER LISTING BUTTON -->
<br />
<form action="conn.php">
  <input type="submit" value="View All Users">
</form>
<!-- BEGIN CODE TO DISPLAY ALL USERS -->
<?php
  $sql = "SELECT * FROM user";
  $r_query = mysqli_query($db,$sql);
?> <font style="font-size:25px"><b>All Users:</b></font><br>
  <?php while ($row = mysqli_fetch_array($r_query)){
                echo '<br /> User ID: ' .$row['user_id']. 
                     ' || User Name: ' .$row['user_name']. 
                     ' || Full Name: ' .$row['user_first']. ' ' .$row['user_last'];
        }
  ?>
<!-- END CODE TO DISPLAY ALL USERS -->
  
<!-- SESSION LISTING BUTTON -->
<br />
<form action="conn.php">
  <input type="submit" value="View All Sessions">
</form>
<!-- BEGIN CODE TO DISPLAY ALL SESSIONS -->
<?php
  $sql = "SELECT * FROM session";
  $r_query = mysqli_query($db,$sql);
?> <font style="font-size:25px"><b>All Sessions:</b></font><br>
  <?php while ($row = mysqli_fetch_array($r_query)){
                echo '<br /> Session ID: ' .$row['session_id']. 
                     ' || Creation Date: ' .$row['creation_date']. 
                     ' || Session Stopped? (not in progress): ' .$row['session_stopped'];
        }
  ?>
<!-- END CODE TO DISPLAY ALL SESSIONS -->
  
  
  
</body>
</html>
