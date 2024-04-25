<?php

namespace KianKamgar\MoadianPhp\Helpers;

use Exception;

class SignHelper
{
    /**
     * Encode text in base64
     *
     * @param string $data
     * @return string
     */
    public static function base64url_encode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /**
     * Get certificate from file path
     *
     * @param string $certificatePath
     * @return string
     * @throws Exception
     */
    public static function getCertificate(string $certificatePath): string
    {
        $content = self::getFileContents($certificatePath);

        return strtr($content, [
            '-----BEGIN CERTIFICATE-----' => '',
            '-----END CERTIFICATE-----' => '',
            "\n" => '',
            "\r" => ''
        ]);
    }

    /**
     * Get private key from file path
     *
     * @param string $privateKeyPath
     * @return string
     * @throws Exception
     */
    public static function getPrivateKey(string $privateKeyPath): string
    {
        return self::getFileContents($privateKeyPath);
    }

    /**
     * Sign string data
     *
     * @param string $data
     * @param string $privateKey
     * @param int|string $algorithm
     * @return string
     */
    public static function signData(string $data, string $privateKey, int|string $algorithm): string
    {
        openssl_sign($data, $signature, openssl_pkey_get_private($privateKey), $algorithm);

        return SignHelper::base64url_encode($signature);
    }

    /**
     * Get file content by file path
     *
     * @param string $path
     * @return string
     * @throws Exception
     */
    private static function getFileContents(string $path): string
    {
        $content = file_get_contents($path);

        if (empty($content)) {

            throw new Exception('File not found');
        }

        return $content;
    }
}