<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script>/*

$(document).ready(function () {
    readRecords();
	});

	function addRecord(){

		var plot_Id =  $("#plot_Id").val();
    var ep_plot_Id =  $("#ep_plot_Id").val();
		var exploratory =  $("#exploratory").val();
		var latitude =  $("#latitude").val();
		var longitude =  $("#longitude").val();
    var landuse =  $("#landuse").val();

		$.ajax({

			url:"backend.php",
			type:'POST',
			data: {
        plot_Id:plot_Id,
				ep_plot_Id:ep_plot_Id,
				exploratory:exploratory,
				latitude:latitude,
				longitude:longitude,
        landuse:landuse,
			},
			success:function(data, status){
				readRecords();
			},

		});

	}

//Display Records
	function readRecords(){

		var readrecords = "readrecords";
		$.ajax({
			url:"backend.php",
			type:"POST",
			data:{readrecords:readrecords},
			success:function(data,status){
				$('#records_content').html(data);
			},

		});
	}


//delete userdetails //
function Deleteplot(deleteid){

	var conf = confirm("are u sure");
	if(conf == true) {
	$.ajax({
		url:"backend.php",
		type:'POST',
		data: {  deleteid : deleteid},

		success:function(data, status){
			readRecords();
		}
	});
	}
}



function GetDetails(id){
	  $("#update_ep_plot_Id").val(id);
	  $.post("backend.php", {
            id: id
        },
        function (data, status) {
            alert(data);
            //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
            var plot = JSON.parse(data);
            alert(plot);

            $("#plot_Id").val(plot.plot_Id);
            $("#update_ep_plot_Id").val(plot.ep_plot_Id);
        		$("#exploratory").val(plot.exploratory);
        		$("#latitude").val(plot.latitude);
        		$("#longitude").val(plot.longitude);
            $("#landuse").val(plot.landuse);
        }
    );
    $("#update_modal").modal("show");
}




function UpdateDetails() {

  var plot_Id =  $("#update_plot_Id").val();
  var update_ep_plot_Id =  $("#update_ep_plot_Id").val();
  var exploratory =  $("#update_exploratory").val();
  var latitude =  $("#update_latitude").val();
  var longitude =  $("#update_longitude").val();
  var landuse =  $("#update_landuse").val();
    $.post("backend.php", {
            update_ep_plot_Id: update_ep_plot_Id,
            plot_Id: plot_Id,
            exploratory: exploratory,
            latitude : latitude,
            longitude: longitude,
            landuse : landuse,
        },
        function (data, status) {
            $("#update_modal").modal("hide");
            readRecords();
        }
    );
}

$(document).ready(function(){
   $('#datatablee').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'backend.php'
      },
      'columns': [
         { data: 'plot_Id' },
         { data: 'ep_plot_Id' },
         { data: 'exploratory' },
         { data: 'latitude' },
         { data: 'longitude' },
         { data: 'landuse' },
      ]
   });
});
$(document).ready(function(){
            var dataTable=$('#myexm').DataTable({
                "processing": true,
                "serverSide":true,
                "ajax":{
                    url:"backend.php",
                    type:"post"
                }
            });
        });*/
</script>
