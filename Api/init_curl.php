<?php



$ch = curl_init();

curl_setopt_array($ch, [

    CURLOPT_RETURNTRANSFER => true
]);

return $ch;
?>