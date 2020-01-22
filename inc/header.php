<!--
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
-->
<head>
<?php require_once ('data/config.php')?>
	<meta charset="UTF-8">
	<meta name="viewport"				content="width=device-width,initial-scale=1,maximum-scale=1" />	
	<meta http-equiv="Content-Type"		content="text/html; charset=UTF-8" />
    <meta http-equiv="cache-control"	content="max-age=0" />
    <meta http-equiv="cache-control"	content="no-cache" />
    <meta http-equiv="pragma"			content="no-cache" />
    <meta http-equiv="expires"			content="0" />
	<meta name="distribution"			content="web" />
	<meta name="rating"					content="General" />
	<meta name="robots"					content="index,follow" />
	<meta name="googlebot"				content="index,follow" />
	<meta name="google"					content="nositelinkssearchbox" />
	<meta name="generator"				content="Visual Studio Code" />
	<title><?php echo $site_name ;?></title>
	<meta name="description"			content="<?php echo $site_descr;?>" />
	<meta name="keywords" 				content="<?php echo $site_keywords;?>">
	<meta property="og:title"			content="<?php echo $site_name;?>" />
	<meta property="og:description"		content="<?php echo $site_descr;?>" />
	<meta property="og:image"			content="img/fb.png" />
	<link rel="icon" type="image/png" href="img/favicon.png" />
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >		
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
	<script type="text/javascript"> var CPABUILDSETTINGS={'it':<?php echo $cpabuild_it ;?>,'key':'<?php echo $cpabuild_key ;?>'};</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $analytics_tracking ;?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo $analytics_tracking ;?>');
	</script>
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
<body class="bg-light" oncontextmenu="return false;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="index.php"><?php echo $site_name ;?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarColor02">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="privacy.php">Privacy Policy</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="terms.php">Terms & Conditions</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<!--
||||================================================||||
||||================================================||||
||||        	CSV Converter By Re-Skinning        ||||
||||================================================||||
||||================================================||||
-->