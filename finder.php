<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finder | Indic-WP</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="header">
        <div class="navbar bg-dark">
            <div class="container">
                <span class="navbar-brand text-light">Finder</span>
                <div class="d-flex">
                    <a class="btn btn-outline-secondary" href="index.php">Go Back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="col">
            <br>
            <p class="h4 text-center">Indic Finder: Please provide your inputs below.</p>
            <div id="input-header" class="container my-3 d-flex justify-content-center">
                <div class="col-auto mx-3">
                    <label for="language-select">Language:</label>
                    <select id="language-select" class="form-select mt-3">
                        <option value="english" selected>English</option>
                        <option value="telugu">Telugu</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="input-text">Input to search:</label>
                    <input type="text" name="input-text" id="input-text" class="form-control mt-3">
                </div>
            </div>
            <div id="input-container" class="container my-3">
                <textarea id="text-to-compare" class="form-control" rows="10" ></textarea>
            </div>
            <div id="buttons" class="container mb-4 d-flex justify-content-center">
                <button id="process" class="btn btn-outline-primary w-25">Process</button>
            </div>
            <p class="h6 text-center">Matches Found:</p>
            <div id="table-container" class="container">
                <textarea id="finder-matches" class="form-control" rows="10" disabled></textarea>
            </div>
        </div>
    </div>
    <script src="js/finder.js"></script>
</body>

</html>