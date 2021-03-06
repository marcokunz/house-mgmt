<?php


namespace config;

class Config
{
    protected static $iniFile = "config/config.env";
    protected static $config = [];

    public static function init(){
        // checks if local config.env exists
        if(file_exists(self::$iniFile)) {
            $databaseConfig = parse_ini_file(self::$iniFile, true)["database"];
            self::$config["pdo"]["dsn"] = $databaseConfig ["driver"] . ":host=" . $databaseConfig ["host"] . ";port=" . $databaseConfig["port"] . "; dbname=" . $databaseConfig ["database"] . "; sslmode=require";
            self::$config["pdo"]["user"] = $databaseConfig["user"];
            self::$config["pdo"]["password"] = $databaseConfig["password"];
        // gets config variable from Heroku
        }elseif(isset($_ENV["DATABASE_URL"])){
            $dbopts = parse_url(getenv('DATABASE_URL'));
            self::$config["pdo"]["dsn"] = "pgsql" . ":host=" . $dbopts["host"] . ";port=" . $dbopts["port"] . "; dbname=" . ltrim($dbopts["path"],'/') . "; sslmode=require";
            self::$config["pdo"]["user"] = $dbopts["user"];
            self::$config["pdo"]["password"] = $dbopts["pass"];
        }
    }

    public static function pdoConfig($key){
        if(empty(self::$config))
            self::init();
        return self::$config["pdo"][$key];
}

}