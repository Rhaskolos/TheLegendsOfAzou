<?php


class LoaderEnv {

    static function  loadEnv($file)
{
try {
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
            throw new \Exception("Error, file not found.");
    }         
    } catch (\Exception $e) {
        http_response_code(404);
        echo "An error has occurred. Please try again later. The error is : " . $e->getMessage();
    }
}
}



