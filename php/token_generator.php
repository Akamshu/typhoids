<?php

class TokenGenerator
{
    private $authServiceUrl;
    private $username;
    private $password;

    public function __construct($username, $password, $authServiceUrl = 'https://sandbox-authservice.priaid.ch/login')
    {
        $this->username = $username;
        $this->password = $password; // Fixed typo: $pasword -> $password
        $this->authServiceUrl = $authServiceUrl;
    }

    public function loadToken()
    {
        // Ensure a URL is available for the HMAC calculation if empty
        $url = !empty($this->authServiceUrl) 
            ? $this->authServiceUrl 
            : 'https://sandbox-authservice.priaid.ch/login';

        $computedHash = base64_encode(hash_hmac('md5', $url, $this->password, true));
        $authorization = 'Authorization: Bearer ' . $this->username . ':' . $computedHash;

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => '',
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                $authorization
            ],
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $errorMsg = curl_error($curl);
        curl_close($curl);

        if ($result === false) {
            error_log("cURL Error: " . $errorMsg);
            return null;
        }

        $obj = json_decode($result);

        if ($httpCode !== 200) {
            // Prevent fatal error when echoing an object/array directly
            error_log("API Authentication Error (HTTP $httpCode): " . $result);
            return null;
        }

        return $obj;
    }
}