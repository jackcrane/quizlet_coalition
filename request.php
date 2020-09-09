<!DOCTYPE html>
<html>
<head>
	<title>Volunteer.cc</title>
	<link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/pg-spec-request.css" rel="stylesheet">
  <link href="assets/css/switch.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/3ba0d60fb5.js" crossorigin="anonymous"></script>
  <script src="assets/js/request.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
	<div class="maincontent padded">
		<div class="navbar top clearfix">
			<h2 class="bold left">Volunteer Match</h2>
			<div class="right">
				<a href="" class="link">About</a>
				<a href="" class="link">Join as volunteer</a>
				<a href="" class="link github"><i class="fa fa-github"></i></a>
			</div>
		</div>
		<div class="index-split">
			<div class="input-box flex-container">
				<form action="submit-request.php" class="fullwidth" method="POST">
					<table>
						<tr>
							<td>
								<label>Organization name</label><br><input type="text" class="input light dark-highlights outline request-input"><br>
			          <label>Organization description</label><br><textarea class="textarea-reset input light dark-highlights outline request-input"></textarea><br>
			          <label>Logo/image source</label><br><input type="text" class="input light dark-highlights outline request-input"><br>
			          <label>Your website home page or volunteer page</label><br><input type="text" class="input light dark-highlights outline request-input"><br>
			          <label>Contact (email or phone number)</label><br><input type="text" class="input light dark-highlights outline request-input"><br>
							</td>
							<td>
								<p>Categories:</p>
		            <label class="switch-container">
		              <input type="checkbox" name="technology">
		              <i class="checkbox"></i>
		              Technology
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="nature">
		              <i class="checkbox"></i>
		              Nature
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="art">
		              <i class="checkbox"></i>
		              Art
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="health">
		              <i class="checkbox"></i>
		              Health
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="career_development">
		              <i class="checkbox"></i>
		              Career Development
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="service_to_the_poor">
		              <i class="checkbox"></i>
		              Service to the poor
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="local_service">
		              <i class="checkbox"></i>
		              Local service
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="global_service">
		              <i class="checkbox"></i>
		              Global service
		            </label><br>
		            <label class="switch-container">
		              <input type="checkbox" name="fitness">
		              <i class="checkbox"></i>
		              Fitness
		            </label><br>
							</td>
							<td>
								<p>Commitment:</p>
			          <label class="switch-container">
			            <input type="checkbox" name="tc_1day">
			            <i class="checkbox"></i>
			            1 Day
			          </label><br>
			          <label class="switch-container">
			            <input type="checkbox" name="tc_26day">
			            <i class="checkbox"></i>
			            2-6 days
			          </label><br>
			          <label class="switch-container">
			            <input type="checkbox" name="tc_1week">
			            <i class="checkbox"></i>
			            1 week
			          </label><br>
			          <label class="switch-container">
			            <input type="checkbox" name="tc_24week">
			            <i class="checkbox"></i>
			            2-4 weeks
			          </label><br>
			          <label class="switch-container">
			            <input type="checkbox" name="tc_1month">
			            <i class="checkbox"></i>
			            1 month
			          </label><br>
			          <label class="switch-container">
			            <input type="checkbox" name="tc_indefinite">
			            <i class="checkbox"></i>
			            Indefinite
			          </label><br>
			          <p>Group:</p>
			          <label class="switch-container">
			            <input type="checkbox" name="group">
			            <i class="checkbox"></i>
			            I am looking for a group
			          </label><br>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<div class="right">
									<a href="javascript:document.getElementsByTagName('form')[0].submit()" class="btn blue">Next <i class="far fa-arrow-alt-circle-right"></i></a>
								</div>
							</td>
						</tr>
					</table>
				</form>
    </div>
	</div>
		<div class="footer">
			<p>VolunteerMatch.cc is a project organized by volunteers worldwide. <a href="" class="btn inline lightgrey">Join the effort</a> to contribute.</p>
		</div>
	</div>
</body>
</html>
