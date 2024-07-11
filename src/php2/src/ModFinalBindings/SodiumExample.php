<?php
// For more information see: https://wiki.php.net/rfc/libsodium
$text = 'This is something I want to encrypt!!!';
$key = sodium_randombytes_buf(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
$nonce = sodium_randombytes_buf(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$message = sodium_crypto_secretbox(
        $text,
        $key,
        $nonce
);
var_dump($message);
