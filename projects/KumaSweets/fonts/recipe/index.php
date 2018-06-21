<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery.mobile-1.4.5.min.js"></script>
<script>
function deleteAlert(id) {
  var response = confirm("Would you want to delete? ");
  debugger;
  if (response == true) {
      var xhttp = new XMLHttpRequest();
      debugger;
      xhttp.open("GET", "ajaxsqlread.php?rID=" + id, true);
      xhttp.send();
      debugger;
      alert("Deleted");
  } else {
     alert("Cancelled delete");
  }
  debugger;
  location.reload(true);
}
</script>
</head>
<body>

<div data-role="page">
  <div data-role="header">
    <div data-role="navbar">
      <ul>
        <li><a href="#" data-icon="bars">Menu</a></li>
        <li><a href="../" data-icon="home" data-ajax="false">Home</a></li>
        <li><a href="../Pantry" data-icon="home" class="ui-btn-active ui-state-persist" data-ajax="false">Pantry</a></li>
        <li><a href="addItem.php" data-icon="plus" data-ajax="false">Add</a></li>
        <li><a href="#" data-icon="minus" data-ajax="false">Remove</a></li>
      </ul>
     </div>
  </div>


  <div data-role="main" class="ui-content">
    <form class="ui-filterable">
      <input id="listFilter" data-type="search">
    </form>
    <?php include 'sqlread.php';?>
  </div>
</div> 



</body>
</html>