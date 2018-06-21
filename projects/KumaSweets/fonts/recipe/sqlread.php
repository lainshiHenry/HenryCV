<?php
include 'sqlconnect.php';

$sql = 'SELECT recipeName FROM `recipeBook` ORDER BY recipeName';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="#" class="list-group-item">' . $row["recipeName"] . '</a>'; 
    }
} else {
    echo "0 results";
}
echo '</ul>';

$conn->close();


?>