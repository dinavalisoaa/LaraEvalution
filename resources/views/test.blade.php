<html>

   <head>
      <title>Reading a file using PHP</title>
   </head>

   <body>
      <?php


?><?php
echo Util::slugify("JI io h vgf ytyt ytyu,9i hhi iii jjk hhu yyu h yytyt huy yuyuOPOiu");

// ?>
 <?PHP
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
        // echo fgetcs($file, 1024);
    }
    fclose($file);
    return $line;
}

// $csv = 'Special.txt';
// $csv = read($csv);
// $u=array();
// // $u2=array();
// // for ($i=0; $i < count($csv); $i++) {
// //     // echo '<p>';
// //     if(in_array($csv[$i],$u)==false){
// //         $u[]=$csv[$i];
// //     }
// // // echo $csv[$i];
// // // echo '</p>';

// // }
// // for ($i=0; $i < count($u); $i++) {
// //     if($u[$i]!="''"){
// //         echo '<p>';
// //         echo "insert into Groupe(id,nom)('".($i+1)."','".trim($u[$i])."');";
// // echo '</p>';
// // }

// // }
// // foreach ($csv as $key => $value) {
// // echo $key;
// // }
// // echo print_r($csv);
// for ($i=0; $i < count($csv); $i++) {
//     if(in_array(strtoupper(trim($csv[$i])),$u)==false){
//     $u[]=strtoupper(trim($csv[$i]));
//     $u2[]=$csv[$i];
//     }
// }
// $test=array();
// for ($i=0; $i <count($u2) ; $i++) {
//     echo '<p>';
//     $str="";
//    $arr=explode("/",trim($u2[$i]));
//    if(count($arr)==2){
//     $str=trim($arr[0])."/".trim($arr[1]);
//    }else{
//     $str=$arr[0];
//    }
//    if(in_array($str,$test)==false){
//     $test[]=$str;
//    }
//    if($str!="'"){

// }

//     echo '</p>';
// }
// for ($i=0; $i <count($test) ; $i++) {
//     # code...
//     echo '<p>';
//     $str=$test[$i];
//     echo "insert into Specialisation(id,nom)('".($i+1)."','".$str."');";
//     echo '</p>';

//     // echo
// }
// // print_r($u);
// ?>


   </body>
</html>
