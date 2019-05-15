
<?php
include "include/connection.php"

$request=$_REQUEST;
$col =array(
    0   =>  'plot_Id',
    1   =>  'ep_plot_Id',
    2   =>  'exploratory',
    3   =>  'latitude',
    4   =>  'longitude',
    5   =>  'landuse'
);  //create column like table in database

$sql ="SELECT * FROM plots";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM plots WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (plot_Id Like '".$request['search']['value']."%' ";
    $sql.=" OR ep_plot_Id Like '".$request['search']['value']."%' ";
    $sql.=" OR exploratory Like '".$request['search']['value']."%' ";
    $sql.=" OR longitude Like '".$request['search']['value']."%' ";
    $sql.=" OR latitude Like '".$request['search']['value']."%' ";
    $sql.=" OR landuse Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //plot_Id
    $subdata[]=$row[1]; //ep_plot_Id
    $subdata[]=$row[2]; //exploratory
    $subdata[]=$row[3]; //latitude
    $subdata[]=$row[4]; //longitude
    $subdata[]=$row[5]; //landuse
                                    //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[1].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>
                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</button>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>




<?php/*
include "include/ajax.php";
include "include/connection.php";
extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-light table-sm"   width="100%" cellspacing="0">
            <thead class="thead-light">
            <tr>
							<th class="th-sm">No.</th>
							<th class="th-sm">plot_Id</th>
							<th class="th-sm">ep_plot_Id</th>
							<th class="th-sm">exploratory</th>
							<th class="th-sm">latitude</th>
							<th class="th-sm">longitude</th>
							<th class="th-sm">landuse</th>
						</tr>
            </thead>';

	$displayquery = " SELECT * FROM `plots` ";
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {

			$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['plot_Id'].'</td>
				<td>'.$row['ep_plot_Id'].'</td>
				<td>'.$row['exploratory'].'</td>
				<td>'.$row['latitude'].'</td>
        <td>'.$row['longitude'].'</td>
        <td>'.$row['landuse'].'</td>
        <td>
					<button onclick="GetDetails('.$row['ep_plot_Id'].')" class="btn btn-success" >Edit</button>
				</td>
				<td>
					<button onclick="Deleteplot('.$row['ep_plot_Id'].')" class="btn btn-danger" >Delete</button>
				</td>
</tr>';
    		$number++;

		}
	}
	 $data .= '</table>';
    	echo $data;

}

//adding records in database
if(isset($_POST['plot_Id']) &&  isset($_POST['ep_plot_Id']) && isset($_POST['exploratory']) && isset($_POST['latitude']) && isset($_POST['longitude'])  &&  isset($_POST['landuse']))
	{
		$query = " INSERT INTO `plots`( `plot_Id`, `ep_plot_Id`, `exploratory`, `latitude`,`longitude`,`landuse`) VALUES('$plot_Id','$ep_plot_Id', '$exploratory', '$latitude', '$longitude','$landuse')   ";

		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}


	}
	// pass ep_plot_Id on the modal
if(isset($_POST['ep_plot_Id']) && isset($_POST['ep_plot_Id']) != "")
{
    $ep_plot_Id = $_POST['ep_plot_Id'];
    $query = "SELECT * FROM plots WHERE ep_plot_Id = '$ep_plot_Id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }

    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $response = $row;
        }
    }
  //
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
   //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode():

    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
// update table//

if(isset($_POST['update_ep_plot_Id']))
{
    // get values
    $plot_Id=$_POST['plot_Id'];
    $update_ep_plot_Id = $_POST['update_ep_plot_Id'];
    $exploratory = $_POST['exploratory'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $landuse = $_POST['landuse'];
    $query = "UPDATE plots SET plot_Id = '$plot_Id', exploratory = '$exploratory', latitude = '$latitude', longitude = '$longitude', landuse = '$landuse'  WHERE ep_plot_Id = '$update_ep_plot_Id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }
}

if(isset($_POST['deleteid']))
{

	$ep_plot_Id = $_POST['deleteid'];

	$deletequery = " delete from plots where ep_plot_Id ='$ep_plot_Id' ";
	if (!$result = mysqli_query($conn,$deletequery)) {
        exit(mysqli_error());

}

}
*/
?>




<?php/*
## Database configuration
include 'include/connection.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (ep_plot_Id like '%".$searchValue."%' or
        plot_Id like '%".$searchValue."%' or
        longitude like'%".$searchValue."%'or
        latitude like'%".$searchValue."%'or
        landuse like'%".$searchValue."%'or
        exploratory like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from plots");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($con,"select count(*) as allcount from plots WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from plots WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array(
      "plot_Id"=>$row['plot_Id'],
      "ep_plot_Id"=>$row['ep_plot_Id'],
      "exploratory"=>$row['exploratory'],
      "latitude"=>$row['latitude'],
      "longitude"=>$row['longitude'],
      "landuse"=>$row['landuse']
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecordwithFilter,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
);

echo json_encode($response);*/
?>
