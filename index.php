<?php
	require_once(__DIR__ . "/header.php");

	$preview = new PreviewProvider($con, $userLoggedIn);

	echo $preview->createPreviewVideo(null);

	$containers = new CategoryContainers($con, $userLoggedIn);

	echo $containers->showAllCategories();

	require_once(__DIR__ . "/footer.php");
?>