<?php


class FileUploadHandler
{

    function __construct()
    {

    }

    /**
     * Handles the process of uploading
     */
    public function upload()
    {
        if ($this->is_upload_btn_pressed()) {
            if ($this->is_file_extension_correct()) {
                if ($this->is_upload_successful()) {
                    if ($this->is_file_size_okay()) {
                        $this->store_file();
                        $this->redirect('../websites/profile.php');
                    } else {
                        echo "A fájlméret túl nagy! <br/>";
                    }
                } else {
                    echo "Hiba történt a fájl feltöltése közben! <br/>";
                }
            } else {
                echo "Nem megfelelő kiterjesztés! <br/>";
            }
        }

        return false;
    }


    /**
     * Ha a feltöltés gomb meg lett nyomva
     * @return bool
     */
    function is_upload_btn_pressed(): bool
    {
        if (isset($_POST["upload-btn"]))
            return true;

        return false;
    }


    /**
     * Ha a fájl kiterjesztése szerepel az engedélyezett kiterjesztések között…
     * @return bool
     */
    function is_file_extension_correct(): bool
    {
        $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];

        // fájl kiterjesztésének lekérdezése
        $kiterjesztes = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $_SESSION['filename'] = $_FILES["image"]["name"];


        if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek))
            return true;

        return false;
    }


    /**
     * Sikeres feltöltés…
     * @return bool
     */
    function is_upload_successful(): bool
    {
        if ($_FILES["image"]["error"] === 0)
            return true;
        return false;
    }


    /**
     * Fájl méretének ellenőrzése, MAX 10MB
     * @return bool
     */
    function is_file_size_okay(): bool
    {
        $maximum_size = 10 * 1000 * 1000; // 10MB

        if ($_FILES["image"]["size"] < $maximum_size)
            return true;
        return false;
    }


    /**
     * Save file to specified directory and logs a copy of it
     * directy: "../userdata/users/".$username. "/profile_pictures/"
     */
    function store_file()
    {
        $username = $_SESSION['username'];
        // útvonal (a fájl az images mappába kerül az eredeti fájlnévvel)
        $dest_copy = "../userdata/users/" . $username . "/profile_pictures/" . $_FILES["image"]["name"];
        $dest_active = "../userdata/users/" . $username . "/profile_pictures/" . "active.png";

        move_uploaded_file($_FILES["image"]["tmp_name"], $dest_active);

        copy($dest_active, $dest_copy);
    }


    /**
     * Redirect to specified path
     * @param string $path
     */
    function redirect(string $path)
    {
        header('Location: ' . $path);

    }
}





