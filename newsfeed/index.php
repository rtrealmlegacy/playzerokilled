<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <meta property="og:title" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta property="og:description" content="">

  <link rel="icon" href="img/favi.png">

  <title>Zero Killed</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="bar dark left transparent full" >
  <div class="content">

    

		<?php

		$current_version = trim(file_get_contents("current_version.txt"));

		$requested_version = "0";
		if(isset($_GET['version'])){
			$requested_version = trim($_GET['version']);
		}

		if($requested_version == "0"){
			$requested_version = $current_version;
		}

		$should_load = true;

		if(!file_exists($requested_version . "/")){
			$should_load = false;
		}
 
		if($should_load){

			$is_current = $requested_version == $current_version;
			$issues_exist = file_exists($requested_version . "/issues.txt");

			$changes = fopen($requested_version . "/changelog.txt", "r");
			$changes_lines = array();

			if ($changes) {
				$i = 0;
				while (($line = fgets($changes)) !== false) {
					$line = trim($line);
					array_push($changes_lines, $line);
				}

				fclose($changes);
			} else {
			    die("error 1");
			} 

			echo '<h2>EARLY ACCESS '.$changes_lines[0].'</h2>';
				

			if($issues_exist){
				$issues = fopen($requested_version . "/issues.txt", "r");
				$issues_lines = array();

				if ($issues) {
				while (($line = fgets($issues)) !== false) {
					$line = trim($line);
					array_push($issues_lines, $line);
				}

				fclose($issues);
				} else {
				    die("error 2");
				} 


				echo '<br/><p class="sanstriangle"><b>Known issues:</b></p>';

				for ($i = 0; $i < count($issues_lines); $i++) {
				    echo '<p>'.$issues_lines[$i].'</p>';
				}
			}


			echo '<br/><p class="sanstriangle"><b>Changes:</b></p>';
			for ($i = 1; $i < count($changes_lines); $i++) {
			    echo '<p>'.$changes_lines[$i].'</p>' ;
			}
		}

		if(!$is_current) echo '<h2 class="sanstriangle" style="color:red;"><b>You are using an old version, please update now!</b></h2>';

		?>

  </div>
</div>

</body>
</html>