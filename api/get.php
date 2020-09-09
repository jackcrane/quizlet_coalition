<?php
$context = stream_context_create(array(
    "http" => array(
        'method' => "GET",
        'header' => "Accept-language: en\r\n" . "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36\r\n"
    )
));

if(isset($internal)) {
  $url = $internal_url;
  $title_only = $internal_title_only;
} else {
  $url = $_GET["url"];
  $title_only = $_GET["title_only"];
}

@$contents = file_get_contents($url, false, $context);
?>
<?php
$countindex = 0;

$cards = '{';

$html = new DomDocument;
@$html -> loadHTML(($contents));
$hones = $html->getElementsByTagName("h1");
foreach($hones as $hone) {
  if(strcmp($hone->getAttribute('class'),"UIHeading UIHeading--one")==0) {
    // echo "Title " . innerHTML($hone);
    $cards .= '"title":"'.innerHTML($hone).'","cards":{';
    $titleh1 = innerHTML($hone);
  }
}
$titles = $html->getElementsByTagName("div");
foreach($titles as $title) {
  if(strcmp($title->getAttribute('class'),"SetPageTerms-term")==0) {
    // echo $title->getAttribute('class') . "     " . strcmp($title->getAttribute('class'),"SetPageTerms-term");
    // echo $countindex . ": " . innerHTML($title);
    // echo "<br>";
    // $cards->$countindex->
    $spans = $title->getElementsByTagName("span");
    $cards .= '"c' . $countindex . '": {';
    foreach($spans as $span) {


      if(strcmp($span->parentNode->getAttribute('class'),"SetPageTerm-wordText")) {
        $cards .= '"q":"'.str_replace(array("'","'"),"^",str_replace(array("\n","\r","<br>")," ",str_replace('"','^^',innerHTML($span)))).'"';
        // echo "Answer: " . innerHTML($span);
        // echo "<br>";
      } else {
        $cards .= '"a":"'.str_replace(array("'","'"),"^",str_replace(array("\n","\r","<br>")," ",str_replace('"','^^',innerHTML($span)))).'",';
        // echo "Question: " . innerHTML($span);
        // echo "<br>";
      }

    }
    $cards .= "},";
    $countindex++;
  }
}
$cards = substr($cards,0,-1);
$cards .= "}}  ";
// echo "<br><br><br><hr><br><br>";
if(!isset($title_only)) {
  if(!isset($vars_over_display)) {
    echo $cards;
  }
  $returned_cards = $cards;
  $returned_title = $titleh1;
} else {
  if(!isset($title_only)) {
    echo $titleh1;
  }
  $returned_title = $titleh1;
}
// echo $titles->item(1)->nodeValue;
// var_dump($html);
// echo "<hr>";
// echo $countindex;

function innerHTML(\DOMElement $element)
{
    $doc = $element->ownerDocument;

    $html = '';

    foreach ($element->childNodes as $node) {
        $html .= $doc->saveHTML($node);
    }

    return $html;
}

?>
