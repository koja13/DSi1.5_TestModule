
<div id='navigationDiv'>
	<nav> <?php echo anchor('user/logout', 'Logout', array('class'=>'focus') ); ?> </nav>
</div>

<!------------------------- mainDiv, centralni div u koji se ucitava tekst ------------------------->
<div id='mainQuizDiv'>

<?php

for ($i = 1; $i <=30; $i++)
{
	echo $questions[$i];
}

?>
    <br /><br /><br />
</div>