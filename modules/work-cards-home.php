<work-cards>
	<h3 class="attention-voice">Select Work</h3>

	<work-card >
		<a href="<?= ENV === 'production'? '/case-study/openresource
		' : '?page=case-study&slug=openresource'?>">
			<video
				      muted
				      playsinline
				      loop
				      preload="metadata"
				      style="display:block;width:100%;height:auto;"
				      src="https://res.cloudinary.com/dhgciqwbz/video/upload/v1755008446/openresource_coizx2.mp4"
				      class="video"
				    ></video>
		</a>

		<div class="text">
			<h4 class="quiet-voice bold">OpenResource</h4>

			<button class="video-control">PLAY</button>
		</div>
	</work-card>

	<work-card>
		<a href="<?= ENV === 'production'? '/case-study/studio-ernie
		' : '?page=case-study&slug=studio-ernie'?>">
			<video
				      muted
				      playsinline
				      loop
				      preload="metadata"
				      style="display:block;width:100%;height:auto;"
				      src="https://res.cloudinary.com/dhgciqwbz/video/upload/v1755007792/CleanShot_2025-08-12_at_10.09.17_qt0knf.mov"
				      class="video"
				    ></video>
		</a>

		<div class="text">
			<h4 class="quiet-voice bold">Studio Ernie</h4>

			<button class="video-control">PLAY</button>
		</div>
	</work-card>

	<work-card>
		<a href="<?= ENV === 'production'? '/case-study/crft' : '?page=case-study&slug=crft'?>">
				<video				
				      muted
				      playsinline
				      loop
				      preload="metadata"
				      style="display:block;width:100%;height:auto;"
				      src="https://res.cloudinary.com/dhgciqwbz/video/upload/v1754955155/crft_k4uz7s.mp4"
				      class="video"
				    ></video>
		</a>

		<div class="text">
			<h4 class="quiet-voice bold">CRFT</h4>

			<button class="video-control">PLAY</button>
		</div>
	</work-card>

</work-cards>