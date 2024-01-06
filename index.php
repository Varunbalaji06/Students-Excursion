<?php
$insert = false;
if(isset($_POST['name']))
{

    $server = "localHost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con)
    {
        die("Connection to this database lost due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the database";

    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phno = $_POST['phone'];
    $other = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Roll-No`, `Gender`, `Email`, `Phone-No`, `Other`, `dt`) 
    VALUES ('$name', '$rollno', '$gender', '$email', '$phno', '$other', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true)
    {
       // echo "Successfully Inserted";
       $insert = true;
    }
    else
    {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpg" class="bg" alt="IIIT Kottayam"
        <div class="container">
            <h1>Welcome to IIIT Kottayam Dubai Trip Form</h1>
            <p>Enter your details and submit this form to confirm your participation in the Trip</p>
            <?php 
            if($insert == true)
            {
                echo "<p>Thank you for entering your details in the form</p>";
            }
            else
            {
                $not_insert = false;
            }
            ?>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="rollno" id="rollno" placeholder="Enter your rollno">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone_no">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other details here"></textarea>
                <button class="btn">Submit</button>
            </form>
        </div>
    <script src="index.js"></script>
    <!---->
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
