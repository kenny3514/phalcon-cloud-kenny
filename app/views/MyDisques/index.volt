
<h3><?php echo "Mes disques -> ".$userinfo?></h3>
{{q['glButton1']}}


<div class="list-group">


    <?php
$i=0;

$occupation = array();
foreach($histo as $hist){

array_push($occupation,$hist->occupation);
}

foreach($disques as $disque){

echo "
<a class='list-group-item' >$disque->nom <span class='label-default' style='color:white;'>$occupation[$i]</span></a>";
    if($i==0){

?>
    {{q['pb1']}}
    {{q['Open']}}
    <?php
    }
    $i++;
    }
    ?>
    {{q['pb2']}}
    {{q['Open']}}


</div>

