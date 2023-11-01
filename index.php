<?php

// Check if the "text" parameter is provided in the URL
if (isset($_GET['text'])) {
    // Retrieve the "text" parameter from the URL
    $text = $_GET['text'];

    // Define the URL of the API you want to send a request to
    $api_url = 'https://ai.amirabbasmousavi.ir/tts.php';

    // Data you need to send to the API
    $data = array(
        'text' => $text
    );

    // Send a POST request to the API
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    // Check and process the API response
    if ($status_code == 200) {
        print_r($response);
    } else {
        echo "Error: $status_code\n";
        echo $response;
    }
} else {
    echo "Error: 'text' parameter is missing in the URL.";
}

?>
