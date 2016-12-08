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
		color: black;
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
<form action="conn.php">
  Session Search:<br>
  <input type="text" name="SessionID">
  <input type="submit" value="Submit">
</form>
<br>
<br>
<form action="conn.php">
  User Search:<br>
  <input type="text" name="UserID">
  <input type="submit" value="Submit">
</form>
<br>
<br>
<form METHOD="Link" ACTION="index.php"><INPUT TYPE="submit" VALUE="Return"></form>
<br>
<br>



<footer>Copyright © Project12.com</footer>

</body>
</html>