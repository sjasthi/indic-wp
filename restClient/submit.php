<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        //Resourse Address        
        $url = "https://www.nguyenanthony.com/rest/$name";

        //Send request to Resourse        
        $client = curl_init($url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

        //get response from resource
        $response = curl_exec($client);

        //echo $response;

        //decode        
        $result = json_decode($response);

        $data = $result->data;

        echo "The price of the book " . $name . " is " . $data;
    }
    ?>
</body>

</html>