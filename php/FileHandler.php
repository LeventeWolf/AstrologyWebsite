<?php

class FileHandler
{
    /* writes admin & guest to accounts.txt (serialize) */
    public function write_default_users_to_file()
    {
        $accounts = [
            ["username" => "admin", "password" => "admin"],
            ["username" => "guest", "password" => "guest"]
        ];

        // kiíratás fájlba (serialize)
        $file = fopen("../userdata/accounts.txt", "a+");
        foreach ($accounts as $account)
            fwrite($file, serialize($account) . "\n");
        fclose($file);
    }

    /* write user to file (serialize) */
    public function write_user_to_file(string $username, string $password)
    {
        $account = ["username" => "$username", "password" => "$password"];

        // kiíratás fájlba (serialize)
        $file = fopen("../userdata/accounts.txt", "a+");
        fwrite($file, serialize($account) . "\n");
        fclose($file);
    }

    /* return with $accounts which stores all the accounts */
    public function read_accounts_from_file()
    {
        // beolvasás fájlból (unserialize)
        $file = fopen("../userdata/accounts.txt", "r");
        $accounts = [];
        while (($line = fgets($file)) !== false)
            $accounts[] = unserialize($line);
        fclose($file);

        return $accounts;
    }


    /**
     * creates unique folder to ../userdata/users/ by username
     * contains: folder for profile_picture && previous usernames
     * @param string $username
     */
    public function create_folder_for_user(string $username)
    {
        mkdir("../userdata/users/" . "$username");

        $this->create_profile_pictures_folder($username);
    }

    private function create_profile_pictures_folder(string $username)
    {
        mkdir("../userdata/users/" . "$username" . "/profile_pictures");
    }


    public static function is_profile_picture_exists($username){
        return file_exists("../userdata/users/".$username."/profile_pictures/active.png");
    }

    public static function get_profile_picture_path($username){
        if (self::is_profile_picture_exists($username)){
            return "../userdata/users/".$username."/profile_pictures/active.png";
        }

        return "../userdata/user_icon/default.png";
    }

    public static function is_profile_picture_exists_maps($username){
        return file_exists("../../userdata/users/".$username."/profile_pictures/active.png");
    }

    public static function get_profile_picture_path_maps($username){
        if (self::is_profile_picture_exists_maps($username)){
            return "../../userdata/users/".$username."/profile_pictures/active.png";
        }

        return "../../userdata/user_icon/grandda.jpg";
    }
}
    


