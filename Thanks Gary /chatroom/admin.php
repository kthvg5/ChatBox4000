<!DOCTYPE html>
<html>
<body>
<title>Administrator Search</title>
<header>ChatBox4000</header>
<h1 class= "center"> Administrator Search </h1>
<style>
	h1 {
		color:blue;
	}
	header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
	//article {
    //margin-left: 970px;
    //border-left: 1px solid gray;
    //padding: 1em;
    //overflow: hidden;
//}
	h1.center {
		color: blue;
    margin: auto;
    //width: 35%;
		text-align: center;
    //border: 3px solid #73AD21;
    padding: 10px;
}
        h3.center {
    margin-left: 970px;
		text-align: center;
   //width: 60%;
   // border: 3px solid #73AD21;
    padding: 10px;
}
	</style>
 <div><a href="index.php">Return to chat</a></div>
<!-- SESSION ID SEARCH BUTTON -->
<form action="admin.php">
  Session Search:<br>
  <input type="text" name="SessionID">
  <input type="submit" value="Submit">
</form>
<!-- START CODE FOR GETTING SESSION ID SEARCH RESULTS -->
<div style="border-style: solid">
<?php
require_once('conn.php');
  if(!empty($_REQUEST['SessionID'])) {
    $SessionID = mysqli_real_escape_string($db,$_REQUEST['SessionID']);
    $sql = "SELECT * FROM session WHERE session_ID LIKE '%".$SessionID."%'";
    $r_query = mysqli_query($db,$sql);
?>

<font style="font-size:25px"><b>Result(s):</b></font><br><u>
	<?php	if(mysqli_num_rows($r_query)>0){
				echo 'For session ID ' .$SessionID. ':'; 
	  
				while ($row = mysqli_fetch_array($r_query)){
					echo '<br /> creation date: ' .$row['creation_date'].
                   ' || session stopped: ' .$row['session_stopped'];
				}
			}	
			else{
				echo'No Sessions found for ID: '.$SessionID. ':'; 
}	
  }  
   ?>

	  
  
   
</div>
<!-- END CODE FOR GETTING SEARCH RESULTS -->
  
  
<!-- USER ID SEARCH BUTTON -->
<form action="admin.php">
  User Search:<br>
  <input type="text" name="UserID">
  <input type="submit" value="Submit">
</form>
<!-- START CODE FOR GETTING USER ID SEARCH RESULTS -->
<div style="border-style: solid">
  <?php
    if(!empty($_REQUEST['UserID'])) {
      $UserID = mysqli_real_escape_string($db,$_REQUEST['UserID']);
      $sql = "SELECT * FROM message WHERE user_ID LIKE '%".$UserID."%'";
      $r_query = mysqli_query($db,$sql);
	  if (!$r_query) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
      }
      ?><font style="font-size:25px"><b>Result(s):</b></font><br><u>
		<?php	if(mysqli_num_rows($r_query)>0){
					echo 'For user ID ' .$UserID. ':'; 
		 
					while ($row = mysqli_fetch_array($r_query)){
						echo '<br /> \"' .$row['msg_contents']. 
						'\" || ' .$row['msg_timestamp']. 
						' ||  user ID = ' .$row['user_ID'];
					}
				}
				else{
					echo'No Messages found for ID: '.$UserID. ':'; 
}		
					
    }
  ?>
  </div>
<!-- END CODE FOR GETTING SEARCH RESULTS -->
  
<!-- USER LISTING BUTTON -->
<br />
<form action="admin.php">
  <input type="submit" value="View All Users">
</form>
<!-- BEGIN CODE TO DISPLAY ALL USERS -->
<div style="border-style: solid">
<?php
require_once('conn.php');
  $sql = "SELECT * FROM user";
  $r_query = mysqli_query($db,$sql);
?> <font style="font-size:25px"><b>All Users:</b></font><br>
  <?php while ($row = mysqli_fetch_array($r_query)){
                echo '<br /> User ID: ' .$row['user_id']. 
                     ' || User Name: ' .$row['user_name']. 
                     ' || Full Name: ' .$row['user_first']. ' ' .$row['user_last'];
        }
  ?>
</div>
<!-- END CODE TO DISPLAY ALL USERS -->
  
<!-- SESSION LISTING BUTTON -->
<br />
<form action="admin.php">
  <input type="submit" value="View All Sessions">
</form>
<!-- BEGIN CODE TO DISPLAY ALL SESSIONS -->
<div style="border-style: solid">
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
</div>
<!-- END CODE TO DISPLAY ALL SESSIONS -->
  
  
  
</body>
<footer>Copyright © Project12.com</footer>
</html>
