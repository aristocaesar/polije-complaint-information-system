<?php
// Upload Functions
function UploadFile($file = null, $name = "", $limitSize = 0, $fileType = [], $directory = "")
{
    // direktory
    $dirFile = dirname(__DIR__) . "/public/upload/assets/images/";
    if ($directory != "") {
        $dirFile = dirname(__DIR__) . "/public/upload/assets/" . $directory;
    }

    // check name
    $nameFile = $file["foto"]["name"];
    if ($name != "") {
        $nameFile = explode(".", $file["foto"]["name"]);
        $extensionFile = end($nameFile);
        $nameFile = $name . "." . $extensionFile;
    }

    // check  limit size
    $sizeFile = $file["foto"]["size"];
    if ($limitSize != 0) {
        if ($sizeFile >= $limitSize) {
            throw new Exception("Ukuran file terlalu besar!");
        }
    }

    // check mime type
    if ($fileType != []) {
        if (!in_array($file["foto"]["type"], $fileType)) {
            throw new Exception("Jenis file tidak didukung!");
        }
    }

    // upload 
    if (!move_uploaded_file($file["foto"]["tmp_name"], $dirFile . "/" . $nameFile)) {
        throw new Exception("Failed Upload!");
    };
}

function RemoveFileUpload($directory = "")
{
    if (!empty($directory)) {
        $dir = explode("/", $directory);
        $fileName = end($dir);
        if ($fileName != "USER-default.png") {
            if (file_exists(dirname(__DIR__) . "/public/upload/assets/" . $directory)) {
                unlink(dirname(__DIR__) . "/public/upload/assets/" . $directory);
            }
        }
        return true;
    } else {
        return false;
        // throw new Exception("Terjadi kesalahan dalam menghapus file!");
    }
}
