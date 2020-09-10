<?php

include "../../assets/db_config.php";

$sql = "SELECT * FROM `studysets` WHERE id = ".$thispage;
$result = $conn->query($sql);

// echo file_exists("../api/get.php");
$schoolname;
$teachername;
$classname;
$qz_link;
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $internal = true;
    $internal_url = $row["link"];
    $qz_link = $row["link"];
    $vars_over_display = true;
    include("../../api/get.php");
    if (!file_exists($thispage)) {
      mkdir($thispage);
    }
    @$filetodownload = fopen($returned_title.".json","w");
    @fwrite($filetodownload,$returned_cards);
    $classname = $row["classId"];
    $schoolsql = "SELECT * FROM `schools` WHERE id = ".$row["schoolId"];
    $schoolresult = $conn->query($schoolsql);
    if($schoolresult->num_rows > 0) {
      while($schoolrow = $schoolresult->fetch_assoc()) {
        $schoolname = $schoolrow["name"];
      }
    }
    $teachersql = "SELECT * FROM `teachers` WHERE id = ".$row["teacherId"];
    $teacherresult = $conn->query($teachersql);
    if($teacherresult->num_rows > 0) {
      while($teacherrow = $teacherresult->fetch_assoc()) {
        $teachername = $teacherrow["name"];
      }
    }
  }
}

$qz_link_exploded = explode("/",$qz_link);
$qz_base_link = $qz_link_exploded[0] . "/" . $qz_link_exploded[1] . "/" . $qz_link_exploded[2] . "/" . $qz_link_exploded[3] . "/";

// print_r(explode("/",$qz_link));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quizletcoalition.cc</title>
	<link href="../../assets/css/style.css" rel="stylesheet">
  <link href="../../assets/css/pg-spec-template.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<body>
	<div class="maincontent padded">
		<div class="navbar top clearfix">
      <a href="../../index" style="color:var(--black-rep);"><h2 class="bold left">Quizlet Coalition</h2></a>
			<div class="right">
				<a href="about" class="link">About</a>
			</div>
		</div>
		<h1 class="thin" style="margin-bottom:0;"><?php echo $returned_title; ?></h1>
    <h5 class="thin" style="margin-top:0;"><a href="" class="helper-text"><?php echo $schoolname; ?></a> &gt <a href="" class="helper-text"><?php echo $classname; ?></a> ( <a href="" class="helper-text"><?php echo $teachername; ?></a> )</h5>
    <a class="btn qz-blue tz-on-mobile" href="<?php echo $qz_link; ?>" target="_BLANK">View on Quizlet</a>
    <a class="btn qz-red tz-on-mobile" href="<?php echo $qz_base_link . "print"; ?>" target="_BLANK">Print a study guide</a>
    <?php if(file_exists($returned_title.".json")) {echo '<a class="btn qz-yellow tz-on-mobile" href="'. $returned_title . ".json" . '" download>Download the terms</a>';}?>
		<div class="footer">
		</div>
	</div>
</body>
</html>
