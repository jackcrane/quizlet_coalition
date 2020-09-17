<?php

@$query = $_GET["squery"] . $_GET["tquery"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Quizletcoalition.cc</title>
	<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/pg-spec-request.css" rel="stylesheet">
  <link href="assets/css/input.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- <script src="https://kit.fontawesome.com/3ba0d60fb5.js" crossorigin="anonymous"></script> -->
  <script src="assets/js/request.js"></script>
  <script src="assets/js/browse.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177772435-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177772435-1');
</script>
<!-- Primary Meta Tags -->
<title>Browse - Quizlet Coalition - Find and share quizlets!</title>
<meta name="title" content="Quizlet Coalition - Find and share quizlets!">
<meta name="description" content="Quizlet Coalition is a web app designed to help find and share quizlets from and with your classmates or previous students.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://metatags.io/">
<meta property="og:title" content="Quizlet Coalition - Find and share quizlets!">
<meta property="og:description" content="Quizlet Coalition is a web app designed to help find and share quizlets from and with your classmates or previous students.">
<meta property="og:image" content="https://quizletcoalition.cc/assets/images/og.png">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://metatags.io/">
<meta property="twitter:title" content="Quizlet Coalition - Find and share quizlets!">
<meta property="twitter:description" content="Quizlet Coalition is a web app designed to help find and share quizlets from and with your classmates or previous students.">
<meta property="twitter:image" content="https://quizletcoalition.cc/assets/images/og.png">

<meta name="keywords" content="study tool,study,quizlet,learn,share">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="1 days">
</head>
<body>
	<div class="maincontent padded">
		<div class="navbar top clearfix">
			<a href="index.php" style="color:var(--black-rep);"><h2 class="bold left">Quizlet Coalition</h2></a>
			<div class="right">
				<a href="about.php" class="link">About</a>
			</div>
		</div>
		<div class="index-split">
      <input type="text" value="" class="input dark outline fullwidth" placeholder="Search for quizlets... Search specifically for teachers by putting them in {} or a school with []" onkeyup="search(this.value)" <?php if($query!=="") {@echo 'onload="'.$query.'"';} ?>>
      <br><br>
      <div id="results">
        <span class="helpertext">No results</span>
      </div>
    </div>
	</div>
		<div class="footer">
		</div>
	</div>
</body>
</html>
