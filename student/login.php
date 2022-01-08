<!DOCTYPE html>
<html>

  <head>
    <title>LMS</title>
    <link rel="stylesheet" href="#">
  </head>

  <body>
  <?php include "logindb.php" ;?>
    <form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      <p>
        Login
      </p>
      <label for="regNo">
        <span style=color:red>*</span>Registration Number
        <input type="text" name="regNo" id="regNo">
      </label>
      <label for="password">
        <span style=color:red>*</span>Password
        <input type="password" name="password" name="password" id="password">
		<input type="checkbox" onclick="myFunction()">Show Password
      </label>
      <input type="submit" name ="next" value="Next">
    </form>
	<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
  </body>

</html>