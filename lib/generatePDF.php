<?php

// include autoloader

// reference the Dompdf namespace
use Dompdf\Dompdf;

class generatePDF
{
    public static function Klasifikasi(String $id, String $judul, String $deskripsi, String $created_at): void
    {
        // remove session pengguna rahasia
        if (isset($_SESSION["p_rahasia"])) {
            unset($_SESSION["p_rahasia"]);
        }
        // instantiate and use the dompdf class
        $dompdf = new Dompdf([
            'enable_remote' => true
        ]);

        $html = '
        <!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {font-family: Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        input[type=text], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
        }

        img{
            width: 250px;
            margin-bottom: 20px;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        .container {
        border-radius: 5px;
        padding: 20px;
        }
        </style>
        </head>
        <body>

        <div class="container">
        <h3>Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember</h3>
        <form>
            <label >ID Laporan</label>
            <input type="text" value=' . $id . '>

            <label >Judul</label>
            <input type="text" value=' . $judul . '>

            <label for="subject">Deskrispi</label>
            <textarea style="height:200px">' . $deskripsi . '</textarea>
            
            <label >Tanggal Terkirim</label>
            <input type="text" value=' . $created_at . '>
        </form>
        <small><i>*Harap simpan dan gunakan ID untuk tracking laporan</i></small>
        </div>

        </body>
        </html>
        ';

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($id . " - Layanan Aspirasi dan Pengaduan Online Politeknik Negeri Jember.pdf",  array("Attachment" => false));
    }
}
