<?php require SAAZE_PATH . "/templates/head.php"; ?>
<title><?= $title ?? "Saaze" ?></title>

<style>
:root { --bg-color:white; color:black; --h1Color:DarkBlue; --thColor:LightBlue; --nthChild:LightGray; }
.dark-mode { background-color:black; color:white; --h1Color:LightBlue; --thColor:DarkBlue; --nthChild:Orange; }
body { background-color: var(--bg-color); font-family:Arial, Helvetica, Verdana, sans-serif }

/* Taken from "How To - Hoverable Dropdown", see https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_dropdown_hover */
.dropbtn {
	background-color: #04AA6D;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
}
.dropdown {
	position: relative;
	display: inline-block;
}
.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}
.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}
.dropdown-content a:hover {background-color: #ddd;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}


/* Scroll to top button ("chevronButton"), see https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_scroll_to_top
   Icon is from https://icons.getbootstrap.com/icons/chevron-up/
*/
#toTopBtn {
	display:none;
	position:fixed;
	bottom:20px;
	right:30px;
	z-index:99;
	font-size:18px;
	border:none;
	outline:none;
	background-color:DarkGray;
	color:white;
	cursor:pointer;
	padding: 15px;
	border-radius:6px;
}
#toTopBtn:hover { background-color: #555 }

blockquote { font-style:italic; padding-left:0.4rem; border-left:7px solid lightBlue; background-color:lightGray; }
footer { background:#04AA6D; color:white }
.bordered { border-style:groove; box-shadow:10px 5px 5px gray; padding:10px 25px 20px }

/* Three column output in footer from Chris Coyier, see https://codepen.io/chriscoyier/pen/vWEMWw */
.flex-container { display:flex; justify-content:space-evenly; flex-wrap:wrap; flex-direction:row; gap:4rem }
.flex-container p { font-size:1rem; margin-top:0; margin-bottom:0 }

/* Three column output for index-list */
/* Center everything, see https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_center_website */
.allcontent { max-width:66rem; margin:auto; padding:1rem }
img { border-radius:8px }
@media screen and (max-width:300px) {	/* very small screens, e.g., Pixel 5 => scale down images */
	img { max-width:100%; height:auto; width:200px }
}
.imgicon { width:32px; height:32px }
@media screen and (max-width:80rem) {	/* single column output */
	.aentry { margin-left:0rem; margin-right:0rem }
	.aindex { margin-left:3rem; margin-right:3rem }
	.agrid-container {
		display:grid;
		justify-content:center;
		grid-template-columns:auto;
		grid-template-areas: 'article';
		/*background-color:BurlyWood; padding:10rem;*/
	}
}
@media screen and (min-width:80rem) and (max-width:99rem) {	/* 2 column output */
	.aentry { margin-left:0rem; width:66rem }
	.aindex { margin-left:0rem; width:28rem }
	.allcontent { max-width:66rem; margin:auto; padding:0rem }
	/*img { width:auto; height:auto }*/
	.agrid-container {
		display:grid;
		justify-content:center;
		column-gap:2rem;
		grid-template-columns: auto auto;
		grid-template-areas: 'article article';
		/*background-color:BurlyWood; padding:0.8rem;*/
	}
	/* https://www.w3docs.com/snippets/css/how-to-vertically-align-text-next-to-an-image.html */
	.imgcontainer { display:flex; align-items:center }
	.textimg { padding-left:2.5rem }
}
@media screen and (min-width:99rem) {	/* 3 column output */
	.aentry { margin-left:0rem; width:85rem }
	.aindex { margin-left:0rem; width:23rem }
	.allcontent { max-width:85rem; margin:auto; padding:0rem }
	/*img { width:auto; height:auto; }*/
	.agrid-container {
		display:grid;
		justify-content:center;
		column-gap:2rem;
		grid-template-columns: auto auto auto;
		grid-template-areas: 'article article article';
		/*background-color:BurlyWood; padding:0.8rem;*/
	}
	/* https://www.w3docs.com/snippets/css/how-to-vertically-align-text-next-to-an-image.html */
	.imgcontainer { display:flex; align-items:center }
	.textimg { padding-left:2.5rem }
}


h1 { font-size:3em; color:var(--h1Color) }
h2 { font-size:2.7em; color:var(--h1Color) }
h3 { font-size:2em; color:var(--h1Color) }
ul, ol { line-height:1.5; font-size:1.3rem }
p { line-height:1.7; font-size:1.3rem }
code { font-size:1.4em }

/* From Chris Coyier: https://codepen.io/chriscoyier/pen/wvKeQOp */
ol { list-style:none; counter-reset:steps }
ol li { counter-increment:steps }
ol li::before {
	content: counter(steps);
	/*margin-top: 1rem;*/
	margin-right: 0.5rem;
	margin-left: -2rem;
	background: #ff6f00;
	color: white;
	width: 1.2em;
	height: 1.2em;
	border-radius: 50%;
	display: inline-grid;
	place-items: center;
	line-height: 1.2em;
}
ol ol li::before { background: darkorchid }
li > p:first-child { margin-top: -1.5em }


/* Copied from W.S.Toh: https://code-boxx.com/simple-responsive-pure-css-hamburger-menu */
#hamnav {	/* [ON BIG SCREENS] (A) WRAPPER */
	/*width: 50rem; background: Lightgray;*/
	/* Optional */
	position:sticky; top:0;
}

#hamitems { display:flex; }	/* (B) HORIZONTAL MENU ITEMS */
#hamitems a {
	flex-grow:2;
	/*flex-basis:0;*/
	padding:12px;
	/*color:white;*/
	text-decoration:none;
	margin-left:1rem;
	text-align:left;
	/*font-size:1.6rem;*/
}
#hamitems a:hover { background:Sandybrown }

#hamnav label, #hamburger { display:none; }	/* (C) HIDE HAMBURGER */

@media screen and (max-width: 49rem){	/* [ON SMALL SCREENS] */
	#hamitems a {	/* (A) BREAK INTO VERTICAL MENU */
		/*box-sizing:border-box; width: 100%;*/
		display: block;
		border-top: 1px solid #333;
	}
	#hamnav label {	/* (B) SHOW HAMBURGER ICON */
		display:inline-block;
		color:white;
		background:DarkGreen;
		font-style:normal;
		font-size:1.2em;
		padding:10px;
	}
	#hamitems { display:none; }	/* (C) TOGGLE SHOW/HIDE MENU */
	#hamnav input:checked ~ #hamitems { display:block; }
}

.dimmedColor { color:Gray }
.ixImgContainer { position:relative; color:gray }
.ixImgReducedOpacity { opacity:0.4 }
.ixImgReducedOpacity:hover { opacity:1 }
.ixImgBraceLeft, .ixImgBraceRight { position:absolute; top:25%; margin-top:-60px; width:auto; padding:20px; font-weight:bold; font-size:150px }
.ixImgBraceRight { right:0 }

</style>
</head>

<body><div class=allcontent>
<button onclick="topFunction()" id="toTopBtn" title="Go to top"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/></svg></button>
	<header>
		<div class=imgcontainer><a href="<?=$rbase?>/"><img alt="Open E-Mobility" src="<?=$rbase?>/img/OEM_degrade_name-200x150.png"></a><div class=textimg>
		<nav id=hamnav><label for=hamburger>&#9776;</label><input type=checkbox id=hamburger><div id=hamitems>
<?php if (!isset($entry['lang'])) $entry['lang'] = 'en';
if (!isset($entry['en'])) $entry['en'] = '';
if (!isset($entry['de'])) $entry['de'] = 'de/de-home';
if (!isset($entry['fr'])) $entry['fr'] = 'fr/accueil';
if ($entry['lang'] == 'en') { ?>
		<div class="dropdown"><button class="dropbtn">Home</button><div class="dropdown-content">
			<a href="<?=$rbase?>/">Home</a>
			<a href="<?=$rbase?>/about">About us</a>
			<a href="<?=$rbase?>/sitemap.html">Sitemap</a>
			<a href="<?=$rbase?>/feed.xml"><img class=imgicon src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAD50lEQVR42u2XW2wUZRTH/zOzs5dpC2yFhFJoKSVqagWBQkIoWEIMEiOmJpAIaqKiD5SEy4skEHiAhAcuIn2BAFICSEwwgoXIg4m1xEZRrEptaW1ppaXlfmu7c9v9hjOU7uzHDEuhTfvCedrvzPm++c25/GdW6PxhDhPIMARmkQldp1+3huLmvfYcwAUQmLwFYjgPMO/B0m+AdbeBdf6H2O3zYF3NGOhucQEEp+2ENPI1z2AWuYLolQpE207BUlsHH6DXqHkRu1YFo/ErWF1Ngw/ggDBEW0/CaNgDxLoHBsCX/R7EtAkQ/CMgKmMgKBlUdzHpIUy9Cv3vTWB3a/oP4DIpBVJ4EqRRs+DLKIIgp3png5kwancherl8gAESTQzCl7kA8oSl9HOkZ4jRcADGxTL0VVyfTQcIRM79CHLOIs/y2BBm88FnA/Dnr4eYmk0acJPmvgWM5j926w8qtO7mCE8h3dgAMRDm/PaUGDXbEG0/9fQAXlNgRVU67Ed6qqOwtHb+gOBo2rOVoMfxe6gntN9Wgt2r7T9A4qFm8zcwmyi9lulckMMIzSgliLFcPIt0QK36hEY0MjAAvRa7Uw/9r/VUpusJmchAaOZuGt/hXKzZ8h2M+i/7DiDnLoOUPhliShaEwPDHbmTqdWi/ryZJbov7xPQCBAu2chNgsRhlYRms7ua+AcQ3kldMy4VvzHzIY9+i+U/xgLhGdS7hMuF/aSXk8cVcXLTjZ+j/bHw6AM58w+jgEgKZ71GOC9DOrrA7tcdBwhWafZibDFuy1cr3XQ3cd4Bejsy34c9bBUGUOL/ReIgac78Tl70YgZeX8zFNh2E27usfQA/EQgTy13A+ezrUMx/SE3b0OEQFStExKpvilKu7HZEzS1zfE94AYoC0v/BBR7M7/9IHST132f/KWirHm5zPvFQOo2570phIJUGql54A4E9HaPpOmumsh/WzKHVlMC8mSKsvDcrsrwkwzclCVEPkp2K7Mx+s7QcITt3MHa3b6nj5ZHIAf/46yJlv8CkmCO3X5aRqdXGfPPFT+HOXcnFa9Qb6UKnsWUipUOaVcyNp/n8CxoUvkgOE5hyDGHK/6YyGvaSCR5yNKeOhFJbxZWj5lkSn1Dmr8CjpSUZ8HbvxJ7RzfP+4lXDmAUjDclwAes0OSt/3CVkBlLnHqV1GJNygmm6wOr4OTN0G36iC+Jp1tUL95YPkAF5dbqueWvUxKUon5w9OLyXVfPWxN3i0nEy/C7XineQAdr3lrHfpXU8jQ2LCbp2HXrudk9x4H7xYAumFKc5e7Sb06s+d6yTrvtFFznUzQqL1WXKAwbbnAMIQ/z3HfQ7n42k1VPCfAAAAAElFTkSuQmCC" height=32 width=32 alt="RSS Feed"></a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Features</button><div class="dropdown-content">
			<a href="<?=$rbase?>/monitoring">Monitoring</a>
			<a href="<?=$rbase?>/smart-charging">Smart charging</a>
			<a href="<?=$rbase?>/assets-connection">Assets connection</a>
			<a href="<?=$rbase?>/integration">Integration</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Services</button><div class="dropdown-content">
			<a href="<?=$rbase?>/training">Training</a>
			<a href="<?=$rbase?>/co-innovation-and-research">Co-Innovation &amp; research</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Blog &amp; stories</button><div class="dropdown-content">
			<a href="<?=$rbase?>/blog">Blog</a>
			<a href="<?=$rbase?>/case-studies">Case studies</a>
			<a href="<?=$rbase?>/faq">FAQ</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Language</button><div class="dropdown-content">
			<a href="<?=$rbase.'/'.$entry['en']?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="17" viewBox="0 0 7410 3900"><rect width="7410" height="3900" fill="#b22234"/><path d="M0,450H7410m0,600H0m0,600H7410m0,600H0m0,600H7410m0,600H0" stroke="#fff" stroke-width="300"/><rect width="2964" height="2100" fill="#3c3b6e"/><g fill="#fff"><g id="s18"><g id="s9"><g id="s5"><g id="s4"><path id="s" d="M247,90 317.534230,307.082039 132.873218,172.917961H361.126782L176.465770,307.082039z"/><use xlink:href="#s" y="420"/><use xlink:href="#s" y="840"/><use xlink:href="#s" y="1260"/></g><use xlink:href="#s" y="1680"/></g><use xlink:href="#s4" x="247" y="210"/></g><use xlink:href="#s9" x="494"/></g><use xlink:href="#s18" x="988"/><use xlink:href="#s9" x="1976"/><use xlink:href="#s5" x="2470"/></g></svg> EN</a>
			<a href="<?=$rbase.'/'.$entry['de']?>"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="18" viewBox="0 0 5 3"><desc>Flag of Germany</desc><rect id="black_stripe" width="5" height="3" y="0" x="0" fill="#000"/><rect id="red_stripe" width="5" height="2" y="1" x="0" fill="#D00"/><rect id="gold_stripe" width="5" height="1" y="2" x="0" fill="#FFCE00"/></svg> DE</a>
			<a href="<?=$rbase.'/'.$entry['fr']?>"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="18"><desc>Flag of France</desc><path fill="#CE1126" d="M0 0h27v18H0"/><path fill="#fff" d="M0 0h18v18H0"/><path fill="#002654" d="M0 0h9v18H0"/></svg> FR</a>
		</div></div>
<?php } else if ($entry['lang'] == 'de') { ?>
		<div class="dropdown"><button class="dropbtn">Home</button><div class="dropdown-content">
			<a href="<?=$rbase?>/">Hauptseite</a>
			<a href="<?=$rbase?>/de/uber-uns">Über uns</a>
			<a href="<?=$rbase?>/sitemap.html">Sitemap</a>
			<a href="<?=$rbase?>/feed.xml"><img class=imgicon src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAD50lEQVR42u2XW2wUZRTH/zOzs5dpC2yFhFJoKSVqagWBQkIoWEIMEiOmJpAIaqKiD5SEy4skEHiAhAcuIn2BAFICSEwwgoXIg4m1xEZRrEptaW1ppaXlfmu7c9v9hjOU7uzHDEuhTfvCedrvzPm++c25/GdW6PxhDhPIMARmkQldp1+3huLmvfYcwAUQmLwFYjgPMO/B0m+AdbeBdf6H2O3zYF3NGOhucQEEp+2ENPI1z2AWuYLolQpE207BUlsHH6DXqHkRu1YFo/ErWF1Ngw/ggDBEW0/CaNgDxLoHBsCX/R7EtAkQ/CMgKmMgKBlUdzHpIUy9Cv3vTWB3a/oP4DIpBVJ4EqRRs+DLKIIgp3png5kwancherl8gAESTQzCl7kA8oSl9HOkZ4jRcADGxTL0VVyfTQcIRM79CHLOIs/y2BBm88FnA/Dnr4eYmk0acJPmvgWM5j926w8qtO7mCE8h3dgAMRDm/PaUGDXbEG0/9fQAXlNgRVU67Ed6qqOwtHb+gOBo2rOVoMfxe6gntN9Wgt2r7T9A4qFm8zcwmyi9lulckMMIzSgliLFcPIt0QK36hEY0MjAAvRa7Uw/9r/VUpusJmchAaOZuGt/hXKzZ8h2M+i/7DiDnLoOUPhliShaEwPDHbmTqdWi/ryZJbov7xPQCBAu2chNgsRhlYRms7ua+AcQ3kldMy4VvzHzIY9+i+U/xgLhGdS7hMuF/aSXk8cVcXLTjZ+j/bHw6AM58w+jgEgKZ71GOC9DOrrA7tcdBwhWafZibDFuy1cr3XQ3cd4Bejsy34c9bBUGUOL/ReIgac78Tl70YgZeX8zFNh2E27usfQA/EQgTy13A+ezrUMx/SE3b0OEQFStExKpvilKu7HZEzS1zfE94AYoC0v/BBR7M7/9IHST132f/KWirHm5zPvFQOo2570phIJUGql54A4E9HaPpOmumsh/WzKHVlMC8mSKsvDcrsrwkwzclCVEPkp2K7Mx+s7QcITt3MHa3b6nj5ZHIAf/46yJlv8CkmCO3X5aRqdXGfPPFT+HOXcnFa9Qb6UKnsWUipUOaVcyNp/n8CxoUvkgOE5hyDGHK/6YyGvaSCR5yNKeOhFJbxZWj5lkSn1Dmr8CjpSUZ8HbvxJ7RzfP+4lXDmAUjDclwAes0OSt/3CVkBlLnHqV1GJNygmm6wOr4OTN0G36iC+Jp1tUL95YPkAF5dbqueWvUxKUon5w9OLyXVfPWxN3i0nEy/C7XineQAdr3lrHfpXU8jQ2LCbp2HXrudk9x4H7xYAumFKc5e7Sb06s+d6yTrvtFFznUzQqL1WXKAwbbnAMIQ/z3HfQ7n42k1VPCfAAAAAElFTkSuQmCC" height=32 width=32 alt="RSS Feed"></a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Funktionalitäten</button><div class="dropdown-content">
			<a href="<?=$rbase?>/de/kontrollfunktion">Monitoring</a>
			<a href="<?=$rbase?>/de/smart-charging-funktion">Smart charging</a>
			<a href="<?=$rbase?>/de/anlagenverbindung">Anlagenverbindung</a>
			<a href="<?=$rbase?>/de/integration">Integration</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Angebote</button><div class="dropdown-content">
			<a href="<?=$rbase?>/de/training">Training</a>
			<a href="<?=$rbase?>/de/co-innovation-and-research">Co-Innovation &amp; Forschung</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Blog &amp; Erfolgsgeschichten</button><div class="dropdown-content">
			<a href="<?=$rbase?>/de/blog-aktualitat">Blog</a>
			<a href="<?=$rbase?>/case-studies">Beispielanwendungen</a>
			<a href="<?=$rbase?>/de/fragen">FAQ</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Sprache</button><div class="dropdown-content">
			<a href="<?=$rbase.'/'.$entry['en']?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="17" viewBox="0 0 7410 3900"><rect width="7410" height="3900" fill="#b22234"/><path d="M0,450H7410m0,600H0m0,600H7410m0,600H0m0,600H7410m0,600H0" stroke="#fff" stroke-width="300"/><rect width="2964" height="2100" fill="#3c3b6e"/><g fill="#fff"><g id="s18"><g id="s9"><g id="s5"><g id="s4"><path id="s" d="M247,90 317.534230,307.082039 132.873218,172.917961H361.126782L176.465770,307.082039z"/><use xlink:href="#s" y="420"/><use xlink:href="#s" y="840"/><use xlink:href="#s" y="1260"/></g><use xlink:href="#s" y="1680"/></g><use xlink:href="#s4" x="247" y="210"/></g><use xlink:href="#s9" x="494"/></g><use xlink:href="#s18" x="988"/><use xlink:href="#s9" x="1976"/><use xlink:href="#s5" x="2470"/></g></svg> EN</a>
			<a href="<?=$rbase.'/'.$entry['de']?>"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="18" viewBox="0 0 5 3"><desc>Flag of Germany</desc><rect id="black_stripe" width="5" height="3" y="0" x="0" fill="#000"/><rect id="red_stripe" width="5" height="2" y="1" x="0" fill="#D00"/><rect id="gold_stripe" width="5" height="1" y="2" x="0" fill="#FFCE00"/></svg> DE</a>
			<a href="<?=$rbase.'/'.$entry['fr']?>"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="18"><desc>Flag of France</desc><path fill="#CE1126" d="M0 0h27v18H0"/><path fill="#fff" d="M0 0h18v18H0"/><path fill="#002654" d="M0 0h9v18H0"/></svg> FR</a>
		</div></div>
<?php } else if ($entry['lang'] == 'fr') { ?>
		<div class="dropdown"><button class="dropbtn">Home</button><div class="dropdown-content">
			<a href="<?=$rbase?>/">Accueil</a>
			<a href="<?=$rbase?>/about">À propos</a>
			<a href="<?=$rbase?>/sitemap.html">Sitemap</a>
			<a href="<?=$rbase?>/feed.xml"><img class=imgicon src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAD50lEQVR42u2XW2wUZRTH/zOzs5dpC2yFhFJoKSVqagWBQkIoWEIMEiOmJpAIaqKiD5SEy4skEHiAhAcuIn2BAFICSEwwgoXIg4m1xEZRrEptaW1ppaXlfmu7c9v9hjOU7uzHDEuhTfvCedrvzPm++c25/GdW6PxhDhPIMARmkQldp1+3huLmvfYcwAUQmLwFYjgPMO/B0m+AdbeBdf6H2O3zYF3NGOhucQEEp+2ENPI1z2AWuYLolQpE207BUlsHH6DXqHkRu1YFo/ErWF1Ngw/ggDBEW0/CaNgDxLoHBsCX/R7EtAkQ/CMgKmMgKBlUdzHpIUy9Cv3vTWB3a/oP4DIpBVJ4EqRRs+DLKIIgp3png5kwancherl8gAESTQzCl7kA8oSl9HOkZ4jRcADGxTL0VVyfTQcIRM79CHLOIs/y2BBm88FnA/Dnr4eYmk0acJPmvgWM5j926w8qtO7mCE8h3dgAMRDm/PaUGDXbEG0/9fQAXlNgRVU67Ed6qqOwtHb+gOBo2rOVoMfxe6gntN9Wgt2r7T9A4qFm8zcwmyi9lulckMMIzSgliLFcPIt0QK36hEY0MjAAvRa7Uw/9r/VUpusJmchAaOZuGt/hXKzZ8h2M+i/7DiDnLoOUPhliShaEwPDHbmTqdWi/ryZJbov7xPQCBAu2chNgsRhlYRms7ua+AcQ3kldMy4VvzHzIY9+i+U/xgLhGdS7hMuF/aSXk8cVcXLTjZ+j/bHw6AM58w+jgEgKZ71GOC9DOrrA7tcdBwhWafZibDFuy1cr3XQ3cd4Bejsy34c9bBUGUOL/ReIgac78Tl70YgZeX8zFNh2E27usfQA/EQgTy13A+ezrUMx/SE3b0OEQFStExKpvilKu7HZEzS1zfE94AYoC0v/BBR7M7/9IHST132f/KWirHm5zPvFQOo2570phIJUGql54A4E9HaPpOmumsh/WzKHVlMC8mSKsvDcrsrwkwzclCVEPkp2K7Mx+s7QcITt3MHa3b6nj5ZHIAf/46yJlv8CkmCO3X5aRqdXGfPPFT+HOXcnFa9Qb6UKnsWUipUOaVcyNp/n8CxoUvkgOE5hyDGHK/6YyGvaSCR5yNKeOhFJbxZWj5lkSn1Dmr8CjpSUZ8HbvxJ7RzfP+4lXDmAUjDclwAes0OSt/3CVkBlLnHqV1GJNygmm6wOr4OTN0G36iC+Jp1tUL95YPkAF5dbqueWvUxKUon5w9OLyXVfPWxN3i0nEy/C7XineQAdr3lrHfpXU8jQ2LCbp2HXrudk9x4H7xYAumFKc5e7Sb06s+d6yTrvtFFznUzQqL1WXKAwbbnAMIQ/z3HfQ7n42k1VPCfAAAAAElFTkSuQmCC" height=32 width=32 alt="RSS Feed"></a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Fonctionnalités</button><div class="dropdown-content">
			<a href="<?=$rbase?>/fr/supervision">Supervision</a>
			<a href="<?=$rbase?>/fr/charge-intelligente">Charge intelligente</a>
			<a href="<?=$rbase?>/fr/connexions-des-ressources">Connexion des ressources</a>
			<a href="<?=$rbase?>/fr/integration-fr">Integration</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Services</button><div class="dropdown-content">
			<a href="<?=$rbase?>/training">Training</a>
			<a href="<?=$rbase?>/co-innovation-and-research">Co-Innovation &amp; Research</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Ressources</button><div class="dropdown-content">
			<a href="<?=$rbase?>/blog">Blog</a>
			<a href="<?=$rbase?>/fr/nos-realisations">Nos réalisations</a>
			<a href="<?=$rbase?>/fr/faq-fr">FAQ</a>
		</div></div>
		<div class="dropdown"><button class="dropbtn">Language</button><div class="dropdown-content">
			<a href="<?=$rbase.'/'.$entry['en']?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="17" viewBox="0 0 7410 3900"><rect width="7410" height="3900" fill="#b22234"/><path d="M0,450H7410m0,600H0m0,600H7410m0,600H0m0,600H7410m0,600H0" stroke="#fff" stroke-width="300"/><rect width="2964" height="2100" fill="#3c3b6e"/><g fill="#fff"><g id="s18"><g id="s9"><g id="s5"><g id="s4"><path id="s" d="M247,90 317.534230,307.082039 132.873218,172.917961H361.126782L176.465770,307.082039z"/><use xlink:href="#s" y="420"/><use xlink:href="#s" y="840"/><use xlink:href="#s" y="1260"/></g><use xlink:href="#s" y="1680"/></g><use xlink:href="#s4" x="247" y="210"/></g><use xlink:href="#s9" x="494"/></g><use xlink:href="#s18" x="988"/><use xlink:href="#s9" x="1976"/><use xlink:href="#s5" x="2470"/></g></svg> EN</a>
			<a href="<?=$rbase.'/'.$entry['de']?>"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="18" viewBox="0 0 5 3"><desc>Flag of Germany</desc><rect id="black_stripe" width="5" height="3" y="0" x="0" fill="#000"/><rect id="red_stripe" width="5" height="2" y="1" x="0" fill="#D00"/><rect id="gold_stripe" width="5" height="1" y="2" x="0" fill="#FFCE00"/></svg> DE</a>
			<a href="<?=$rbase.'/'.$entry['fr']?>"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="18"><desc>Flag of France</desc><path fill="#CE1126" d="M0 0h27v18H0"/><path fill="#fff" d="M0 0h18v18H0"/><path fill="#002654" d="M0 0h9v18H0"/></svg> FR</a>
		</div></div>
<?php } ?>
		</div></nav></div></div>
	</header>
