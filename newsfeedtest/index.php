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

		$handle = fopen("changelog.txt", "r");
		if ($handle) {
			$i = 0;
			while (($line = fgets($handle)) !== false) {
				$line = trim($line);
				if($i==0){
					echo '<h2>BETA STAGE '.$line.'</h2>';
					echo '<p class="sanstriangle" style="color:red;"><b>Please quit the game and download the new version if you haven\'t already.</b></p>';
    
				}else if($i==1){
					echo '<p class="sanstriangle"><b>Changelog v'.$line.':</b></p>';
				}else{
			    	echo "<p>".$line."</p>";
				}
			    $i++;
			}

			fclose($handle);
		} else {
		    // error opening the file.
		} 

		?>

  </div>
</div>

</body>
</html>