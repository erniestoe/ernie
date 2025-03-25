<work-list class="work">
	<h2 class="attention-voice">Work</h2>
			<ul>
				<?php 
				$works = include 'data/project-data.php';

				$count = 0;

				foreach($works as $work) {?>
					<?php 
					$count++;
					?>
					<li>
						<p class="number"><?=$count < 10 ? 0 . $count : $count ?></p>
						<a class="calm-voice" href="index.php?page=project&id=<?=$work['id'];?>"><?=$work["projectName"]?></a>
					</li>
				<?php }?>
			</ul>
</work-list>