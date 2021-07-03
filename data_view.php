<?php
    $connection = mysqli_connect("localhost", "root", "root", "data_analysis");
    // GET TOTAL NUMBER OF DATA IN THE DATABASE TABLE
    $all_data = "
        SELECT * FROM adelu_adedolapo_EDT
    ";
    $dataResponse = mysqli_query($connection, $all_data);

    echo "
        <table>
            <th>
                <tr>
                    <td></td>
                </tr>
            </th>
            <td></td>
    ";
    while ($each_row = mysqli_fetch_assoc($dataResponse)) {
        # code...
    }
    echo "<table>";

