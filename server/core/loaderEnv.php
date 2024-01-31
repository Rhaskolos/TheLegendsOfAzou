<?php

namespace server\core;

function loaderEnv($file)
{

    if (file_exists($file)) {


        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            // ignore comments from the env file
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            putenv(trim($line));
        }
    } else {
        var_dump("Error, file not found.");
    }
}


/*
for loading .env file : 

loaderEnv(".env");

for save value of .env : 

$save = getenv($value)
*/