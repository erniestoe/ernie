<?php 

$projectData = include 'data/project-data.php';

function renderProjectList() {
	global $projectData;

	$count = 0;

	foreach($projectData as $project) {
		$count++;?>
		<li>
			<p class="number"><?=$count < 10 ? 0 . $count : $count ?></p>

			<a class="calm-voice" href="index.php?page=project&id=<?=$project['id'];?>"><?=$project["projectName"]?></a>
		</li>
	<?php }
}

function renderProject() {
	global $projectData;

	if (!isset($_GET['id'])) {
		echo "<p>Project not found.</p>";
		return;
	}

	$projectID = $_GET['id'];
	$selectedProject = null;

	foreach ($projectData as $project) {
		if ($project["id"] == $projectID) {
			$selectedProject = $project;
			break;
		}
	}

	if (!$selectedProject) {
		echo "<p>Project not found.</p>";
		return;
	} ?>
	<project>
		<picture>
       		
    	</picture>

    	<div class="project-text">
    		<h1 class="loud-voice"><?=$selectedProject["projectName"];?></h1>
  			<p class="project-description"><?=$selectedProject["projectText"];?></p>
    	</div>

    

    	<div class="project-links">
    		<ul>
    			<?php foreach($selectedProject["links"] as $link) {?>
    				<li>
    					<p><?=$link;?></p>
    				</li>
    			<?php } ?>
    		</ul>
    	</div>
    	

    	
	</project>
	<?php 
}