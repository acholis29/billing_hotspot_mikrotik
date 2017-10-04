<div class="search-bar">
	<div class="search-icon">
		<i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <?php
		$path = strtolower(str_replace('/', '', $_SERVER['REQUEST_URI']));
		echo '<input type="hidden" name="t_catecari" value="'. $path .'" />'; 
	?>   
	<div class="close-search">
		<i class="material-icons">close</i>
    </div>
 </div>