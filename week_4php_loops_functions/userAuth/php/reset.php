<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    $fp=fopen("..\storage\users.csv",'r');
    
    $result=false;
 
    while(($data=fgetcsv($fp,1000,','))!=false ){
        $data;
        if ($data[1]==$email) {
            
            $data[2]=$newpassword;
            $result=true;
            
        }
        $arr[]=$data;
    }
    fclose($fp);
    if($result==true){
    $fw=fopen("..\storage\users.csv",'w');
    foreach($arr as $field){
        fputcsv($fw,$field);
        }
        fclose($fw);
        echo 'User password updated successfully';
    }elseif($result==false){
        echo 'User does not exist';
    }
}


