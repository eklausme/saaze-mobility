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
		$href = isset($collection->data['uglyURL']) ? $entry->data['url'] . '.html' : $entry->data['url'];
		printf("\t<li><a href=\".%s\">%s</a></li>\n", $href, $entry->data['url']);
	}
}
?>
</ol>
</body>
</html>
