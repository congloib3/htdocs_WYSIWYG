<?php
    require_once 'db.php';
    
    $editorContent = $statusMsg = '';
    
    if(isset($_POST['submit'])){
        $editorContent=$_POST['editor1'];

        if(!empty($editorContent)){
            $sql=$db->query("INSERT INTO editor (content, created) VALUES ('".$editorContent."', NOW())");

            if($sql){
                $statusMsg="The editor content has been inserted successfully.";
            }else{
                $statusMsg="Some problem occurred, please try again.";
            }
        }else{
            $statusMsg="Please add content in the editor...";
        }
    }
?>