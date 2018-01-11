<?php session_start(); ?>
<!DOCTYPE html>
<!--
Copyright (c) 2007-2017, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>CKFinder 3 - File Browser</title>
</head>
<body>

<script src="ckfinder.js"></script>
<script>
	<?php 
		if(!isset($_SESSION['arUser'])){
       echo "document.write('bạn chưa đăng nhập');";
    }else{ ?> 			
    	CKFinder.start();
    <?php
    }
	 ?>
	
</script>

</body>
</html>

