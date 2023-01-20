<?php


trait Helper
{
    public function uploadImage($files, $target_dir)
    {

        $errors["error"] = [];

        $check = getimagesize($files["tmp_name"]);
        if($check !== false) {

        } else {
            $errors["error"]["image_size"] = "File is an image - " . $check["mime"] . ".";
        }

        $target_file = $target_dir . basename($files["name"]);


        // Check if file already exists
        if (file_exists($target_file)) {
            $errors["error"]["file_exist"] = "File already exists";
        }

        if ($files["size"] > 500000000) {
            $errors["error"]["file_size"] = "Sorry, your file is too large.";
        }


        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
        {
            $errors["error"]["file_types"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }


        if(count($errors["error"]) > 0) {
            return $errors;
        }

        if (move_uploaded_file($files["tmp_name"], $target_file)) {
            return htmlspecialchars(basename($files["name"]));
        } else {
            return false;
        }
    }
}