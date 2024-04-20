<?php
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

/* Center align content */
.container1 {
  max-width: 1380px;
  margin: 0 auto;
  padding: 20px;
}

/* Header/Blog Title */
.header1 {
  font-size: 40px;
  text-align: center;
  background: white;
  font-family: Arial;
  padding: 10px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .container {
    padding: 0;
  }
}
</style>
</head>
<body>

<?php
blog_detail();
?>
</body>
</html>

<?php
include('footer.php');
?>
