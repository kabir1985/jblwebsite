<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jbcrypto
{
    protected $privateKeyResource = null;

    /* ===== Base64 ===== */
    public function base64Encode(string $data): string
    {
        return base64_encode($data);
    }

    public function base64Decode(string $b64)
    {
        $decoded = base64_decode($b64, true);
        return $decoded === false ? null : $decoded;
    }

    /* ===== Load Private Key ===== */
    public function setPrivateKey(string $keyOrPath, ?string $passphrase = null, bool $is_file = false): bool
    {
        $pem = $is_file ? @file_get_contents($keyOrPath) : $keyOrPath;
        if ($pem === false || empty($pem)) {
            return false;
        }
        $res = openssl_pkey_get_private($pem, $passphrase);
        if ($res === false) {
            $this->privateKeyResource = null;
            return false;
        }
        $this->privateKeyResource = $res;
        return true;
    }

    /* ===== RSA Encrypt with Private Key ===== */
    public function encryptWithPrivate(string $data)
    {
        if (!$this->privateKeyResource) return false;

        $details = openssl_pkey_get_details($this->privateKeyResource);
        $keySize = $details['bits'] / 8;
        $maxChunk = $keySize - 11;

        $output = '';
        for ($i = 0; $i < strlen($data); $i += $maxChunk) {
            $chunk = substr($data, $i, $maxChunk);
            $encrypted = '';
            if (!openssl_private_encrypt($chunk, $encrypted, $this->privateKeyResource, OPENSSL_PKCS1_PADDING)) {
                return false;
            }
            $output .= $encrypted;
        }
        return base64_encode($output);
    }
	
		/* ===== RSA Decrypt with Private Key ===== */
	public function decryptWithPrivate(string $encryptedData)
	{
		if (!$this->privateKeyResource) return "error";
	
		$data = base64_decode($encryptedData, true);
		if ($data === false) return "error base64";
	
		$details = openssl_pkey_get_details($this->privateKeyResource);
		$keySize = $details['bits'] / 8;
	
		$output = '';
		for ($i = 0; $i < strlen($data); $i += $keySize) {
			$chunk = substr($data, $i, $keySize);
			$decrypted = '';
			if (!openssl_private_decrypt($chunk, $decrypted, $this->privateKeyResource, OPENSSL_PKCS1_PADDING)) {
				return "OpenSSL Error: " . openssl_error_string();
			}
			$output .= $decrypted;
		}
	
		return $output;
	}


    public function __destruct()
    {
        if (is_resource($this->privateKeyResource)) {
            openssl_free_key($this->privateKeyResource);
        }
    }
}
?>