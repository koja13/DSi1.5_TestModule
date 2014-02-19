
<div id='navigationDiv'>
	<nav> <?php echo anchor('UserController/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
</div>

<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainQuizDiv'>

<?php

	// citanje odgovora na pitanja iz promenjive, poslate od servera ka klijentu i njihovo stampanje (prikaz)
	for ($i = 1; $i <=30; $i++)
	{
		echo $questions[$i];
	}

?>
    <br /><br /><br />
</div>