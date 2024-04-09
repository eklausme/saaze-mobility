<?php $url='/sitemap.html'; ?>
<?php require SAAZE_PATH . "/templates/head.php"; ?>
<title>Sitemap</title>
</head>
<body>
<h1>Sitemap</h1>
<ol>
<?php
foreach ($collections as $collection) {
	sort($collection->entries);
	foreach ($collection->entries as $entry) {
		$modurl = $entry->data['url'];
		$prturl = strlen($modurl) ? $modurl : "H O M E";
		// if data['url'] already has html suffix, then drop it; required for example for 404.html
		if (strlen($modurl) >= 6 && substr($modurl,-5) === '.html') $modurl = substr($modurl,0,-5);
		$href = isset($collection->data['uglyURL']) ? $modurl . '.html' : $modurl;
		printf("\t<li><a href=\".%s\">%s</a></li>\n", $href, $prturl);	//$entry->data['url']);
	}
}
?>
</ol>
</body>
</html>
