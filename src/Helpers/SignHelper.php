<?php

namespace KianKamgar\MoadianPhp\Helpers;

use Exception;

class SignHelper
{
    public static function base64url_encode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /**
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
     * @throws Exception
     */
    public static function getPrivateKey(string $privateKeyPath): string
    {
        return self::getFileContents($privateKeyPath);
    }

    public static function signData(string $data, string $privateKey, int|string $algorithm): string
    {
        openssl_sign($data, $signature, openssl_pkey_get_private($privateKey), $algorithm);

        return SignHelper::base64url_encode($signature);
    }

    /**
     * @throws Exception
     */
    private static function getFileContents(string $fileName): string
    {
        $content = file_get_contents($fileName);

        if (empty($content)) {

            throw new Exception('Certificate file not found');
        }

        return $content;
    }
}