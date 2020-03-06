<?php
if ($_POST['url']) {
    // Here you'd better put some logic to check that $_POST['url'] is a correct url before use it
    $image = file_get_contents($_POST['url']);

    if ($image) {
        // Put downloaded image on your server
        $file = fopen('./images/imagename.jpeg', 'w');
        fwrite($file, $image);
        fclose($file);


        // $temp = explode(".", $image);
        // $newfilename = round(microtime(true)).'.'.end($temp);
        // $destinationFilePath = './images/'.$newfilename;
        // move_uploaded_file($_FILES['file']['tmp_name'],$destinationFilePath);
    }
    
    /** 
     * Now your code needs to echo one of the following:
     * string Url of an uploaded image on your server
     * bool False if it failed
     * 
     * To avoid bool to string conversion during output response needs to be sent as JSON
     */
    // $response = ($image) ? array('/images/imagename.jpeg') : array(false);
    // echo json_encode($response);
}