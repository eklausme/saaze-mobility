<?php
$title = "{$collection['title']} (Page {$pagination['currentPage']})";
require SAAZE_PATH . "/templates/top-layout.php";
?>

<main>
<div class=agrid-container>
<?php foreach ($pagination['entries'] as $entry) { ?>
	<article class=aindex>
	<h2><a href="<?= $rbase . $entry['url'] ?>"><?= $entry['title'] ?? 'Unknown title' ?></a></h2>
	<p class=dimmedColor><?= date('jS F Y', strtotime($entry['date'])) ?></p>
<?php if (isset($entry['heroimg'])) { ?>
	<div class=ixImgContainer><div class=ixImgBraceLeft>[</div><a href="<?=$rbase.$entry['url']?>"><img class=ixImgReducedOpacity width=360 src="<?=$rbase?>/img/<?=$entry['heroimg']?>" alt=HeroImg></a><div class=ixImgBraceRight>]</div></div>
<?php } ?>
	<p><?= $entry['excerpt'] ?? '---' ?></p>
	</article>
<?php } ?>
</div>
</main>
	<aside>
	<?php if ($pagination['nextUrl']) { ?>
	<a href="<?= $rbase . $pagination['nextUrl'] ?>">&larr; <?=$nextUrlTxt?></a> &nbsp; &nbsp; &nbsp;
	<?php } ?>
	<?php if ($pagination['prevUrl']) { ?>
	<a href="<?= $rbase . $pagination['prevUrl'] ?>"><?=$prevUrlTxt?> &rarr;</a>
	<?php } ?>
	</aside>
<p></p>
<?php require SAAZE_PATH . "/templates/bottom-layout.php"; ?>
