<?php
include("db.php");
if(isset($_GET['q']) && $_GET['q']!="") :
    $data = mysqli_real_escape_string($MySQLi_CON,$_GET['q']);
    $keyword =  trim(preg_replace('/\s+/',' ',$data));
    $sql=$MySQLi_CON->query("SELECT distinct `b_id` FROM `donarregister` WHERE `b_id` LIKE '%$keyword%' ");
    $sql1=$MySQLi_CON->query("SELECT distinct * FROM `donarregister` WHERE b_id LIKE '%$keyword%'");
    $count=mysqli_num_rows($sql);
    $count1=mysqli_num_rows($sql1);
    if($count!=0) :
        $json_data=array();
        foreach ($sql as $key => $value):
            $json_data[] = $value['b_id'];
        endforeach;
        echo json_encode($json_data);
    else :
        echo 0;
    endif;
endif;
?>