<!DOCTYPE html>
<html>
<head>
	<title>Quizletcoalition.cc</title>
	<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/pg-spec-request.css" rel="stylesheet">
  <link href="assets/css/input.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/3ba0d60fb5.js" crossorigin="anonymous"></script>
  <script src="assets/js/request.js"></script>
  <script src="assets/js/browse.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
	<div class="maincontent padded">
		<div class="navbar top clearfix">
			<a href="index.html" style="color:var(--black-rep);"><h2 class="bold left">Quizlet Coalition</h2></a>
			<div class="right">
				<a href="" class="link">About</a>
				<a href="" class="link github"><i class="fa fa-github"></i></a>
			</div>
		</div>
		<div class="index-split">
      <input type="text" class="input dark outline fullwidth" placeholder="Search for quizlets... Search specifically for teachers by putting them in {} or a school with []" onkeyup="search(this.value)">
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
