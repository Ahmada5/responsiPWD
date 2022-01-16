<?php

foreach ($data as $data) {
    $no = 1;
    $response = array();
    $response["data"] = array();
    $h['id'] = $data['id'];
    $h['judul'] = $data['judul'];
    $h['genre'] = $data['genre'];
    $h['sampul'] = $data['sampul'];
    array_push($response["data"], $h);

    echo json_encode($response);
}
