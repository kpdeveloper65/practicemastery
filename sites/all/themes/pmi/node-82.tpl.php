<style type="text/css">

    table {
    width:90%;
    border-top:1px solid #000000;
    border-right:1px solid #000000;
    margin:1em auto;
    border-collapse:collapse;
    }
    td {
    color:#000000;
   border-bottom:1px solid #000000;
   border-left:1px solid #000000;
  padding:.3em 1em;
   text-align:center;
   }
  th{
    color:#000000;
   border-bottom:1px solid #000000;
   border-left:1px solid #000000;
  padding:.3em ;
   text-align:center;
   }
   .tr.odd td {
  background:#000000
   }
 .tr.odd .column1 {
    background:#000000;
   }
  .column1 {
    background:#000000;
   }
.upcomcls{
width: 585px;
/*margin-left:246px;*/
}

#table-2 tr.even, tr.odd, tbody th {
    border-bottom-color: #000000;
    border-bottom-style: solid ;
    border-bottom-width: 1px;
    border-top-color: #000000 ;
    border-top-style: solid ;
    border-top-width: 1px;
    border-left-style-value: solid ;
    border-left-width:1px;
    border-left-color: #000000;
}
</style>



<?php

global $user;

//  User starts Here
/*if ($user->uid == 1 ) {
  $user = user_load(177);
  print "User 177 is being used as an example";
}*/



 	

$riddata = db_result(db_query('SELECT rid FROM {users_roles} WHERE uid = %d', $user->uid));

?>



<div >
<h2 >Courses Enrolled</h2>
<table id="table-2">
	<tr>
		<th>Name</th>
		<th>Details</th>
		<th>Start Dates</th>
		<th>End Dates</th>
		<th>Venue</th>
		<th>Status</th>
	</tr>
	<?php
	//code start by chenna
	$node_sql1="SELECT * FROM `uc_orders` AS a, `uc_products` AS b, `uc_order_products` AS c, `uc_roles_products` AS d
		    WHERE a.`uid` = '".$user->uid."'
		    AND a.`order_id` = c.`order_id`
		    AND c.`nid` = d.`nid`
		    AND a.`order_status` = 'completed'
		    GROUP BY a.`order_id`";

	$node_query1=db_query($node_sql1);
	while($node_id1=db_fetch_object($node_query1)){
		$node_detailes=node_load($node_id1->nid);
		echo "<tr>";
		echo "<td><a href='/node/".$node_id1->nid."'>". $node_detailes->title."</a></td>";
                 $body_details= (strlen($node_detailes->body)>51)?substr($node_detailes->body,0,51)."..." :$node_detailes->body;
		echo "<td><a href='/node/".$node_id1->nid."'>".$body_details."</a></td>";
		echo "<td>" . date('d-m-Y',$node_id1->created)."</td>";
		$duration_sql1="SELECT `duration` FROM `uc_roles_products`  WHERE `nid`='".$node_id1->nid."'";
		$duration_res1=db_query($duration_sql1);
		//$duration in days
		$duration1=db_fetch_object($duration_res1);
		$endtime=strtotime("+".$duration1->duration." days",$node_id1->created);  
		$enddate = date('d-m-Y',$endtime);
		$present_date=date('Y-m-d');
		$present_time=strtotime($present_date);			  
		echo "<td>" . $enddate."</td>";
		echo "<td>-</td>";
		if($present_time > $endtime){
			echo "<td>" .Completed."</td>";
		}else{
			echo "<td>" .Inprogress."</td>";
		}
		echo "</tr>";
	}
	//code ended
	?>

</table>

<?php 
$sql_role="SELECT * FROM `users_roles` WHERE uid ='".$user->uid."'";
$query_role=db_query($sql_role);
$my_role=db_fetch_object($query_role);
if($my_role->rid == 4){?>

  <div>
    You are enrolled as a Practice Mastery Institute member. If you would like to enrol in one of our courses (and still get all the benefits of being a member) <a href='/catalog/38'>click here</a>.
  </div>
<?php } ?>
</div>


<!--started for courses-->
<br/>
<div >
<h2 >Upcoming Courses</h2>
<table id="table-2">
<tr>
				
	<th>Name</th>
	<th>Details</th>
	<th>Start Dates</th>
	<th>Vanue</th>
	<th>Enrollment</th>
	
				
</tr>


<?php
$enroll="Enroll Now";
$queryuc='SELECT * FROM content_type_upcoming_courses where field_course_workshop_muc_value = 1 ';
$sqluc=db_query($queryuc);

while($rowuc=db_fetch_array($sqluc))
{
					 $des1=$rowuc['field_muc_description_value'];
						 $des2 = substr($des1,0,200);
						   echo "<tr>";
						   echo "<td>". $rowuc['field_muc_name_value']."</td>";
				
						     echo "<td>"."<a href='/node/".$node_id1->nid."'>".$des2.'&nbsp;Read more...</a>'."</td>";
						   echo "<td>" .$rowuc['field_muc_dates_value']."</td>";
						   echo "<td>" .$rowuc['field_muc_vanue_value']."</td>";
				 echo "<td><a href=\"/catalog/38 \" >".$enroll."</a></td>";
						   echo "</tr>";

						  


}

?>


</table>






</div>
	<div class="clear"></div>

<!-- started workshops -->

<div >
<h2 >Upcoming Workshops and Webinars</h2>
<table id="table-2">
<tr>
				
	<th>Name</th>
	<th>Details</th>
	<th>Start Dates</th>
	<th>Vanue</th>
	<th>Enrollment</th>
	
				
</tr>


<?php
$enroll="Enroll Now";
$queryucw='SELECT * FROM content_type_upcoming_courses where field_course_workshop_muc_value=2 ';
$sqlucw=db_query($queryucw);


while($rowucw=db_fetch_array($sqlucw))
{
	$upcomingwaw_details= (strlen($rowucw['field_muc_description_value'])>51)?substr($rowucw['field_muc_description_value'],0,51) ."..." :$rowucw['field_muc_description_value'];				 
						 

						   echo "<tr>";
						   echo "<td>". $rowucw['field_muc_name_value']."</td>";
						   echo "<td>" .$upcomingwaw_details."</td>";
						   echo "<td>" .$rowucw['field_muc_dates_value']."</td>";
						   echo "<td>" .$rowucw['field_muc_vanue_value']."</td>";
				 echo "<td><a href=\"/catalog/37 \" >".$enroll."</a></td>";
						   echo "</tr>";
						  


}

?>
</table>
</div>

