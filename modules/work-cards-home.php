<work-cards>
	<work-card>
		<a href="<?= ENV === 'production'? '/case-study/hac' : '?page=case-study&slug=hac'?>">
				<video				
				      muted
				      playsinline
				      loop
				      preload="metadata"
				      style="display:block;width:100%;height:auto;"
				      src="https://res.cloudinary.com/dhgciqwbz/video/upload/v1757558692/hac-2_gxzfxm.mov"
				      class="video"
				      poster="https://res.cloudinary.com/dhgciqwbz/image/upload/v1757536948/blue_yh0pyd.png"
				    ></video>
		</a>

		<div class="text">
			<a href="<?= ENV === 'production'? '/case-study/hac' : '?page=case-study&slug=hac'?>">
				<h4 class="quiet-voice bold">Branding for Clarity</h4>	
				<p class="quiet-voice">Hunger Action Coaltion</p>
			</a>
		
			<button class="video-control button quiet-voice opaque">PLAY</button>
		</div>
	</work-card>

	<work-card>
		<a href="<?= ENV === 'production'? '/case-study/compas' : '?page=case-study&slug=compas'?>">
				<video				
				      muted
				      playsinline
				      loop
				      preload="metadata"
				      style="display:block;width:100%;height:auto;"
				      src="https://res.cloudinary.com/dhgciqwbz/video/upload/v1757558673/crft-2_tg6wif.mp4"
				      class="video"
				      poster="https://res.cloudinary.com/dhgciqwbz/image/upload/v1757536864/yellow_uitjzv.png"
				    ></video>
		</a>

		<div class="text">
			<a href="<?= ENV === 'production'? '/case-study/compas' : '?page=case-study&slug=compas'?>">
				<h4 class="quiet-voice bold">Organizing Communications</h4>
				<p class="quiet-voice">Compañeras Campesinas</p>
			</a>

			<button class="video-control button quiet-voice opaque">PLAY</button>
		</div>
	</work-card>

</work-cards>