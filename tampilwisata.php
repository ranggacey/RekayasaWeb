<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Bypass SSL verification for localhost
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Call the API
$send = curl("https://localhost/RekayasaWeb/getwisata.php");

// Decode the JSON response
$data = json_decode($send, TRUE);


    // Display the table
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr>
            
            <th>Kota</th>
            <th>Landmark</th>
            <th>Tarif</th>
        </tr>";

    foreach($data as $row){
        echo "<tr>";
       
        echo "<td>" . htmlspecialchars($row["kota"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["landmark"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["tarif"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

?>
