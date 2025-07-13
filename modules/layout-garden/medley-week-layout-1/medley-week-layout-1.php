<?php 
$cards = [
	"heading" => "Heading level 3",
	"text" => "This is some body text. This is some body text. This is some body text."
];	

?>

<medley-layout-1 class="garden-module">
	<inner-column>
		<grid>
			<header>
				<h2 class="attention-voice">Heading level 2</h2>

				<p>This is some body text. This is some body text. This is some body text.</p>
			</header>

			<grid-cards>
				<?php for($i = 1; $i <= 6; $i++) { ?>
				<grid-card>
					<h3 class="strong-voice"><?=$cards["heading"]?></h3>

					<p><?=$cards["text"]?></p>
				</grid-card>
			<?php } ?>
			</grid-cards>
			
			<grid-pictures>
				<?php for($i = 1; $i <= 4; $i++) { ?>
				<picture>
					<img src="https://peprojects.dev/images/square.jpg">
				</picture>
				<?php } ?>
			</grid-pictures>
			
		</grid>
	</inner-column>
</medley-layout-1>