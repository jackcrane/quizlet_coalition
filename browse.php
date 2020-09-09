<?php

require_once('assets/sql_cfg.php');


$queryterms = "";
$timequeryterms = "";
$groupquery = "";

$tech = false;
$nature = false;
$art = false;
$health = false;
$career_development = false;
$service_to_the_poor = false;
$local_service = false;
$global_service = false;
$fitness = false;

$tc_1day = false;
$tc_26day = false;
$tc_1week = false;
$tc_24week = false;
$tc_1month = false;
$tc_indefinite = false;

$group = false;

if(isset($_GET['technology'])) {
  if($_GET['technology']==='on') {
    $queryterms.='%tech%';
    $tech = true;
  }
}
if(isset($_GET['nature'])) {
  if($_GET['nature']==='on') {
    $queryterms.='%nature%';
    $nature = true;
  }
}
if(isset($_GET['art'])) {
  if($_GET['art']==='on') {
    $queryterms.='%art%';
    $art = true;
  }
}
if(isset($_GET['health'])) {
  if($_GET['health']==='on') {
    $queryterms.='%health%';
    $health = true;
  }
}
if(isset($_GET['career_development'])) {
  if($_GET['career_development']==='on') {
    $queryterms.='%career_development%';
    $career_development = true;
  }
}
if(isset($_GET['service_to_the_poor'])) {
  if($_GET['service_to_the_poor']==='on') {
    $queryterms.='%service_to_the_poor%';
    $service_to_the_poor = true;
  }
}
if(isset($_GET['local_service'])) {
  if($_GET['local_service']==='on') {
    $queryterms.='%local%';
    $local_service = true;
  }
}
if(isset($_GET['global_service'])) {
  if($_GET['global_service']==='on') {
    $queryterms.='%global%';
    $global_service = true;
  }
}
if(isset($_GET['fitness'])) {
  if($_GET['fitness']==='on') {
    $queryterms.='%fitness%';
    $fitness = true;
  }
}


if(isset($_GET['tc_1day'])) {
  if($_GET['tc_1day']==='on') {
    $timequeryterms.='%1d%';
    $tc_1day = true;
  }
}
if(isset($_GET['tc_26day'])) {
  if($_GET['tc_26day']==='on') {
    $timequeryterms.='%2-6d%';
    $tc_26day = true;
  }
}
if(isset($_GET['tc_1week'])) {
  if($_GET['tc_1week']==='on') {
    $timequeryterms.='%1w%';
    $tc_1week = true;
  }
}
if(isset($_GET['tc_24week'])) {
  if($_GET['tc_24week']==='on') {
    $timequeryterms.='%2-4w%';
    $tc_24week = true;
  }
}
if(isset($_GET['tc_1month'])) {
  if($_GET['tc_1month']==='on') {
    $timequeryterms.='%1m%';
    $tc_1month = true;
  }
}
if(isset($_GET['tc_indefinite'])) {
  if($_GET['tc_indefinite']==='on') {
    $timequeryterms.='%i%';
    $tc_indefinite = true;
  }
}

if(isset($_GET['group'])) {
  if($_GET['group']==='on') {
    $groupquery.='%i%';
    $group = true;
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Volunteer.cc</title>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/pg-spec-browse.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		<div class="index-search">
			<input type="text" placeholder="Search" class="input dark outline">
		</div>
		<br>
		<div class="clearfix">
			<div class="filter">
				<h3>Filter</h3>
				<p>Categories:</p>
        <form action="browse.php" method="GET">
				<label class="switch-container">
					<input type="checkbox" name="technology" <?php if($tech) {echo "checked";} ?>>
					<i class="checkbox"></i>
					Technology
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="nature" <?php if($nature) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Nature
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="art" <?php if($art) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Art
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="health" <?php if($health) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Health
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="career_development" <?php if($career_development) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Career Development
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="service_to_the_poor" <?php if($service_to_the_poor) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Service to the poor
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="local_service" <?php if($local_service) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Local service
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="global_service" <?php if($global_service) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Global service
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="fitness" <?php if($fitness) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Fitness
				</label><br>
				<p>Commitment:</p>
				<label class="switch-container">
				  <input type="checkbox" name="tc_1day" <?php if($tc_1day) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					1 Day
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="tc_26day" <?php if($tc_26day) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					2-6 days
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="tc_1week" <?php if($tc_1week) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					1 week
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="tc_24week" <?php if($tc_24week) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					2-4 weeks
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="tc_1month" <?php if($tc_1month) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					1 month
				</label><br>
				<label class="switch-container">
				  <input type="checkbox" name="tc_indefinite" <?php if($tc_indefinite) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					Indefinite
				</label><br>
				<p>Group:</p>
				<label class="switch-container">
				  <input type="checkbox" name="group" <?php if($group) {echo "checked";} ?>>
				  <i class="checkbox"></i>
					I am looking as a group
				</label><br>
				<br><br>
        <input type="submit">
      </form>
			</div>
			<div class="service-locs">

        <?php



        echo $queryterms;
        echo "<br>";
        echo $timequeryterms;
        if($queryterms=="") {
          if($group) {
            $sql = "SELECT * FROM `locations_v2` WHERE `personell_commitment` like '%g%' LIMIT 20";
          } else {
            $sql = "SELECT * FROM `locations_v2` LIMIT 20";
          }
        } else if ($group) {
          $sql = "SELECT * FROM `locations_v2` WHERE `tags` like '" . $queryterms . "' AND `time_commitment` like '" . $timequeryterms . "' AND `personell_commitment` like '%g%";
        } else {
          $sql = "SELECT * FROM `locations_v2` WHERE `tags` like '" . $queryterms . "' AND `time_commitment` like '" . $timequeryterms . "'";
        }

        $result = mysqli_query($link,$sql);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $image = $row['image'];
            $tags = str_replace(',','</span><span>',$row['tags']);
            $tags = str_replace('_',' ',$tags);
            $desc = $row['description'];
            $link = $row['link'];
            $contact = $row['contact'];
            // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["image"]. $row["description"]. " " . $row["link"]. "<br>";
            echo '<div class="card" onclick="preview(this)">
            <div class="img-container">
              <div>
                <img class="card-img" src="'.$image.'">
              </div>
            </div>
            <label class="card-label">
              <h2>'.$name.'</h2> <!-- Name -->
              <span class="tags"><span>'.$tags.'</span></span> <!-- <span>tag</span> -->
            </label>
            <span class="desc" hidden>'.$desc.'</span> <!-- description -->
            <span class="link" style="display:none!important">'.$link.'</span> <!-- https://link.tld -->
            <span class="email" style="display:none!important">'.$contact.'</span> <!-- email -->
            <span class="id" style="display:none!important">'.$id.'</span> <!-- id -->
          </div>
          ';
          }
        } else {
          echo "0 results";
        }

        ?>
			</div>

			<div class="preview">
				<h3>Preview</h3>
				<div class="img-container">
					<div>
						<img class="card-img" src="">
					</div>
				</div>
				<label class="card-label">
					<h2></h2>
					<span class="desc"></span><br>
					<a class="link learn-more" href="" style="display:none">Learn more</a>
          <a class="link contact" href="" style="display:none">Contact</a><br>
          <a class="link-col red edit" href="" style="display:none">Edit</a>
				</label>
			</div>

		</div>
		<div class="footer">
			<p>VolunteerMatch.cc is a project organized by volunteers worldwide. <a href="" class="btn inline lightgrey">Join the effort</a> to contribute.</p>
		</div>
	</div>
</body>
<script type="text/javascript" src="assets/js/preview.js"></script>
</html>
