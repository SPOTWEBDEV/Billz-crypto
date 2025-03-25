<?php
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_POST['gen_masterclass'])) {
    $name = $_POST['name'];
    $date = date('M d, Y');
    $html = '<!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        </head>
        <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            margin: 0;
            padding: 0;
            border: 1mm solid #991B1B;
            height: 188mm;
            font-family: Helvetica, sans-serif;
        }

        .border-pattern {
            position: absolute;
            left: 4mm;
            top: -6mm;
            height: 200mm;
            width: 267mm;
            border: 1mm solid #991B1B;
            /* http://www.heropatterns.com/ */
            background-color: #d6d6e4;
        }

        .content {
            position: absolute;
            left: 10mm;
            top: 10mm;
            height: 178mm;
            width: 245mm;
            border: 1mm solid #991B1B;
            background: white;
        }

        .inner-content {
            border: 1mm solid #991B1B;
            margin: 4mm;
            padding: 10mm;
            height: 148mm;
            text-align: center;
        }

        h1 {
            text-transform: uppercase;
            font-size: 48pt;
            margin-bottom: 0;
        }

        h2 {
            font-size: 24pt;
            margin-top: 0;
            padding-bottom: 1mm;
            display: inline-block;
            border-bottom: 1mm solid #991B1B;
        }

        h2::after {
            content: "";
            display: block;
            padding-bottom: 4mm;
            border-bottom: 1mm solid #991B1B;
        }

        h3 {
            font-size: 20pt;
            margin-bottom: 0;
            margin-top: 10mm;
        }

        p {
            font-size: 16pt;
        }

        .badge {
            width: 40mm;
            height: 40mm;
            position: absolute;
            right: 10mm;
            bottom: 10mm;
        }
        </style>

        <body>
        <div class="border-pattern">
            <div class="content">
            <div class="inner-content">
                <h1>Certificate</h1>
                <h2>of Completion</h2>
                <h3>This Certificate Is Proudly Presented To</h3>
                <p>' . $name . '</p>
                <h3>Has Completed</h3>
                <p>Trading Masterclass</p>
                <h3>On</h3>
                <p>' . $date . '</p>
                <div class="badge">
                </div>
            </div>
            </div>
        </div>
        </body>
        </html>';

    // $options = new Options();
    // $options->set('defaultFont', 'Helvetica');
    // $options->set('dpi', '120');
    // $options->set('enable_html5_parser', true);

    $dompdf = new Dompdf;
    $dompdf->loadHtml($html);
    // (Optional) Setup the paper size and orientation 'portrait' or 'landscape'
    $dompdf->setPaper('A4', 'potrait');
    // Render the HTML as PDF
    $dompdf->render();
    // Output the generated PDF to Browser
    $dompdf->stream("welcome.pdf", [
        'compress' => true,
        'Attachment' => false,
    ]);
}
