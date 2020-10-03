<?php

// $linksearch = filter_var($_GET["link"],FILTER_SANITIZE_STRING);
// $titlesearch = filter_var($_GET["title"],FILTER_SANITIZE_STRING);
// $classidsearch = filter_var($_GET["cids"],FILTER_SANITIZE_STRING);
$query = filter_var($_GET["query"],FILTER_SANITIZE_STRING);

include "../assets/db_config.php";

// $sql = "SELECT * FROM studysets WHERE link LIKE '%".$query."%' OR title LIKE '%".$query."%' OR teacherId LIKE '%".$query."%'";

$teachersql = "SELECT * FROM teachers WHERE name LIKE '%a%'";
echo $teachersql;
$teacherresult = $conn->query($teachersql);
if($teacherresult->num_rows > 0) {
  while($row = $teacherresult->fetch_assoc()) {
    // $sql .= " OR teacherId like '%" . $row["id"] . "%'";
    echo $row["id"];
  }
} else {
  echo "no results, ln 21";
}

// $schoolsql = "SELECT * FROM schools WHERE name LIKE '%".$query."%'";
// // echo $schoolsql;
// $schoolresult = $conn->query($sql);
// if($schoolresult->num_rows > 0) {
//   while($row = $schoolresult->fetch_assoc()) {
//     $sql .= " OR schoolId like '%" . $row["id"] . "%'";
//     // echo $row["id"];
//   }
// } else {
//   // echo "no results, ln 33";
// }

// echo $sql;

$result = $conn->query($sql);
// echo $searchResult;
// echo $sql;

?>
