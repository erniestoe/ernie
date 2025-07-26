<section class="home-content">
	<inner-column>
		<h2 class="intro strong-voice"><?= $pageData["tagline"]?></h2>

		<work-cards>
			<h3 class="attention-voice">Select Work</h3>

			<work-card>
				<a href="?page=case-study&id=1">
					<picture>
						<img load="lazy" src="https://res.cloudinary.com/dhgciqwbz/image/upload/v1753312243/openresource-header-alt_ubi0hs.png">
					</picture>
				</a>
				

				<h4 class="quiet-voice bold">OpenResource</h4>

				<ul class="tags">
					<li class="quiet-voice">Visual Identity</li>
					<li class="quiet-voice">UI/UX Design</li>
					<li class="quiet-voice">Branding</li>
					<li class="quiet-voice">WordPress Development</li>
				</ul>
			</work-card>

			<work-card>
				<a href="<?= ENV === 'production'? '/case-study/studio-ernie
				' : '?page=case-study&slug=studio-ernie'?>">
					<picture>
						<img load="lazy" src="https://res.cloudinary.com/dhgciqwbz/image/upload/v1753478430/studio-ernie-header-alt_byckos.png">
					</picture>
				</a>

				<h4 class="quiet-voice bold">Studio Ernie</h4>

				<ul class="tags">
					<li class="quiet-voice">Visual Identity</li>
					<li class="quiet-voice">UI/UX Design</li>
					<li class="quiet-voice">WordPress Development</li>
					<li class="quiet-voice">Sprint</li>
				</ul>
			</work-card>

			<work-card>
				<a href="<?= ENV === 'production'? '/case-study/layout-garden' : '?page=case-study&slug=layout-garden'?>">
					<picture>
						<img load="lazy" src="https://res.cloudinary.com/dhgciqwbz/image/upload/v1753312243/layout-garden-header-alt_h8g9rq.png">
					</picture>
				</a>

				<h4 class="quiet-voice bold">Layout Garden</h4>

				<ul class="tags">
					<li class="quiet-voice">Front-End Development</li>
					<li class="quiet-voice">UI/UX Design</li>
					<li class="quiet-voice">Component Library</li>
				</ul>
			</work-card>

		</work-cards>

		<div class="about">
			<h3 class="attention-voice">Ethos</h3>

			<svg class="morph" viewBox="0 0 200 200">
			  <path id="shape" d="M100,50 A50,50 0 1,0 100.01,50 Z"></path>
			</svg>


			<h4 class="loud-voice">Less noise, <br> more intention.</h4>

			<p class="strong-voice">My approach to design is deliberate and careful, thoughtful, yet effective. I could write a whole ten paragraphs full of buzzwords but just know that I care about what I do and <em>how</em> I do it</p>

		</div>
	</inner-column>
</section>

