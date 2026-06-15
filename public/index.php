<?php

$motDePasse = "ment5aie";

$hash = password_hash($motDePasse, PASSWORD_BCRYPT);

echo $hash;