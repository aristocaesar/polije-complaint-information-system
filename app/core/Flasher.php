<?php

class Flasher
{

    public static function setMessage($title = "", $message = "", $action = "", $redirect = "")
    {
        $_SESSION["flash"] = [
            "title" => $title,
            "message" => $message,
            "action" => $action,
            "redirect" => $redirect
        ];
    }

    public static function Flash()
    {
        if (isset($_SESSION["flash"])) {
            echo '
            <script type="text/javascript">
            Swal.fire(
                "' . $_SESSION["flash"]["title"] . '",
                "' . $_SESSION["flash"]["message"] . '",
                "' . $_SESSION["flash"]["action"] . '"
            );  
            </script>
            ';
            // setelah alert ditampilkan, hapus session
            unset($_SESSION["flash"]);
        }
    }

    public static function Redirect($to = "", $time = 3)
    {
        $times = 1000 * 3;
        $_SESSION["redirect"] = '
        <script>
        setTimeout(() => {
            window.location.href = "' . BaseURL() . $to . '";
        }, ' . $times . ')
        </script>
        ';
    }
}
