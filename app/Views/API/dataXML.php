<?php
echo xml_convert("<data>");
echo "<br>";
echo "<br>";
foreach ($data as $data) {
    echo xml_convert('<id>' . $data['id'] . '</id>');
    echo "<br>";
    echo xml_convert('<judul>' . $data['judul'] . '</judul>');
    echo "<br>";
    echo xml_convert('<genre>' . $data['genre'] . '</genre>');
    echo "<br>";
    echo xml_convert('<sampul>' . $data['sampul'] . '</sampul>');
    echo "<br>";
    echo "<br>";
}
echo xml_convert("</data>");
