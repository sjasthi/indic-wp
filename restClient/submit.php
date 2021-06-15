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
        $word = $_POST['word'];
        $language = $_POST['language'];

        //Resourse Address        
        $url = "http://localhost/indic-wp/api/isPalindrome.php?string=$word&language=$language";

        //Send request to Resourse        
        $client = curl_init($url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

        //get response from resource
        $response = curl_exec($client);

        //echo $response;

        //decode        
        $result = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);
        // var_dump($result);

        $data = $result['data'] ? 'true' : 'false';
        //$data = implode($result['data']);

        echo "The word is " . $word;
        echo "<br>Is the word a palindrome? " . $data;
    }
    ?>
</body>

</html>