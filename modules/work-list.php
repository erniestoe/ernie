<work-list class="work">
	<h2 class="attention-voice">Work</h2>
			<ul>
				<?php 
				$works = [
					[
						"title" => "Drama Club",
						"link" => "projects/drama-club/index.html"
					],
					[
						"title" => "Resource List",
						"link" => "projects/resource-list/index.php"
					],
					[
						"title" => "audiophile",
						"link" => "projects/audiophile/index.php"
					],
					[
						"title" => "Theme Challenge",
						"link" => "index.php?page=project"
					],
				];

				$count = 0;

				foreach($works as $work) {?>
					<?php 
					$count++;
					?>
					<li>
						<p class="number"><?=$count < 10 ? 0 . $count : $count ?></p>
						<a class="calm-voice" href="<?=$work["link"]?>"><?=$work["title"]?></a>
					</li>
				<?php }?>
			</ul>
</work-list>