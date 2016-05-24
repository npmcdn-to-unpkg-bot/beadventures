<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {

  //Email information
  $admin_email = "someone@example.com";
  $first_name = $_REQUEST['first_name'];
  $last_name = $_REQUEST['last_name'];
  $email = $_REQUEST['email'];
  $comment = $_REQUEST['comment'];

  //send email
  mail($admin_email, "$first_name", '$last_name', $comment, "From:" . $email);

  //Email response
  echo "Thank you for contacting us!";
  }

  //if "email" variable is not filled out, display the form
  else  {
?>
echo '<script type="text/javascript">alert("shits fucked.");</script>';
<?php
  }
?>