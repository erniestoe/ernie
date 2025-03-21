<?php 
	include('data.php');

	$team = $_GET['team'] ?? 'iron';
	$data = $team === 'ember' ? $emberUnitedData : $ironCityData;

	$otherTeam = $team === 'ember' ? 'iron' : 'ember';
	$otherTeamName = $team === 'ember' ? "Iron City FC" : 'Ember United';
?>

<?php include('header.php'); ?>


<section class='welcome'>
<inner-column>

	<?php include('modules/graphic-diptych.php'); ?>

</inner-column>
</section>



<section class='get-involved'>
<inner-column>

	<?php include('modules/call-to-action.php'); ?>

</inner-column>
</section>



<section class='stuff'>
<inner-column>
	
	<?php include('modules/articles-intro.php'); ?>

</inner-column>
</section>



<section class='help-us'>
<inner-column>

	<?php include('modules/call-to-action.php'); ?>

</inner-column>
</section>



<?php include('footer.php'); ?>
