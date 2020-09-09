<?php

include "../../assets/db_config.php";
$schools = "";
// echo "db included";
if($err == "") {
  //All mysql-related code goes in here.
  $sql = "SELECT * FROM schools WHERE (location LIKE '%".$_GET['loc']."%' AND name LIKE '%".$_GET['name']."%') ORDER by name LIMIT 50";
  // echo $sql;
  $result = $conn->query($sql);
  // var_dump($result);
  if ($result->num_rows > 0) {
    // output data of each row
    $schools .= '{"schools":{';
    while($row = $result->fetch_assoc()) {
      $schools .= '"s' . $row["id"] . '":{';
      $schools .= '"id":"' . $row["id"] . '",';
      $schools .= '"name":"' . $row["name"] . '",';
      $schools .= '"location":"' . $row["location"] . '"';
      $schools .= "},";
    }
    $schools = substr($schools,0,-1);
    $schools .= "}}";
  } else {
    echo '{"schools":{}}';
  }
  $conn->close();

} else {
  echo $err;
}
echo $schools;
// echo $sql;

?>
