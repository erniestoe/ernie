<site-map>
				<?php 
				function renderPageLinks() {
					$pages = ["LOGO", "Some page", "Some other page"];
					?> 
					<ul class="pages">
						<?php foreach($pages as $page) {?>
							<li><a href="#"><?=$page?></a></li>
						<?php }?>
					</ul>
					<?php
				}

				function renderLegalLinks() {
					$legal = ["Legal thing a", "Legal thing b"];
					?> 
					<ul class="legal">
						<?php foreach($legal as $legalLink) {?>
							<li><a href="#"><?=$legalLink?></a></li>
						<?php }?>
					</ul>
					<?php
				}

				function renderSocialLinks() {
					$social = ["social thing a", "social thing b", "social thing c", "social thing d"];
					?> 
					<ul class="social">
						<?php foreach($social as $socialLink) {?>
							<li><a href="#"><?=$socialLink?></a></li>
						<?php }?>
					</ul>
					<?php
				}
				?>
				<?=renderPageLinks()?>

				<div class="sign-in">
					<a href="#">Sign-in</a>
				</div>

				<?=renderLegalLinks()?>
				
				<?=renderSocialLinks()?>
</site-map>