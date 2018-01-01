<?php
/**
 * Created by PhpStorm.
 * User: lwy
 * Date: 2017/12/11
 * Time: 9:28
 *
 * @param $user_email
 * @return string
 */
function getAbsUserPath($user_email){
    $path = base_path().'/app/public/images/usr/';
//    return $path . '/usr/' . $user_email;
    return $path . $user_email;
}

function getRelativeUserPath($user_email){
    return '/images/usr/' . $user_email;
}

function authById($id){
    return \Illuminate\Support\Facades\Auth::user()->id==$id;
}

