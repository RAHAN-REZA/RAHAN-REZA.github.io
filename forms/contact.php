<?php
// The URL of your deployed Google Apps Script
$google_script_url = 'https://script.google.com/macros/s/AKfycbzoWgq36JKt8Cjy-LTKH-QS3YhBITM33B-bwlfD8guluusZcp-GI2Oc1jXJu6i5yRMBRg/exec ';

$data = array(
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'subject' => $_POST['subject'],
    'message' => $_POST['message']
);

// Use cURL to send data to Google Apps Script
$options = array(
    CURLOPT_URL => $google_script_url,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded')
);

$ch = curl_init();
curl_setopt_array($ch, $options);
$response = curl_exec($ch);
curl_close($ch);

// You can check the response if needed
if ($response) {
    echo 'Message sent successfully!';
} else {
    echo 'Error sending message.';
}
?>
