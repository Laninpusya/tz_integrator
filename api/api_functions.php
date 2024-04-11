<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'addlead') {
        $data = [
            "firstName" => $_POST['firstName'],
            "lastName" => $_POST['lastName'],
            "phone" => $_POST['phone'],
            "email" => $_POST['email'],
            "countryCode" => "GB",
            "box_id" => "28",
            "offer_id" => "5",
            "landingUrl" => "http://qweasd132.zzz.com.ua/",
            "ip" => $_SERVER['REMOTE_ADDR'],
            "password" => "qwerty12",
            "language" => "en",
        ];

        // Отправка данных cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://crm.belmar.pro/api/v1/addlead');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958',
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        if ($result['status'] === true) {
            echo "<p>Lead added successfully!</p>";
        } else {
            echo "<p>Error adding lead: " . $result['error'] . "</p>";
        }
    } else {
        echo "<p>Invalid action!</p>";
    }
}
?>
