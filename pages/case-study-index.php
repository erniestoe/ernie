<section class="work">
	<inner-column>
 	<work-cards>
 		<?php foreach ($projects as $project) {?>
 			<work-card>
 				<a href="?page=case-study&slug=<?=$project['slug']?>">
 					<picture>
 						<img load="lazy" src="<?=$project['altHeaderImage'] != '' ? $project['altHeaderImage'] : $project['headerImage']?>">
 					</picture>
 				</a>

 				<h4 class="quiet-voice bold"><?=$project['projectName'] ?></h4>

 				<ul class="tags">
 					<?php foreach ($project['tags'] as $tag){ ?>
 						<li class="quiet-voice"><?=$tag?></li>
 					<?php } ?>
 				</ul>
 			</work-card>
 		<?php }?>
		</work-cards>
	</inner-column>
</section>