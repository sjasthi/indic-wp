<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parser | Indic-WP</title>

        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script src="js/parser.js"></script>
    </head>

    <body>
        <div class="header">
            <div class="navbar bg-dark">
                <div class="container">
                    <span class="navbar-brand text-light">Parser</span>
                    <div class="d-flex">
                        <a class="btn btn-outline-secondary" href="index.php">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="col">
                <div id="input-header" class="container my-5 col">
                    <p class="h4 text-center">Indic Parser: Please input your text below.</p>
                    <select id="language-select" class="form-select mt-3">
                        <option value="english" selected>English</option>
                        <option value="telugu">Telugu</option>
                    </select>
                </div>
                <div id="input-container" class="container my-5">
                    <textarea id="parsing-input" class="form-control" rows="10"></textarea>
                </div>
                <div id="buttons" class="container mb-4 d-flex justify-content-center">
                    <button onclick="updateParseTable()" class="btn btn-outline-secondary w-25">Process</button>
                </div>
                <div id="table-container" class="container">
                    <table id="parsed-table">
                        <thead>
                            <tr>
                                <th>Word</th>
                                <th>Length</th>
                                <th>Frequency</th>
                            </tr>
                        </thead>
                        <tbody id="word-entries">
                            <tr>
                                <td>Enter some text...</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>