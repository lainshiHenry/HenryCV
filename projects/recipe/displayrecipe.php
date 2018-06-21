<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kuma Recipe Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  <script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div');
        mywindow.document.write('<html><head><title>Recipe</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Kuma Recipe Book</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="addrecipe.html">Add Recipe</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
<div id="printContent">    
       <?php
          $rID = $_GET['recipeID'];
          include 'sqlconnect.php';

          //read from recipeBook
          $sql = 'SELECT * FROM `recipeBook` WHERE recipeID = "'. $rID . '"';
          $result = $conn->query($sql);
         
          if ($result->num_rows > 0) {
             // output data of each row
            while($row = $result->fetch_assoc()) {
              $rName = $row['recipeName'];
              $rServings = $row['servings'];
              $rSource = $row['source'];
              $rNotes = $row['notes'];
              $rprepTime = $row['prepTime'];
              $rcookTime = $row['cookTime'];
              $rStars = $row['stars'];
            }
          } else {
            echo "0 results";
          }

          //read from ingredients
          $sql = 'SELECT ingredientName FROM `ingredients` WHERE recipeID = "'. $rID . '"';
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
             // output data of each row
            while($row = $result->fetch_assoc()) {
              $rIng[count($rIng)] = $row['ingredientName'];
            }
          }

          //read from steps
          $sql = 'SELECT stepContent FROM `steps` WHERE recipeID = "'. $rID . '" ORDER BY stepOrder ASC';
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
             // output data of each row
            while($row = $result->fetch_assoc()) {
              $rStep[count($rStep)] = $row['stepContent'];
            }
          }

          $conn->close();
       
        echo '<div id="titleSec">';
          echo '<h1>' . $rName . '</h1>';
          echo '<h5> Source: ' . $rSource . '</h5>';
        echo '</div>';
        echo '<hr>';

        echo '<div id="additionalInfoSec">';
          echo '<table style="width:100%">';
            echo '<tr>';
              echo '<td style="width:25%"><table><tr><td>Servings</td></tr><tr><td><b>' . $rServings . '</b></td></tr></table></td>';
              echo '<td style="width:25%"><table><tr><td>Stars</td></tr><tr><td><b>' . $rStars . '</b></td></tr></table></td>';
              echo '<td style="width:25%"><table><tr><td>Prep Time</td></tr><tr><td><b>' . $rprepTime . '</b></td></tr></table></td>';
              echo '<td style="width:25%"><table><tr><td>Cook Time</td></tr><tr><td><b>' . $rcookTime . '</b></td></tr></table></td>';
            echo '</tr>';
          echo '</table>';
        echo '</div>';

        echo '<div id="notesSec">';
          echo '<h3>Notes</h3>';
          echo '<p>' . $rNotes . '</p>';
        echo '</div>';

        echo '<div id="ingSec">';
           echo '<h3>Ingredients</h3>';
           echo '<ul>';
           for($x = 0; $x < count($rIng); $x++) {
              echo '<li><b>' . $rIng[$x] . '</b></li>';
           }
           echo '</ul>';
        echo '</div>';
            
        echo '<div id="stepsSec">';
           echo '<h3>Steps</h3>';
           echo '<ol>';
             for($x = 0; $x < count($rStep); $x++) {
                  echo '<li><b>' . $rStep[$x] . '</b></li>';
             }
           echo '</ol>';
        echo '</div>';    
        ?>
  </div>
<input type="button" value="Print Recipe" onclick="PrintElem('#printContent')" />
</div>
    </div>
</body>
</html>