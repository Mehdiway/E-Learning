<?php

    include("../config.php");

    $query = "UPDATE Reussite SET valide = 1 WHERE id = " . $_POST['id'];
    mysqli_query($db, $query);
    echo mysqli_affected_rows($db);

?>