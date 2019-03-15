<?php
$tableResult = $SQLquery->getTable();
$tableToIDs = $SQLquery->getTable();


if (isset($_POST["updateItem"])) {
    //TODO: Insert Alert here!!!!
    $SQLquery->updateItem($_POST["id"], $_POST["amount"]);
    header("Refresh:0");
}

if (isset($_POST['SetNameOnItem'])) {
    $SQLquery->setNameOnID($_POST["SetNameID"], $_POST["PersonName"]);
    header("Refresh:0");
}
echo "<h1>TimeMyBeer HighScore</h1>";

echo "Number of rows: " . $tableResult->num_rows . "<br>";
if ($tableResult->num_rows > 0) {
// output data of each row
    ?>


    <!-- Table -->
    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th>Name</th>
            <th>Drinking Time</th>
            <th>Beer O'clock</th>
            <th>ID</th>
            <th>Bong ID</th>

            <th><span class="glyphicon glyphicon-pencil"></span></th>
        </tr>
        </thead>

        <tbody>
        <?php

        for ($x = 1; $x <= $tableResult->num_rows; $x++) {
            $row = $tableResult->fetch_assoc();
            echo "
                <form class=\"form-inline\" method=\"post\" onsubmit=\"return confirm('Er du sikker på at du vil opdatere det valgte navn? ')\";>
                <div class=\"form-group\">
                <tr>
                 " . DbShowName($row["PersonName"], $row["ID"]) . "
                <td>" . $row["DrinkingTime"] . "</td>
                <td>" . $row["UploadTime"] . "</td>
                <td>" . $row["ID"] . "</td>
                <td>" . $row["BongID"] . "</td>
                " . DbChangeName($row["PersonName"], $row["ID"]) .
                "</tr>
                </div>
        </form>";
        }
        ?>

        </tbody>
    </table>


    <?php
} else {
    echo "0 results";
}

function DbChangeName($PersonName, $id)
{
    if ($PersonName == "") {

        $string = '
    
    <td>
        <input type="hidden" name="SetNameID" value="' . $id . '">
        <input type="submit" name="SetNameOnItem" value="Update">
        
    </td>';


        return $string;
    }
    else{
        return "<td></td>";
    }

}


function DbShowName($PersonName, $id)
{
    if ($PersonName == "") {
        $lol = '<td><input type="text" id="' . $id . '" value="" name="PersonName" required="required"></td>';
        return $lol;



    } else {
        return "<td>$PersonName</td>";
    }


}

?>
