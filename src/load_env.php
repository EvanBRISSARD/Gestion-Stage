<?php
// src/load_env.php

function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line); // Nettoie les espaces au début et à la fin de la ligne
        if (empty($line) || strpos($line, '#') === 0) continue;

        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            // On retire d'éventuels guillemets si tu en as mis
            $value = trim($value, '"\''); 

            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
        }
    }
}

// On appelle la fonction tout de suite en pointant vers la racine
loadEnv(__DIR__ . '/../config/.env');