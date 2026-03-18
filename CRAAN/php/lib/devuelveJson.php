<?php
function devuelveJson($data){
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>