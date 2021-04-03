<?php
require_once("entities/LetterSlide.php");
require_once("helpers/FileHelper.php");

$fileHelper = new FileHelper();
$letterDescriptions = [
	'a' => new LetterSlide('A is for Apple', 'Ay is for Apple', 'letter-b'),
	'b' => new LetterSlide('B is for Bowser', null, 'letter-c'),
	'c' => new LetterSlide('C is for Cappy', null, 'letter-d'),
	'd' => new LetterSlide('D is for Daisy', null, 'letter-e'),
	'e' => new LetterSlide('E is for Eggs', null, 'letter-f'),
	'f' => new LetterSlide('F is for Froggy', null, 'letter-g'),
	'g' => new LetterSlide('G is for Goomba', null, 'letter-h'),
	'h' => new LetterSlide('H is for Heart', null, 'letter-i'),
	'i' => new LetterSlide('I is for Ice Cube', null, 'letter-j'),
	'j' => new LetterSlide('J is for Jump', null, 'letter-k'),
	'k' => new LetterSlide('K is for Koopa', 'K is for Koo-pa', 'letter-l'),
	'l' => new LetterSlide('L is for Luigi', null, 'letter-m'),
	'm' => new LetterSlide('M is for Mario', null, 'letter-n'),
	'n' => new LetterSlide('N is for Naughty Koopalings', null, 'letter-o'),
	'o' => new LetterSlide('O is for Owl', null, 'letter-p'),
	'p' => new LetterSlide('P is for Peach', null, 'letter-q'),
	'q' => new LetterSlide('Q is for Queen Bee', null, 'letter-r'),
	'r' => new LetterSlide('R is for Red Shell', null, 'letter-s'),
	's' => new LetterSlide('S is for Star', null, 'letter-t'),
	't' => new LetterSlide('T is for Toad', null, 'letter-u'),
	'u' => new LetterSlide('U is for Umbrella', null, 'letter-v'),
	'v' => new LetterSlide('V is for Vacuum Cleaner', null, 'letter-w'),
	'w' => new LetterSlide('W is for Wario', null, 'letter-x'),
	'x' => new LetterSlide('X is for Xray', null, 'letter-y'),
	'y' => new LetterSlide('Y is for Yoshi', null, 'letter-z'),
	'z' => new LetterSlide('Z is for Zombies', null, 'end-screen'),
];


?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"/>
	<title>Learn Letters with Mario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="preconnect" href="https://fonts.gstatic.com"/>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet"/>
	<link rel="stylesheet" href="./css/styles.css"/>
	<script src="./js/learn.js"></script>
	<script>
	document.addEventListener('DOMContentLoaded', function(event) {
		L.init();
	});
	</script>
</head>
<body>

<section class="screen intro-screen" aria-labelledby="intro">
	<div class="screen-content">
		<h1 id="intro" aria-label="Learn your letters">
			<span class="first-word" aria-hidden="true">
				<span>L</span><span>e</span><span>a</span><span>r</span><span>n</span>
			</span>
			<span aria-hidden="true">your Letters</span>
		</h1>
		
		<p>Learn your letters with Mario and friends.</p>
		
		<button type="button" class="next" data-next-slide="letter-a">Start</button>
	</div>
</section>

<!-- Letters -->
<?php
foreach($letterDescriptions as $letter => $slideDetails)
{
	$casedLetters = strtoupper($letter) . $letter;
	$svg = $fileHelper->loadFile("images/$letter.svg");
	
	echo <<<LETTER_SLIDE
	<section class="screen letter-screen letter-$letter" aria-labelledby="letter-$letter" hidden>
		<div class="screen-content">
			<div class="letter" id="letter-$letter">$casedLetters</div>
			
			<p class="letter-description" data-speech-content="$slideDetails->phoneticDescription">$slideDetails->description</p>
			
			$svg
		
			<button type="button" class="next" data-next-slide="$slideDetails->nextSlideName">Next</button>
		</div>
	</section>
LETTER_SLIDE;
}
?>
<!-- End Letters -->

<section class="screen end-screen" aria-labelledby="end">
	<div class="screen-content">
		<h1 id="end" aria-label="The end">
			<span class="first-word" aria-hidden="true">
				<span>T</span><span>h</span><span>e</span>
				<span> </span>
				<span>e</span><span>n</span><span>d</span>
			</span>
		</h1>

		<button type="button" class="next" data-next-slide="intro-screen">Again?</button>
	</div>
</section>

</body>
</html>
