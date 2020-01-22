<?php
/*
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
*/
require_once ("../data/config.php");
$nonsense = "supercalifragilisticexpialidocious";
if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
    include "../functions.php" ;
    define("dirCount", count(scandir(dirname(getcwd()).uploads)));
    if (!empty($_GET['delete'])) {
        deleteDir();
        header("Location: ./");
    }
    if (!empty($_GET['file'])) {
        getFiles();
    } echo('
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
		<title>Read files</title>
		<link rel="stylesheet" href="../css.css">
		<link rel="icon" type="image/png" href="../img/favicon.png" />
	</head>
	<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="../index.php">'.$site_name.'</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor02">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../about.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../privacy.php">Privacy Policy</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../terms.php">Terms & Conditions</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../contact.php">Contact Us</a>
					</li>
				</ul>

			</div>
		</div>
	</nav>
	<div class="container py-5 text-center">
		<h1>'.$site_name.' Admin</h1>
		<p>'.$site_descr.'</p>			
			<h3>All Uploaded Files</h3>
			<br>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-body">
					<table class="table table-hover">
						<thead class="bg-primary text-white" >
							<tr> 
								<th class="desktop-visible"> Num</th> 
								<th> Directory name:</th> 
								<th class="files-in-dir"> Files in dir</th> 
								<th class="toggle-col"> Download</th> 
								<th class="toggle-col"> Delete</th> 
							</tr>
						</thead>
						<tbody>
						');
							for ($i=2; $i<dirCount; $i++) {  
								$name = scandir(dirname(getcwd()).uploads)[$i];
								echo "<tr class='toggle-row-click'> <td class='desktop-visible'>" . ($i-1) . "</td> <td class='dir-name'> " . $name . "</td> <td> " . (count(scandir(dirname(getcwd()).uploads.$name)) -2 ). "</td> <td class='toggle-col'> <a href='./?file=$name'> <img src='../img/download.svg' alt='heart-icon' title='Download file'></a>" . "" . "</td> <td class='toggle-col'><a href='./?delete=$name'> <img src='../img/delete.svg' alt='heart-icon' title='Delete file' name='delete-button'></a></td> </tr>";
								echo "<tr class='toggle-row hidden'>  <td class='blue-color'> <a href='./?file=$name'> <img src='../img/download.svg' alt='download-icon' title='Download file'></a> </td>    <td class='red-color'> <a href='./?delete=$name'> <img src='../img/delete.svg' alt='delete-icon' title='Delete file' name='delete-button'></a>    </td> </tr>";
							} 
						echo (' 
						</tbody>
					</table>
					<div class="text-center py-3" >
						<a href="../index.php" class="btn btn-success btn-md">Back To Home</a>
					</div>
				</div>	
			</div>	
		</div>
	</div>		   
	<script src="script.js"></script>
	</body>
	</html>
	');
		exit;
	   } 
	}
	if (isset($_GET['p']) && $_GET['p'] == "login") {
	   if ($_POST['user'] != $username) {
		header('Location: ../index.php');
		  exit;
	   } else if ($_POST['keypass'] != $password) {
		header('Location: ../index.php');
		  exit;
	   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
		  setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
		  header("Location: $_SERVER[PHP_SELF]");
	   } else {
		header('Location: ../index.php');
	   }
	}
	?>
	
<!--
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
-->
<html>
<head>
	<link rel="icon" type="image/png" href="../img/favicon.png" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script> 
		(function () {
			var d = {
				open: false,
				orientation: null
			};
			var b = new Image();
			Object.defineProperty(b, "id", {
				get: function () {
					d.open = true
				}
			});
			var a = 160;
			var c = function (f, e) {
				window.dispatchEvent(new CustomEvent("devtoolschange", {
					detail: {
						open: f,
						orientation: e
					}
				}))
			};
			setInterval(function () {
				var f = window.outerWidth - window.innerWidth > a;
				var g = window.outerHeight - window.innerHeight > a;
				var e = f ? "vertical" : "horizontal";
				if (!(g && f) && ((window.Firebug && window.Firebug.chrome && window.Firebug.chrome.isInitialized) || f || g)) {
					if (!d.open || d.orientation !== e) {
						c(true, e)
					}
					d.open = true;
					d.orientation = e
				} else {
					if (d.open) {
						c(false, null)
					}
					d.open = false;
					d.orientation = null
				}
				console.log(b);
				console.clear();
				if (d.open) {
					document.querySelector('html').innerHTML = "";
				}
			}, 500);
			if (typeof module !== "undefined" && module.exports) {
				module.exports = d
			} else {
				window.devtools = d
			}
		})();
		document.onkeydown = function(e) {
			if(event.keyCode == 123) {
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
				return false;
			}
			if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
				return false;
			}
		}
	</script>		
</head>
<!--
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
-->
<body oncontextmenu="return false;">
	<div class="bg-light">
		<div class="container">
			<div class="row justify-content-center align-items-center" style="height:100vh">
				<div class="col-4">
					<div class="card">
						<div class="card-body">
							<div class="container py-1 text-center">
								<a href="../index.php"><img alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>" width="60px" height="60px" src="../img/logo.png" /></a>
								<h1 alt="<?php echo $one_seo_keyword; ?>" title="<?php echo $one_seo_keyword; ?>"><?php echo $site_name; ?></h1>
								<p><?php echo $site_descr; ?></p>	
							</div>
							<form  action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post" autocomplete="off">
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">User</span>
										</div>						
										<input type="text" class="form-control" name="user">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">Pass</span>
										</div>						
										<input type="password" class="form-control" name="keypass">
									</div>
								</div>
								<button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="script.js"></script>
</body>
<!--
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
-->
</html>