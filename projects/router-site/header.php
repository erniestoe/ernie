
<?php 

$pageData = getPageData($page);
?>

<header>
	<h1><?=$pageData['title']?></h1>

	<p><?=$pageData['intro']?></p>

	<nav>
		<ul>
			<li><a href="?page=home">Home</a></li>
			<li><a href="?page=list">List</a></li>
		</ul>
	</nav>
</header>