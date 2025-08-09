<?php
class CSRFToken {
    
    public static function generateCSRF($key) {

        return $_SESSION['CSRF-'.$key] = base64_encode(openssl_random_pseudo_bytes(64));
    }

    public static function checkCSRP($key,$token) {

        if (isset($_SESSION['CSRF-'.$key]) && $token === $_SESSION['CSRF-'.$key]) {
            unset($_SESSION['CSRF-'.$key]);
            return true;
        }
        return false;
    }
}
?>