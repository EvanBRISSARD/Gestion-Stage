<?php 

function formaterDateEnFrancais(string $dateSql): string {
    $date = DateTime::createFromFormat('Y-m-d', $dateSql);
    return $date ? $date->format('d/m/Y') : "Date invalide";
}