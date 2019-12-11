

<style type="text/css">

    table {
    width:90%;
    border-top:1px solid #e5eff8;
    border-right:1px solid #e5eff8;
    margin:1em auto;
    border-collapse:collapse;
    }
    td {
    color:#678197;
   border-bottom:1px solid #e5eff8;
   border-left:1px solid #e5eff8;
  padding:.3em 1em;
   text-align:center;
   }
  th{
    color:#678197;
   border-bottom:1px solid #e5eff8;
   border-left:1px solid #e5eff8;
  padding:.3em 1em;
   text-align:center;
   }
   .tr.odd td {
  background:#f7fbff
   }
 .tr.odd .column1 {
    background:#f4f9fe;
   }
  .column1 {
    background:#f9fcfe;
   }


</style>
<?php
$cars=array(342,341,343,95,97,96,86,92,91,91,89,89,87,87,88,88,91,86,86);


?>


<div id="survey">


<table id="table">
					
<tr>
				
	<th>Nid</th>
      <th>title</th>
	<th>Content</th>
	<th>Edit</th>
	<th>Delete</th>
	
				
</tr>
<?php
foreach($cars as $k=> $value )
{
$var=$cars[$k];
$nidninter= node_load($var);

 echo "<tr>";
 echo "<td>".$nidninter->nid."</td>";
 echo "<td>".$nidninter->body."</td>";
 echo "<td>".$nidninter->title."</td>";
 echo "<td><a href='/node/".$nidninter->nid."/edit/</a></td>";
 echo "<td><a href='/node/".$nidninter->nid."/edit/</a></td>";
 
}

?>

