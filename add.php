<!DOCTYPE html>
<html>
<head>
	<title>Quizletcoalition.cc</title>
	<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/pg-spec-request.css" rel="stylesheet">
  <link href="assets/css/switch.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/3ba0d60fb5.js" crossorigin="anonymous"></script>
  <script src="assets/js/request.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177772435-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177772435-1');
</script>

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
			<div class="input-box flex-container">
				<form action="submit-request.php" class="fullwidth" method="POST">
					<table>
						<tr>
							<!-- ********************  ADD QUIZLET LINK  ************************* -->
							<td id="1">
                <label for="">Link to your quizlet:</label><br>
                <input type="text" value="https://quizlet.com/141802621/world-religion-background-information-flash-cards/" class="input light outline dark-highlights halfwidth" placeholder="https://quizlet.com/123/name" id="url_input">  <a class="btn input-inline blue" id="searchbtn" href="javascript:cards.getCards(document.getElementById('url_input').value)">Search</a><br>
								<br>
								<div class="tcontainer" id="preview_table">
								</div>
							</td>
							<!-- ********************  /ADD QUIZLET LINK  ************************* -->
							<!-- ********************  ADD SCHOOL DETAILS  ************************* -->
							<td id="2" style="display:none;">
								<label for="">Location of your school:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="State/province" id="state_input">  <select id="country_input" class="dropdown input light outline dark-highlights"><?php include("assets/elements/countries.php"); ?></select><br>
								<label for="">Your school's name:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="Your school" id="school_input">  <a class="btn input-inline blue" href="javascript:schools.searchSchool()">Search</a><br>
								<div class="table_display" id="table_display">
									<div class="detail">
										<h3>Don't see your school?</h3>
										<h5>Try refining your search terms or add it</h5>
									</div>
								</div>
								<br>
							</td>
							<!-- ********************  /ADD SCHOOL DETAILS  ************************* -->
							<!-- ********************  ADD TEACHER DETAILS  ************************* -->
							<td id="3" style="display:none;">
								<label for="">Your teacher's name:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="Teacher's name" id="teacher_input" onkeyup="classes.getClasses(this.value)">  <a class="btn input-inline blue" href="javascript:classes.getClasses(document.getElementById('teacher_input').value)">Search</a><br>
								<div class="table_display" id="classes_display">
									<div class="detail">
										<h3>Don't see your teacher?</h3>
										<h5>Try refining your search terms or add it</h5>
									</div>
								</div>
								<br>
							</td>
							<!-- ********************  /ADD TEACHER DETAILS  ************************* -->
							<!-- ********************  ADD CLASS DETAILS  ************************* -->
							<td id="4" style="display:none;">
								<label for="">Your class's name:</label><br>
								<div class="table_display" id="courses_display">
									<div class="detail">
										<h3>Don't see your class?</h3>
										<h5>Try refining your search terms or add it</h5>
									</div>
								</div>
								<br>
							</td>
							<!-- ********************  /ADD CLASS DETAILS  ************************* -->
							<!-- ********************  SUBMIT!  ************************* -->
							<td id="5" style="display:none;">
								<label for="">Press the green button to submit your Quizlet!</label><br>
								<a href="javascript:submit()" class="btn green">Submit my Quizlet!</a>
								<br>
								<span id="submitStatusReturn" class="helpertext"></span>
							</td>
							<!-- ********************  /SUBMIT!  ************************* -->
							<!-- ********************  ADD SCHOOL TO DB  ************************* -->
							<td id="addSchool" style="display:none;">
								<label for="">Location of your school:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="City, State/province" id="schoolLocation">  <select class="dropdown input light outline dark-highlights" id="schoolLocationCountry"><?php include("assets/elements/countries.php"); ?></select><br>
								<label for="">Your school's name:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="Your school" id="schoolName">  <a class="btn input-inline blue" id="addSchoolBtn" href="javascript:schools.addSchoolM(document.getElementById('schoolName').value,document.getElementById('schoolLocation').value,document.getElementById('schoolLocationCountry').value)">Add your school</a><br>
								<br>
								<span id="addSchoolStatusReturn" class="helpertext"></span>
							</td>
							<!-- ********************  /ADD SCHOOL TO DB  ************************* -->
							<!-- ********************  ADD TEACHER TO DB  ************************* -->
							<td id="addTeacher" style="display:none;">
								<label for="">Your teacher's name:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="Your teacher (first name last name)" id="teacherName">  <a class="btn input-inline blue" id="addTeacherBtn" href="javascript:schools.teachers.addTeacherM(document.getElementById('teacherName').value)">Add your teacher</a><br>
								<br>
								<span id="addTeacherStatusReturn" class="helpertext"></span>
							</td>
							<!-- ********************  /ADD TEACHER TO DB  ************************* -->
							<!-- ********************  ADD TEACHER'S CLASS TO DB  ************************* -->
							<td id="addCourse" style="display:none;">
								<label for="">Your class's name:</label><br>
								<input type="text" class="input light outline dark-highlights halfwidth" placeholder="Your class" id="courseName">  <a class="btn input-inline blue" id="addCourseBtn" href="javascript:classes.addCourseM(document.getElementById('courseName').value)">Add your class</a><br>
								<br>
								<span id="addCourseStatusReturn" class="helpertext"></span>
							</td>
							<!-- ********************  /ADD TEACHER'S CLASS TO DB  ************************* -->
						</tr>
						<tr>
							<td colspan="3">
								<div class="right">
									<a href="javascript:navigation.next()" class="btn blue" id="nextbtn" style="display:none">Next</a>
								</div><br><br><br><br><br>
								<center><label>Your inputs are saved by session. This means if you close or reload the page, your changes <b>will not be saved</b></label></center>
							</td>
						</tr>
					</table>
				</form>
    </div>
	</div>
		<div class="footer">
		</div>
	</div>
</body>
</html>
