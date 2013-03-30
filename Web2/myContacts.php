<?php require_once('security/DB.php'); ?>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    //If the session user variable is blank redirect to the login screen. Otherwise grab sorted contacts from the database.
    if($_SESSION['user']==""){
        header("location:login.php");
    }else{
        $sql="SELECT * FROM contacts order by Name";
        $result=mysql_query($sql);
    }


?>

<!DOCTYPE html> 
<html>
<head>
	<title>Ryan Coulter Mobile</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Custom Theme Roller -->
	<link rel="stylesheet" href="themes/RyanWeb.min.css" />
	<!-- Base jQuery Mobile CSS -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile.structure-1.3.0.min.css" />
    <link rel="stylesheet" href="themes/flexslider.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
</head>

<body>
	<div data-role="page" data-theme="a">
	
        <header data-role="header">
        	<img id="logo" src="images/logo.png" alt="Ryan Coulter: Programmer">
        </header><!-- /header -->
    	
        <div data-role="navbar" data-iconpos="top">
          <ul>
            <li><a href="index.html" data-icon="home">Home</a></li>
            <li><a href="About.html" data-icon="info" >About Me</a></li>
              <li><a href="Contact.html" data-icon="star">Contact Me</a></li>
          </ul>
        </div><!-- /navbar -->
        <div data-role="navbar">
          <ul>
            <li><a href="Projects.html" >Projects</a></li>
            <li><a href="Services.html">Services</a></li>
              <li><a href="myContacts.php" class="ui-btn-active ui-state-persist">My Contacts</a></li>
          </ul>
        </div><!-- /navbar -->

        <section data-role="content">
            <article>
                <p>Welcome <?php echo($_SESSION['user']);?></p>
                <table class="contactTable">
                    <tr>
                        <td class="tblHead">Name</td><td class="tblHead">Phone</td><td class="tblHead">Address</td><td class="tblHead">Email</td>
                    </tr>
                <?php
                    //Process all returned rows
                    while ($row = mysql_fetch_assoc($result)) {
                        //Add a table row for each result row and adds an alert dialog (I don't know why we needed the alert. No one would EVER do this on a real website...)
                        echo("<tr><td><a href='' onClick='alert(\"".$row['Name'].", ".$row['Phone'].", ".$row['Address'].", ".$row['Email']."\")'>".$row['Name']."</td><td><a href='tel:".$row['Phone']."'>".$row['Phone']."</a></td><td>".$row['Address']."</td><td>".$row['Email']."</td></tr>");
                    }
                ?>
                </table>
                <!--Log out button-->
                <form method="post" action="security/logout.php">
                    <input type="submit" value="Log out">
                </form>
            </article>
        </section><!-- /content -->
    
        <footer data-role="footer" id="centerFooter">
        	<h3>Copyright 2013</h3>
            <a href="http://webdesign4.georgianc.on.ca/~200168042">Full Site</a>
        </footer><!-- /footer -->
	</div><!-- /page -->
	
</body>
</html>

<script src="js/jquery.flexslider-min.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
</script>

