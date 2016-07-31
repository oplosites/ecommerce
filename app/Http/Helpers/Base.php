<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Session,
    Illuminate\Support\Facades\Config;

/**
 * Description of Base
 *
 * @author yusuf
 */
class Base {

    public static function debugVar($var, $exit = FALSE)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";

        if ($exit) {
            exit;
        }
    }

    /**
     * Function to clean each request for XSS attack
     */
    public static function globalXssClean()
    {

        //This stops SQL Injection in POST vars
        foreach ($_POST as $key => $value) {
            $_POST[$key] = (is_array($value)) ? self::stripTagsArray($value) : self::arrayStripTags($value);
        }

        //This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = (is_array($value)) ? self::stripTagsArray($value) : self::arrayStripTags($value);
        }
    }

    public static function arrayStripTags($value)
    {
        $result = htmlentities(trim($value), ENT_QUOTES);

        return $result;
    }

    public static function stripTagsArray($arrValue)
    {
        $result = array();

        foreach ($arrValue as $key => $value) {
            // Don't allow tags on key either, maybe useful for dynamic forms.
            $key = strip_tags($key);

            // If the value is an array, we will just recurse back into the
            // function to keep stripping the tags out of the array,
            // otherwise we will set the stripped value.
            if (is_array($value)) {
                $result[$key] = static::stripTagsArray($value);
            } else {
                // I am using strip_tags(), you may use htmlentities(),
                // also I am doing trim() here, you may remove it, if you wish.
                $result[$key] = htmlentities(trim($value), ENT_QUOTES);
            }
        }

        return $result;
    }

    /*
     * Set a custom cookies with limited time
     * @param string $name Cookies identity
     * @param mixed $value Value from the cookie
     * @param integer $minutes Cookies' limit time in minutes
     */

    public static function setCookiesWithDefinedTime($name, $value, $minutes = 5)
    {
        $add_time = $minutes * 60;

        setcookie($name, $value, time() + $add_time);
    }

    /**
     * Set a custom cookie with expire time until the browser close
     * @param string $name
     * @param type $value
     */
    public static function setCookiesWithLongLastingTime($name, $value)
    {
        setcookie($name, $value, 0);
    }

    /**
     * Set a custom cookie with expire time only for notification
     * @param string $name
     * @param type $value
     */
    public static function setCookiesForNotification($name, $value)
    {
        $add_time = 60;

        setcookie($name, $value, time() + $add_time);
    }

    /**
     * Get cookie notification, this cookie will be deleted once call has been done
     * @param string $name
     * @return string/bool $value
     */
    public static function getCookiesForNotification($name)
    {
        if (isset($_COOKIE[$name])) {
            $cookie_notification = $_COOKIE[$name];
            self::destroyCookies($name);
            return $cookie_notification;
        } else
            return FALSE;
    }

    /**
     * Get the value from cookies, if name is NULL, cookies will return all saved cookies.
     * @param string $name cookies name
     * @return mixed value(s) from current cookie
     */
    public static function getCookies($name = NULL)
    {
        if ($name == NULL) {
            // Add condition return false if cookie not set
            return isset($_COOKIE) ? $_COOKIE : FALSE;
        } else {
            // Add condition return false if cookie name not found
            return isset($_COOKIE[$name]) ? $_COOKIE[$name] : FALSE;
        }
    }

    /**
     * Destroying cookie with given name
     * @param string $name cookie name
     */
    public static function destroyCookies($name)
    {
        unset($_COOKIE[$name]);
        setcookie($name, NULL, -1);
    }

    public static function getUserID()
    {
        $session = Session::get(Config::get('constant.SESSION_LOGIN'));
        return $session['id'];
    }

    public static function getUserName()
    {
        $session = Session::get(Config::get('constant.SESSION_LOGIN'));
        return isset($session['username']) ? $session['username'] : null;
    }

    public static function getUserRoles()
    {
        $session = Session::get(Config::get('constant.SESSION_LOGIN'));
        return $session['role'];
    }

    public static function getFullName()
    {
        $session = Session::get(Config::get('constant.SESSION_LOGIN'));
        return isset($session['full_name']) ? $session['full_name'] : null;
    }

    public static function getPassword()
    {
        $session = Session::get(Config::get('constant.SESSION_LOGIN'));
        return $session['password'];
    }

    public static function getEmail()
    {
        $session = Session::get(Config::get('constant.SESSION_LOGIN'));
        return $session['email'];
    }

    public static function isDocComplete()
    {
        $company = \App\Models\User::where('name', Base::getUsername())
            ->first()
            ->company;

        $isComplete = $company->siup_alf_id
            && $company->tdp_alf_id
            && $company->npwp_alf_id
            && $company->akta_alf_id
            && $company->ktp
            && $company->sk_lokasi_usaha
            && $company->sk_kemenhum
            && $company->ba_negosiasi
            && $company->lapkug
            && $company->sp_tidak_pailit
            && $company->izin_penyelenggaraan_jaringan
            && $company->perj_konsorsium;

        return $isComplete;
    }

    public static function isValidEmail($email)
    {
        return (strpos($a, '@') !== false);
    }
}
