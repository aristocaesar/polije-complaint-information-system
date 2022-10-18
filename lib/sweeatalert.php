<?php

class Alert
{
    public static function Success($header = "", $body = "")
    {
        echo '
        <script type="text/javascript">
        Swal.fire(
            "' . $header . '",
            "' . $body . '",
            "success"
        );  
        </script>
        ';
    }
    public static function Error($header = "", $body = "")
    {
        echo '
        <script type="text/javascript">
        Swal.fire(
            "' . $header . '",
            "' . $body . '",
            "error"
        );  
        </script>
        ';
    }
    public static function Info($header = "", $body = "")
    {
        echo '
        <script type="text/javascript">
        Swal.fire(
            "' . $header . '",
            "' . $body . '",
            "info"
        );  
        </script>
        ';
    }
    public static function Warning($header = "", $body = "")
    {
        echo '
        <script type="text/javascript">
        Swal.fire(
            "' . $header . '",
            "' . $body . '",
            "warning"
        );  
        </script>
        ';
    }
    public static function Redirect($to = "", $time = 0)
    {
        echo '
        <script type="text/javascript">
            setTimeout(()=>{
                window.location.href = "' . BaseURL() . $to . '";
            }, ' . $time . ')
        </script>
        ';
    }
}
