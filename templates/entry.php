<?php require SAAZE_PATH . "/templates/top-layout.php"; ?>

	<main>
	<article class=aentry>
<h1><?= $entry['title'] ?></h1>
<?php if (isset($entry['heroimg'])) printf("<p><img src=\"%s/img/%s\"></p>\n",$rbase,$entry['heroimg']); ?>
<?php
	/* old: <?= $entry['content'] ?> */
	eval( '?>' . str_replace('?%3E*','?>',str_replace('*%3C?','<?',$entry['content'])) );
?>
	</article>

<div class=imgcontainer><img style="border-radius:15em" alt="Charging car" src="<?=$rbase?>/img/charging-car_01-400x289.webp">
<div class=textimg>
<h2>We are e-mobility service provider!</h2>
We offer you the possibility to manage the charging of your electric vehicles.
</div>
</div>
	</main>

<p></p>

<?php require SAAZE_PATH . "/templates/bottom-layout.php"; ?>
