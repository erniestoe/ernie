
<mast-head>

	<nav class='site-menu'>
		<a class='logo' href='#'>
			<?= $data['headerLogo'];?>
			<!-- or you could actually use the SVG -->
		</a>

		<div class="links visually-hidden">
			<a href='#'>
				<span>Home</span>
			</a>

			<a href='#'>
				<span>Team</span>
			</a>

			<a href='#'>
				<span>Schedule</span>
			</a>

			<a href='#'>
				<span>News</span>
			</a>
		</div>
		
	</nav>


	<nav class='user-menu'>
		<a href='?team=<?=$otherTeam?>' class="button">
			<?= $otherTeamName;?>
		</a>

		<a href='#' class="button">
			<span>Sign-in</span>
		</a>
	</nav>

</mast-head>
