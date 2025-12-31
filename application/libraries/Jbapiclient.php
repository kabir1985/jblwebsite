<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jbapiclient
{
    public function postJsonAuth(string $url, array $data, string $username, string $password)
    {
       $ch = curl_init($url);
		
        $authString = base64_encode($username . ":" . $password);

        $defaultHeaders = [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic ' . $authString
        ];

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $defaultHeaders,
            CURLOPT_TIMEOUT => 300,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false
        ]);

        $responseBody = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        return [
            'status_code' => $statusCode,
            'body' => $responseBody
        ];
    }
}