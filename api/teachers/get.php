<?php

include "../../assets/db_config.php";
$schools = "";
// echo "db included";
if($err == "") {
  //All mysql-related code goes in here.
  // SELECT * FROM `teachers` WHERE school_id = 1 AND name LIKE '%y%'
  $sql = "SELECT * FROM teachers WHERE (school_id = ".$_GET['school_id']." AND name LIKE '%".$_GET['name']."%') ORDER by name LIMIT 50";
  // echo $sql;
  $result = $conn->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
    // output data of each row
    $schools .= '{"teachers":{';
    while($row = $result->fetch_assoc()) {
      $classes = explode("[]",$row["subjects"]);
      // var_dump($classes);
      $schools .= '"t' . $row["id"] . '":{';
      $schools .= '"id":"' . $row["id"] . '",';
      $schools .= '"name":"' . $row["name"] . '",';
      $schools .= '"subjects":{';
      $classes_counter = 0;
      foreach($classes as $class) {
        $schools .= '"c'.$classes_counter.'":"' . $class . '",';
        $classes_counter++;
      }
      $schools = substr($schools,0,-1);
      $schools .= '},';
      $schools .= '"school_id":"' . $row["school_id"] . '"';
      $schools .= "},";
    }
    $schools = substr($schools,0,-1);
    $schools .= "}}";
  } else {
    echo '{"teachers":{}}';
  }
  $conn->close();

} else {
  echo $err;
}
echo $schools;
// echo $sql;

?>
