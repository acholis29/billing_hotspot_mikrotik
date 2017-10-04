<?php
/*
	session_start();

	
	if ($_SESSION['timeout'] + 10 * 60 < time()) {
	 header("Location: /account/login.php");
	} else {
		 // session ok
		 if( empty($_SESSION["id"])){
			header("Location: /account/login.php");
		};
	}
*/	
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Billing hotspot </title>
    <!-- Favicon-->
    <link rel="icon" href="../images/siakad.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue">
    <?php 
		
		
		$pathsite = strtolower($_SERVER['REQUEST_URI']);		
		$path = strtolower(str_replace('/', '', $pathsite));
		$splitpath = split("/",$pathsite);
		$path1 = $splitpath[1]!='' ? '../' : ''; 
		$path2 = $splitpath[2]!='' ? '../' : ''; 
		$pathall = $path1.$path2;
		
		require_once $pathall.'module/jsmodule.php'; 
		require_once $pathall.'config/general_config.php'; 				
		//----------- Page Loader 
		require_once $pathall.'module/loader.php'; 		
		echo '<div class="overlay"></div>';
		
		//----------- Search Bar 
		require_once $pathall.'module/cari.php';
		require_once $pathall.'module/menuatas.php';
		require_once $pathall.'module/menukiri.php'; 
		
		//----------- page content
		
		//require_once $path1.'/dashboard/dashadmin.php'; 
		
		
		$valpath2 = $splitpath[1]!='' ? $path : 'home';
		switch ($valpath2) {
			case 'home':
				require_once $valpath2.'/dashboard/dashadmin.php'; 
				break;				
		};

		if($splitpath[2] !=''){
			require_once $path1.'/'.strtolower($splitpath[2]).'/page.php'; 
		};
		/*
		switch ($splitpath[2]) {
			case 'siswa':
				require_once $path1.'/'.$splitpath[2].'/page.php'; 
				break;
			case 'guru':
				require_once $path1.'/'.$splitpath[2].'/page.php'; ;
				break;
		};
		*/
		//----------- all js
		
	?>
    


    <!-- Custom Js -->
</body>

</html>
