<?php

    include("../config.php");

    $query = "DELETE FROM Formation WHERE id = " . $_POST['id'];
    mysqli_query($db, $query);
    echo mysqli_affected_rows($db);

?>