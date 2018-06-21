<?php
$name = $_POST["recipeName"];
$source = $_POST["source"];
$notes = $_POST["notes"];
$serving = $_POST["servings"];
$prepTime = $_POST["prepTime"];
$cookTime = $_POST["cookTime"];
$stars = $_POST["stars"];
$ingList = array();
$stepList = array();

if ( $_POST["ing1"] != "" ) {
  array_push($ingList,$_POST["ing1"]);
}
if ( $_POST["ing2"] != "" ) {
  array_push($ingList,$_POST["ing2"]);
}
if ( $_POST["ing3"] != "" ) {
  array_push($ingList,$_POST["ing3"]);
}
if ( $_POST["ing4"] != "" ) {
  array_push($ingList,$_POST["ing4"]);
}
if ( $_POST["ing5"] != "" ) {
  array_push($ingList,$_POST["ing5"]);
}
if ( $_POST["ing6"] != "" ) {
  array_push($ingList,$_POST["ing6"]);
}
if ( $_POST["ing7"] != "" ) {
  array_push($ingList,$_POST["ing7"]);
}
if ( $_POST["ing8"] != "" ) {
  array_push($ingList,$_POST["ing8"]);
}
if ( $_POST["ing9"] != "" ) {
  array_push($ingList,$_POST["ing9"]);
}
if ( $_POST["ing10"] != "" ) {
  array_push($ingList,$_POST["ing10"]);
}
if ( $_POST["ing11"] != "" ) {
  array_push($ingList,$_POST["ing11"]);
}
if ( $_POST["ing12"] != "" ) {
  array_push($ingList,$_POST["ing12"]);
}
if ( $_POST["ing13"] != "" ) {
  array_push($ingList,$_POST["ing13"]);
}
if ( $_POST["ing14"] != "" ) {
  array_push($ingList,$_POST["ing14"]);
}
if ( $_POST["ing15"] != "" ) {
  array_push($ingList,$_POST["ing15"]);
}


if ( $_POST["step1"] != "" ) {
  array_push($stepList,$_POST["step1"]);
}
if ( $_POST["step2"] != "" ) {
  array_push($stepList,$_POST["step2"]);
}
if ( $_POST["step3"] != "" ) {
  array_push($stepList,$_POST["step3"]);
}
if ( $_POST["step4"] != "" ) {
  array_push($stepList,$_POST["step4"]);
}
if ( $_POST["step5"] != "" ) {
  array_push($stepList,$_POST["step5"]);
}
if ( $_POST["step6"] != "" ) {
  array_push($stepList,$_POST["step6"]);
}
if ( $_POST["step7"] != "" ) {
  array_push($stepList,$_POST["step7"]);
}
if ( $_POST["step8"] != "" ) {
  array_push($stepList,$_POST["step8"]);
}
if ( $_POST["step9"] != "" ) {
  array_push($stepList,$_POST["step9"]);
}
if ( $_POST["step10"] != "" ) {
  array_push($stepList,$_POST["step10"]);
}
if ( $_POST["step11"] != "" ) {
  array_push($stepList,$_POST["step11"]);
}
if ( $_POST["step12"] != "" ) {
  array_push($stepList,$_POST["step12"]);
}
if ( $_POST["step13"] != "" ) {
  array_push($stepList,$_POST["step13"]);
}
if ( $_POST["step14"] != "" ) {
  array_push($stepList,$_POST["step14"]);
}
if ( $_POST["step15"] != "" ) {
  array_push($stepList,$_POST["step15"]);
}


include 'sqlconnect.php';

$sql = 'INSERT INTO recipeBook (recipeName, source, notes, servings, prepTime, cookTime, stars) VALUES ("' . $name . '", "' . $source . '", "' . $notes . '", "' . $serving . '", "' . $prepTime . '", "' . $cookTime . '", "' . $stars . '");';

if($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $sql = "";
    
    // Ingredient insert
    for($currentNum = 0; $currentNum < count($ingList); $currentNum++) {
      $sql .= 'INSERT INTO ingredients (recipeID, ingredientName) VALUES (' . $last_id . ', "' . $ingList[$currentNum] . '");';
    }
    // Steps insert
    for($currentNum = 0; $currentNum < count($stepList); $currentNum++) {
      $insertNum = $currentNum + 1;
      $sql .= 'INSERT INTO steps (recipeID, stepOrder, stepContent) VALUES (' . $last_id . ', ' . $insertNum . ', "' . $stepList[$currentNum] . '");';
    }

    if ($conn->multi_query($sql) === TRUE) {
      echo "New records created successfully";
      echo $sql;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header('Location: index.php');
?>