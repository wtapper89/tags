<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture all form data
    $data = [
        'heading' => $_POST['heading'] ?? '',
        'user' => $_POST['user'] ?? '',
        'dept' => $_POST['dept'] ?? '',
        'cciTag' => $_POST['cciTag'] ?? '',
        'utkTag' => $_POST['utkTag'] ?? '',
        'date' => $_POST['date'] ?? '',
        'item' => $_POST['item'] ?? '',
        'ticket' => $_POST['ticket'] ?? '',
        'location' => $_POST['location'] ?? ''
    ];

    // Generate HTML
    echo <<<HTML
    <html>
    <head>
        <style>
            /* Include all print CSS styles from index.html */
            @page {
                size: 100mm 62mm landscape;
                margin: 0;
            }
            body {
                margin: 0;
                font-family: 'Gotham', sans-serif;
            }
            .tag-preview {
                width: 100mm;
                height: 62mm;
                padding: 5mm;
                box-sizing: border-box;
            }
            .tag-header {
                font-family: 'Gotham Bold', sans-serif;
                font-size: 24pt;
                text-align: center;
                margin-bottom: 3mm;
            }
            .tag-field {
                display: flex;
                align-items: center;
                font-size: 12pt;
                margin-bottom: 2mm;
            }
            .underline {
                border-bottom: 2px solid #000;
                flex-grow: 1;
                margin-left: 2mm;
            }
            .notes-section {
                border-left: 2px solid #000;
                padding-left: 3mm;
                font-family: 'Gotham Light', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="tag-preview">
            <div class="tag-header">{$data['heading']}</div>
            <div class="tag-content">
                <div class="tag-fields">
                    <div class="tag-field"><span>User:</span><span class="underline">{$data['user']}</span></div>
                    <div class="tag-field"><span>Dept:</span><span class="underline">{$data['dept']}</span></div>
                    <div class="tag-field"><span>CCI Tag:</span><span class="underline">{$data['cciTag']}</span></div>
                    <div class="tag-field"><span>UTK Tag:</span><span class="underline">{$data['utkTag']}</span></div>
                    <div class="tag-field"><span>Date:</span><span class="underline">{$data['date']}</span></div>
                    <div class="tag-field"><span>Item:</span><span class="underline">{$data['item']}</span></div>
                    HTML;

            if (!empty($data['ticket'])) {
                echo <<<HTML
                    <div class="tag-field"><span>Ticket #:</span><span class="underline">{$data['ticket']}</span></div>
                    HTML;
            }

            if (!empty($data['location'])) {
                echo <<<HTML
                    <div class="tag-field"><span>Location:</span><span class="underline">{$data['location']}</span></div>
                    HTML;
            }

            echo <<<HTML
                </div>
                <div class="notes-section"></div>
            </div>
        </div>
    </body>
    </html>
    HTML;
}
?>