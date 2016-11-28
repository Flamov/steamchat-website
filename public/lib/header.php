<?php

	require_once "common.php";

	$metaDescription = "A Podcast On All Things Valve";

	if ($pageType == "index") {
		$metaTitle = ": " . $metaDescription;
	}
	else if ($pageType == "episode") {
		$metaTitle = " " . ucfirst($episodeType) . " #" . $episodeNumber . ": " . $episodeTitle;
		$metaDescription = "(Released " . $episode[$episodeType][$episodeNumber][0][2] . ") " . $episode[$episodeType][$episodeNumber][0][1];
	}
	else if ($pageType = "misc") {
		$metaTitle = ": " . $pageTitle;
	};

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, target-densitydpi=device-dpi" />
		<title>Steamchat<?php echo $metaTitle; ?></title>
		<link rel="stylesheet" href="<?php echo $hostLocation; ?>css/min/styleGlobal.min.css" type="text/css" media="screen" />
		<?php
			if ($pageType != "misc") {
				echo '<link rel="stylesheet" href="' . $hostLocation . 'css/min/style' . ucfirst($pageType) . '.min.css" type="text/css" media="screen" />';
			};
		?>
		<link rel="shortcut icon" href="<?php echo $hostLocation; ?>favicon.ico" />
		<link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700<?php echo "|Lato"; ?>" rel="stylesheet" type="text/css">
		<meta property="og:url" content="<?php echo $_SERVER["REQUEST_URI"]; ?>" />
		<meta property="og:title" content="Steamchat<?php echo $metaTitle; ?>" />
		<meta property="og:description" content="<?php echo $metaDescription; ?>" />
		<meta name="description" content="<?php echo $metaDescription; ?>" />
		<meta property="og:image" content="<?php echo $hostLocation; ?>img/global/og_image.png" />
		<?php
			if ($pageType == "episode") {

				$episodeSeconds = $episode[$episodeType][$episodeNumber][2][1];
				sscanf($episodeSeconds, "%d:%d:%d", $hours, $minutes, $seconds);
				$episodeSeconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;

				echo '
					<meta property="og:type" content="music.song" />
					<meta property="music:album" content="Steamchat Podcast ' . ucfirst($episodeType) . 's" />
					<meta property="music:album:track" content="' . $episodeNumber . '" />
					<meta property="music:musician" content="Steamchat Podcast" />
					<meta property="music:duration" content="' . $episodeSeconds . '" />
				';
			}
			else {
				echo '<meta property="og:type" content="website" />';
			};
		?>
	</head>

	<body class="<?php echo $pageType; ?>">

		<aside id="headerTip">

			<div class="wrapper">

				<div class="left">

					<h2>Thanks for getting in touch!</h2>

					<p>We love to hear from our listeners, and have always aimed to read and discuss every email we get on the podcast.</p>

					<p>If you would like us to discuss something, or just have something to say, feel free to give us a shout using any of the methods to the right!</p>

				</div>

				<div class="right">

					<ul>
						<li><a href="mailto:podcast@thesteamchat.com" class="email">Email (podcast@thesteamchat.com)</a></li>
						<li><a href="https://www.twitter.com/thesteamchat" class="twitter">Twitter (@Steamchat)</a></li>
						<li><a href="https://www.facebook.com/SteamchatPodcast" class="facebook">Facebook</a></li>
						<li><a href="http://www.steamcommunity.com/groups/SteamchatPodcast" class="steam">Steam</a></li>
						<li><a href="https://www.youtube.com/Steamchat" class="youtube">YouTube</a></li>
					</ul>

				</div>

			</div>

		</aside>

		<header id="header" <?php if ($pageType == "index") { echo "style='background-image: url(episodes/" . $latestEpisode . "/episode" . $latestEpisode . "_latest_image.jpg); background-color: "  . $episode["episode"][104][1][2] . "'"; }; ?>>

			<nav id="headerMenu" <?php if ($pageType == "index") { echo "style='background-image: url(episodes/" . $latestEpisode . "/episode" . $latestEpisode . "_latest_overlay.png);'"; }; ?>>

				<div id="headerLogo"><a href="<?php echo $hostLocation; ?>"></a></div>

				<ul>
					<li><a href="<?php echo $hostLocation; ?>">Episodes</a></li>
					<li><a href="<?php echo $hostLocation; ?>specials/">Specials</a></li>
					<li><a href="<?php echo $hostLocation; ?>about/">About</a></li>
				</ul>

				<div id="headerMenu-tip">
					<a href="#" onclick="tipToggle(event)">Tip us!</a>
				</li>

			</nav>

			<?php

				if ($pageType == "index") {
					require_once "headerPlayer.php";
				};

			?>

		</header>

		<main id="content">