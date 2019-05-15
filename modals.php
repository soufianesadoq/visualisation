<?php require 'include/ajax.php';?>
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Inserting</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<!-- Modal body -->
<div class="modal-body">

<div class="form-group">
<label>  plot_Id: </label>
<input type="text" name="plot_Id" id="plot_Id" placeholder="plot_Id" class="form-control">
</div>

<div class="form-group">
<label> ep_plot_Id: </label>
<input type="text" name="ep_plot_Id" id="ep_plot_Id" placeholder="ep_plot_Id" class="form-control">
</div>

<div class="form-group">
<label> exploratory: </label>
<input type="text" name="exploratory" id="exploratory" placeholder="exploratory" class="form-control">
</div>

<div class="form-group">
<label> latitude: </label>
<input type="text" name="latitude" id="latitude" placeholder="latitude" class="form-control">
</div>
<div class="form-group">
<label> longitude: </label>
<input type="text" name="longitude" id="longitude" placeholder="longitude" class="form-control">
</div>
<div class="form-group">
<label> landuse: </label>
<input type="text" name="landuse" id="landuse" placeholder="landuse" class="form-control">
</div>
</div>
<!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>








<!-- // after update // -->
<div class="modal fade" id="update_modal">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Updating</h4>
<button type="button" class="close" data-dismiss="modal" >&times;</button>
</div>

      <!-- Modal body -->
      <div class="modal-body">

          <div class="form-group">
          <label> plot_Id </label>
          <input type="text" name="plot_Id" id="update_plot_Id" placeholder="plot_Id" class="form-control">
        </div>

      <div class="form-group">
          <label>ep_plot_Id </label>
          <input type="text" name="ep_plot_Id" id="update_ep_plot_Id" placeholder="ep_plot_Id" class="form-control">
        </div>

        <div class="form-group">
          <label> exploratory</label>
          <input type="text" name="exploratory" id="update_exploratory" placeholder="exploratory" class="form-control">
        </div>

        <div class="form-group">
          <label> latitude </label>
          <input type="text" name="latitude" id="update_latitude" placeholder="latitude" class="form-control">
        </div>

        <div class="form-group">
          <label> longitude </label>
          <input type="text" name="longitude" id="update_longitude" placeholder="longitude" class="form-control">
        </div>

        <div class="form-group">
          <label> landuse </label>
          <input type="text" name="landuse" id="update_landuse" placeholder="landuse" class="form-control">
        </div>

      </div>

      <!-- Modal footer -->
     <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="UpdateDetails()" >Update</button>
                  <input  type="hidden" id="update_ep_plot_Id">
      </div>

    </div>
  </div>
</div>
