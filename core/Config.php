<?php

namespace Core;

class Config {
  private static $config = [
    'version'                 => '0.0.1',
    'root_dir'                => '/cms/',    // se la dau / trong live server (path)
    'default_controler'       => 'Blog',    // default home controler
    'default_layout'          => 'default', // default layout that is used
    'default_site_title'      => 'Freeskills', // Default site title
    'db_host'                 => '127.0.0.1',   // Db host use IP adress not domain (quick access to db)
    'db_name'                 => 'cms',       // DB name 
    'db_user'                 => 'root',      // DB user
    'db_pasword'              => '',          // DB password
    'login_cookie_name'       => 'fhsdfs3424njsdf'    // Login cookie name
  ];

  public static function get ($key) {       //get the value inside of Config.
    return array_key_exists($key, self::$config)? self::$config[$key]  : NULL;
  }//kiem tra xem key or index co ton tai trong array hay khong. ham tra ra ket qua true or false.
  //neu true tra ra value, neu false tra ra null.
}