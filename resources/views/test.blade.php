<html>

   <head>
      <title>Reading a file using PHP</title>
   </head>
   
   <body>
      <?php 
      $ar=App\Models\Groupe::all();

?><?php 
$i=1;
foreach ($ar as $key) {
// echo '<p>insert into Groupe(nom,niveau)values('.$i.',null);</p>';
// echo "<p>(".$i.",'".$key->nom."');</p>";
    $i++;

}

?>
<?PHP
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgets($file, 1024);
        // echo fgetcs($file, 1024);
    }
    fclose($file);
    return $line;
}

$csv = 'Special.txt';
$csv = read($csv);
$u=array();
// $u2=array();
// for ($i=0; $i < count($csv); $i++) { 
//     // echo '<p>';
//     if(in_array($csv[$i],$u)==false){
//         $u[]=$csv[$i];
//     }
// // echo $csv[$i];
// // echo '</p>';

// }
// for ($i=0; $i < count($u); $i++) { 
//     if($u[$i]!="''"){
//         echo '<p>';
//         echo "insert into Groupe(id,nom)('".($i+1)."','".trim($u[$i])."');";
// echo '</p>';
// }

// }
// foreach ($csv as $key => $value) {
// echo $key;
// }
// echo print_r($csv);
for ($i=0; $i < count($csv); $i++) { 
    if(in_array(strtoupper(trim($csv[$i])),$u)==false){
    $u[]=strtoupper(trim($csv[$i]));
    $u2[]=$csv[$i];
    }
}
$test=array();
for ($i=0; $i <count($u2) ; $i++) { 
    echo '<p>';
    $str="";
   $arr=explode("/",trim($u2[$i]));
   if(count($arr)==2){
    $str=trim($arr[0])."/".trim($arr[1]);
   }else{
    $str=$arr[0];
   }
   if(in_array($str,$test)==false){
    $test[]=$str;
   }
   if($str!="'"){
    
}

    echo '</p>';
}
for ($i=0; $i <count($test) ; $i++) { 
    # code...
    echo '<p>';
    $str=$test[$i];
    echo "insert into Specialisation(id,nom)('".($i+1)."','".$str."');";
    echo '</p>';

    // echo 
}
// print_r($u);
?>
      
      
   </body>
</html>