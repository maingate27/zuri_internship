<?php


 $list=array([$_POST['name'],$_POST["useremail"],$_POST['userdob'],$_POST['userGender'],$_POST['userCountry']]);

$fp=fopen('userdata.csv','a');

foreach($list as $field){
    fputcsv($fp,$field);
    }

    fclose($fp);

    print_r($list);
?>