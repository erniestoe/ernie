<medley-layout-2>
	<inner-column>
		<header>
			<p class="teaser">Little teaser</p>
			<h2 class="attention-voice">Heading level 2</h2>
			<p>This is some body text. This is some body text. This is some body text.</p>
		</header>

		<cards>
		<?php for($i = 1; $i <= 4; $i++): ?>
			<card>
				<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#e0ece4" viewBox="0 0 256 256">
					<path d="M48,40V216a8,8,0,0,1-16,0V40a8,8,0,0,1,16,0Zm16,64V64A16,16,0,0,1,80,48h96a16,16,0,0,1,16,16v40a16,16,0,0,1-16,16H80A16,16,0,0,1,64,104Zm16,0h96V64H80Zm152,48v40a16,16,0,0,1-16,16H80a16,16,0,0,1-16-16V152a16,16,0,0,1,16-16H216A16,16,0,0,1,232,152Zm-16,40V152H80v40H216Z"></path>
				</svg>

				<h3 class="strong-voice">Heading level 3</h3>
				<p>This is some body text. This is some body text. This is some body text.</p>
			</card>
		<?php endfor; ?>
		</cards>

		<message>
			<div class="divider"></div>
			<p>This is some body text. This is some body text. This is some body text.</p>
		</message>
	</inner-column>
</medley-layout-2>