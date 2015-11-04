<?php
	$pageType = "index";
	$latestEpisode = 102;
	require_once "lib/episodeData.php";
	require_once "lib/header.php";
?>

	<div id="wrapper">

		<table border="0" cellpadding="0" cellspacing="0" class="episodeArchives special">
			<tr class="episodeArchives-header">
				<td>Special Episodes</td>
			</tr>
			<tr>
				<td>
					<ul>
						<?php

							// List of specials/interviews/snacks (in order)
							// [0] = episode index
							// [1] = episode type ("epispde", "snack")
							// [2] = title (some original titles are too long)
							$specialsArray = array(
								array(9, "episode", "2009 Gabe Newell Interview"),
								array(47, "episode", "2011 Gabe Newell Interview, Pt. 1"),
								array(48, "episode", "2011 Gabe Newell Interview, Pt. 2"),
								array(4, "snack", "Black Mesa Interview"),
								array(3, "snack", "Jonathan Coulton Interview"),
								array(2, "snack", "Harry Robins Interview"),
								array(1, "snack", "LambaGeneration Interview"),
								array(16, "episode", "Left 4 Dead 2 Special"),
								array(21, "episode", "Portal 2 Special, Pt. 1"),
								array(22, "episode", "Portal 2 Special, Pt. 2")
							);

							for ($i = 0; $i < count($specialsArray); $i++) {
								echo '
									<li>
										<a href="' . $hostLocation . $specialsArray[$i][1] . "s/" . $specialsArray[$i][0] . '/" data-audio="' . $episode[$specialsArray[$i][1]][$specialsArray[$i][0]][2][2] . '">
											<span class="title">' . $specialsArray[$i][2] . '</span>
											<span class="date">' . $episode[$specialsArray[$i][1]][$specialsArray[$i][0]][0][2] . '</span>
										</a>
									</li>';
							};

						?>
					</ul>
				</td>
			</tr>
		</table>

		<?php

			function listEpisodes($targetStart, $targetEnd) {

				global $episode;

				for ($i = $targetStart; $i >= $targetEnd; $i--) {
					echo '
						<li>
							<a href="' . $hostLocation . 'episodes/' . $i .'/" data-audio="' . $episode["episode"][$i][2][2] . '">
								<span class="title">#' . $i . ': ' . $episode["episode"][$i][0][0] .'</span>
								<span class="date">' . $episode["episode"][$i][0][2] .'</span>
								<span class="play"></span>
							</a>
						</li>';
				};

			};

		?>

		<table border="0" cellpadding="0" cellspacing="0" class="episodeArchives">
			<tr class="episodeArchives-header">
				<td>2013 Episodes</td>
				<td>2012 Episodes</td>
				<td>2011 Episodes</td>
				<td>2010 Episodes</td>
				<td>2009 Episodes</td>
			</tr>
			<tr>
				<td>
					<ul>
						<?php listEpisodes(103, 100); ?>
					</ul>
				</td>
				<td>
					<ul>
						<?php listEpisodes(99, 77); ?>
					</ul>
				</td>
				<td>
					<ul>
						<?php listEpisodes(76, 44); ?>
					</ul>
				</td>
				<td>
					<ul>
						<?php listEpisodes(43, 17); ?>
					</ul>
				</td>
				<td>
					<ul>
						<?php listEpisodes(16, 1); ?>
					</ul>
				</td>
			</tr>
		</table>

	</div>

<?php include "lib/footer.php"; ?>