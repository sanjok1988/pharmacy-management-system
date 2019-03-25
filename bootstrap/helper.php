<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (!function_exists('isLoggedIn')) {
    function isLoggedIn()
    {
        if (Auth::user()) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('setCookie')) {
    function setCookie($cookieName, $cookieValue)
    {
        setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/"); //name,value,time,url
    }
}

if (!function_exists('getCookie')) {
    function getCookie(Request $request, $name)
    {
        return $request->cookie($name);
    }
}


if (!function_exists('getLang')) {
    function getLang(Request $request)
    {
        return getCookie($request, $name ='lang');
    }
}

if (!function_exists('setLang')) {
    function setLang($lang)
    {
        return setCookie("lang", $lang);
    }
}

if (!function_exists('setNewsLang')) {
    function setNewsLang($lang)
    {
        return Session::put("news_lang", $lang);
    }
}

if (!function_exists('getNewsLang')) {
    function getNewsLang()
    {
        if ($lang = Session::get("news_lang")) {
            return $lang;
        }
        return "en";
    }
}

function getUserIP()
{
    $ipaddress = '';
    //whether ip is from share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from remote address
    else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

    return $ipaddress;
}
