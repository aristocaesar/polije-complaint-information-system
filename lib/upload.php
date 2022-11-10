<?php
// Upload Functions
function UploadFile($file = null, $name = "", $limitSize = 0, $fileType = [], $directory = "")
{
    try {

        // check error
        if ($file["foto"]["error"] != 4) {
            // direktory
            $dirFile = dirname(__DIR__) . "/public/upload/assets/images/";
            if ($directory != "") {
                $dirFile = dirname(__DIR__) . "/public/upload/assets/" . $directory;
            }

            // check name
            $nameFile = $file["foto"]["name"];
            if ($name != "") {
                $exFile = end(explode(".", $file["foto"]["name"]));
                $nameFile = $name . "." . $exFile;
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

            // upload file
            if (move_uploaded_file($file["foto"]["tmp_name"], $dirFile . "/" . $nameFile)) {
                echo "true";
            } else {
                echo "false";
            }
        }
    } catch (Exception $error) {
        return $error;
    }
}

function RemoveFileUpload($directory = "")
{
    try {
        if (!empty($directory)) {
            $fileName = end(explode("/", $directory));
            if ($fileName != "USER-default.png") {
                if (file_exists(dirname(__DIR__) . "/public/upload/assets/" . $directory)) {
                    unlink(dirname(__DIR__) . "/public/upload/assets/" . $directory);
                }
            }
        } else {
            throw new Exception("Terjadi kesalahan dalam menghapus file!");
        }
    } catch (Exception $error) {
        return $error;
    }
}
