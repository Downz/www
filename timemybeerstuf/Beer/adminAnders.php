<?php
include "SQL_query.php";
$SQLquery = new SQL_query();

if (isset($_POST["updateItem"])) {
    //TODO: Insert Alert here!!!!
    $SQLquery->deleteItemFromBeer($_POST["id"]);
    header("Refresh:0");
}



?>

<form class="form-inline" method="post" onsubmit="return confirm('Er du sikker på at du vil slette dette ID? ')">
    <div class="form-group">


        <input type="number" class="form-control" name="id" min="0" max="1000" step="any" required>

        <input type="submit" value="delete ID" name="updateItem">
    </div>
</form>