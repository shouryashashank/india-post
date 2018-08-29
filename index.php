<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>online form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-123456789",
enable_page_level_ads: true
});
</script>
</head>
<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;

}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
.sel {
  width: 100px;
  align: center;
  padding: 5% 0 0;
  margin: auto;
}
.sel button2 {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #FFFFFF;
  width: 100%;
  border: 0;
  padding: 25px;
  color: #43A047;
  font-size: 16px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  
  align: center;
  
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

}
.sel button2:hover,.form button:active,.form button:focus {
  background: #43A047;
  color: #FFFFFF;
}

body {
  #background: #76b852; /* fallback for old browsers */
  background-image: url("bnm.jpg");
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>

<body>
<?php
include("header.php");
include("database.php");
extract($_POST);

if(isset($submit))
{
	$rs=mysql_query("select * from mst_user where login='$loginid' and pass='$pass'");
	if(mysql_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION[login]=$loginid;
        $_SESSION[type]=$type;
       

	}
}
if (isset($_SESSION[login]))
{
echo "<h1 align=center>welcome $loginid</h1>";
		echo '
				<div class="sel">
    			
				
					
                    
					<a href="sublist.php"><button2>Forms  </button2></a>
				
					
					
			
				
			</div>	
			';
//if($type=='truck')
$aaa=0;
echo'<div class="login-page">
    <div class="form"> NOTIFICATIONS <p></p>';
{
    $query = "SELECT * FROM mst_noti_truck "; 
$result = mysql_query($query);
echo "<table>"; 
while($row = mysql_fetch_array($result)){ 
    if ($loginid==$row[0]){ 
echo "<tr><td>   <b>Container Number</b>  </td><td>: $row[1] </td></tr><tr><td> <b>Arrival time</b>  </td><td> : $row[2] </td></tr><tr><td>   <b>Message</b>  </td><td>:  $row[3]  </td></tr>";}  //$row['index'] the index here is a field name
$aaa=1;
}
echo "</table>"; 
}   

//if($type=='ship')
{
    $query = "SELECT * FROM mst_noti_ship "; 
$result = mysql_query($query);
echo "<table>"; 
while($row = mysql_fetch_array($result)){ 
    if ($loginid==$row[0]){ 
echo "<tr><td>   <b>Port terminal number</b>  </td><td>: $row[1] </td></tr><tr><td> <b>Arrival time</b>  </td><td> : $row[2]</td></tr><tr><td> <b>Expected departure time</b>  </td><td> : $row[3] </td></tr><tr><tr><td>   <b>Message</b>  </td><td>:  $row[3]  </td></tr>";}  //$row['index'] the index here is a field name
$aaa=2;

}
if($aaa==0){
    echo"<tr>No notifications</tr>";}
echo "</table>"; 
}   

echo'</div></div>';
		exit;
		

}


?>


  
  
    <div class="login-page">
	<div class="form">
    <form name="form1" method="post" action="" class="login-form">
     
        
        
        <input name="loginid" type="text" id="loginid2" placeholder="username">
    
        
          
        <input name="pass" type="password" id="pass2" placeholder="password">
       
        
          <span class="errors">
            <?php
		  if(isset($found))
		  {
		  	echo "Invalid Username or Password";
		  }
		  ?>
          </span>
        
     
		  <button name="submit" type="submit" id="submit" >Login</button>	

 
          <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
         
     
      
    </form></div></div>
  


</body>
</html>	