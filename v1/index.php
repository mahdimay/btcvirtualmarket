  <head>
<meta charset="utf-8">
<title>Bitcoin Market Simulator</title>
</head>
<body>
  
<form method="post" attribute="post" action="setord.php">
     <h1>LOGIN AND TRADE</h1>
     <p>Enter the amount of bitcoin you want you buy or sell and then enter your username and password. If you don't have an account use sign up form.</p>
<p>Amount of bitcoin:<br/>
<input type="text" id="amount" name="amount" required></p>
<p>Username<br/>
<input type="text" id="user" name="user" required></p>
<p>Password<br/>
<input type="text" id="pass" name="pass" required></p>
<p></p>
<button type="submit" name="buy" id="buy" value="buy">Buy</button>
<button type="submit" name="sell" id="sell" value="sell">Sell</button>
</form>
<h1>SIGN UP FORM</h1>
<form method="post" attribute="post" action="signup.php">
<p>Username<br/>
<input type="text" id="user2" name="user2" required></p>
<p>Password<br/>
<input type="text" id="pass2" name="pass2" required></p>
<p></p>
<button type="submit" name="sub2" id="sub2" value="sub2">Signup</button>
</body>
</html>
