<x-admin.layout>
    <x-slot name="title">Add New Frams</x-slot>
    <x-slot name="heading">Add New Frams</x-slot>
    


    <!-- Add Form -->
    <div class="row" id="addContainer" style="display: block"> 
   <div class="col-sm-12">
      <div class="card">
         <form
            class="theme-form"
            name="addForm"
            id="addForm"
            enctype="multipart/form-data"
            >
            @csrf
            <div class="card-body">
               <div class="mb-3 row">
                  <div class="col-md-4">
                     <label class="col-form-label" for="farm_name"
                        >Farm Name <span class="text-danger">*</span></label
                        >
                     <input
                        class="form-control"
                        id="farm_name"
                        name="farm_name"
                        type="text"
                        placeholder="Enter Farm Name"
                        />
                     <span class="text-danger invalid farm_name_err"></span>
                  </div>
                  <div class="col-md-4">
                     <label class="col-form-label" for="location">Location</label>
                     <select
                        id="Forminputlocation"
                        class="form-select"
                        name="location"
                        >
                        <option selected>Choose...</option>
                        <option value="1">Pune</option>
                        <option value="2">Mumbai</option>
                        <option value="3">Delhi</option>
                     </select>
                     <span class="text-danger invalid location_err"></span>
                  </div>
                  <div class="col-md-4">
                     <label class="col-form-label" for="location_link"
                        >Map Location Link <span class="text-danger">*</span></label
                        >
                     <input
                        class="form-control"
                        id="location_link"
                        name="location_link"
                        type="link"
                        placeholder="Enter Map Location Link"
                        />
                     <span class="text-danger invalid location_link_err"></span>
                  </div>
                  <div class="col-md-12">
                     <label class="col-form-label" for="farm_address"
                        >Full Address <span class="text-danger">*</span></label
                        >
                     <input
                        class="form-control"
                        id="billing_address"
                        name="farm_address"
                        type="text"
                        placeholder="Enter Farm Address"
                        />
                     <span class="text-danger invalid farm_address_err"></span>
                  </div>
                  <div class="col-md-12 mt-4">
                     <h5>Price Form</h5>
                     <!-- Non AC -->
                     <div class="border rounded p-3 mb-4">
                        <h6 class="text-dark fw-semibold mb-3">Non AC</h6>
                        <table class="table table-bordered">
                           <thead class="table-light">
                              <tr>
                                 <th>Category</th>
                                 <th>12 Hours</th>
                                 <th>24 Hours</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <strong>Regular Price</strong><br /><small
                                       class="text-muted"
                                       >Up to 15 Persons</small
                                       >
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="nonac_regular_12hr"
                                       class="form-control"
                                       placeholder="₹6000"
                                       />
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="nonac_regular_24hr"
                                       class="form-control"
                                       placeholder="₹9000"
                                       />
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <strong>Weekend Price</strong><br /><small
                                       class="text-muted"
                                       >Up to 15 Persons</small
                                       >
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="nonac_weekend_12hr"
                                       class="form-control"
                                       placeholder="₹15000"
                                       />
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="nonac_weekend_24hr"
                                       class="form-control"
                                       placeholder="₹20000"
                                       />
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <strong>Couple Price</strong><br /><small
                                       class="text-muted"
                                       >Up to 2 Persons</small
                                       >
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="nonac_couple_12hr"
                                       class="form-control"
                                       placeholder="₹6000"
                                       />
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="nonac_couple_24hr"
                                       class="form-control"
                                       placeholder="₹7500"
                                       />
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <!-- AC -->
                     <div class="border rounded p-3">
                        <h6 class="text-dark fw-semibold mb-3">AC</h6>
                        <table class="table table-bordered">
                           <thead class="table-light">
                              <tr>
                                 <th>Category</th>
                                 <th>12 Hours</th>
                                 <th>24 Hours</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <strong>Regular Price</strong><br /><small
                                       class="text-muted"
                                       >Up to 15 Persons</small
                                       >
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="ac_regular_12hr"
                                       class="form-control"
                                       placeholder="₹6000"
                                       />
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="ac_regular_24hr"
                                       class="form-control"
                                       placeholder="₹9000"
                                       />
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <strong>Weekend Price</strong><br /><small
                                       class="text-muted"
                                       >Up to 15 Persons</small
                                       >
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="ac_weekend_12hr"
                                       class="form-control"
                                       placeholder="₹15000"
                                       />
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="ac_weekend_24hr"
                                       class="form-control"
                                       placeholder="₹20000"
                                       />
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <strong>Couple Price</strong><br /><small
                                       class="text-muted"
                                       >Up to 2 Persons</small
                                       >
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="ac_couple_12hr"
                                       class="form-control"
                                       placeholder="₹6000"
                                       />
                                 </td>
                                 <td>
                                    <input
                                       type="text"
                                       name="ac_couple_24hr"
                                       class="form-control"
                                       placeholder="₹7500"
                                       />
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="mt-4">
                     <h5>Amenities</h5>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Swimming Pool" id="amenity1" />
                              <label class="form-check-label" for="amenity1">
                              <i class="fas fa-swimming-pool"></i> Swimming Pool
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Parking" id="amenity2" />
                              <label class="form-check-label" for="amenity2">
                              <i class="fas fa-parking"></i> Parking
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Sound System" id="amenity3" />
                              <label class="form-check-label" for="amenity3">
                              <i class="fas fa-volume-up"></i> Sound System
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="WiFi" id="amenity4" />
                              <label class="form-check-label" for="amenity4">
                              <i class="fas fa-wifi"></i> WiFi
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Garden" id="amenity5" />
                              <label class="form-check-label" for="amenity5">
                              <i class="fas fa-seedling"></i> Garden
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Child Pool" id="amenity6" />
                              <label class="form-check-label" for="amenity6">
                              <i class="fas fa-child"></i> Child Pool
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Private Lawn" id="amenity7" />
                              <label class="form-check-label" for="amenity7">
                              <i class="fas fa-tree"></i> Private Lawn
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Inverter" id="amenity8" />
                              <label class="form-check-label" for="amenity8">
                              <i class="fas fa-battery-full"></i> Inverter
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Extra Mattress" id="amenity9" />
                              <label class="form-check-label" for="amenity9">
                              <i class="fas fa-bed"></i> Extra Mattress
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Food Facility" id="amenity10" />
                              <label class="form-check-label" for="amenity10">
                              <i class="fas fa-utensils"></i> Food Facility
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Street Parking" id="amenity11" />
                              <label class="form-check-label" for="amenity11">
                              <i class="fas fa-car"></i> Street Parking
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Bonfire" id="amenity12" />
                              <label class="form-check-label" for="amenity12">
                              <i class="fas fa-fire"></i> Bonfire
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Chairs" id="amenity13" />
                              <label class="form-check-label" for="amenity13">
                              <i class="fas fa-chair"></i> Chairs
                              </label>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="amenities[]" value="Private Parking Area" id="amenity14" />
                              <label class="form-check-label" for="amenity14">
                              <i class="fas fa-square-parking"></i> Private Parking Area
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- 🖼️ Thumbnail Image Upload -->
                  <div class="row mt-4">
                     <div class="col-md-6">
                        <h5>Thumbnail Image</h5>
                        <input
                           type="file"
                           name="thumbnail"
                           class="form-control"
                           accept="image/*"
                           />
                        <small class="text-muted">Upload main display image of the farm</small>
                     </div>
                  </div>
                  <div class="row mt-4">
                     <!-- 🖼️ Image Upload -->
                     <div class="col-md-6">
                        <h5>Image Gallery</h5>
                        <input
                           type="file"
                           name="images[]"
                           class="form-control"
                           multiple
                           accept="image/*"
                           />
                     </div>
                     <!-- 📹 Video Upload -->
                     <div class="col-md-6">
                        <h5>Video Gallery</h5>
                        <input
                           type="file"
                           name="videos[]"
                           class="form-control"
                           multiple
                           accept="video/*"
                           />
                     </div>
                  </div>
                  <!-- 📜 Home Rules -->
                  <div class="mt-4">
                     <h5>Home Rules</h5>
                     <textarea
                        class="form-control"
                        name="home_rules"
                        rows="4"
                        placeholder="Enter home rules..."
                        ></textarea>
                  </div>
                  <!-- 🧭 How to Reach -->
                  <div class="mt-4">
                     <h5>How to Reach</h5>
                     <div class="row">
                        <div class="col-md-6">
                           <label class="form-label">By Train</label>
                           <input
                              type="text"
                              class="form-control"
                              name="reach_train"
                              placeholder="Nearest Railway Station"
                              />
                        </div>
                        <div class="col-md-6">
                           <label class="form-label">By Road</label>
                           <input
                              type="text"
                              class="form-control"
                              name="reach_road"
                              placeholder="Road Route / Bus Stop"
                              />
                        </div>
                     </div>
                  </div>
                  <!-- 📍 Nearby Visit Locations -->
                  <div class="mt-4">
                     <h5>Nearby Visit Locations</h5>
                     <textarea
                        class="form-control"
                        name="nearby_places"
                        rows="3"
                        placeholder="Nearby tourist places..."
                        ></textarea>
                  </div>
                  <!-- 👤 Owner Details -->
                  <div class="mt-4">
                     <h5>Owner Details</h5>
                     <div class="row">
                        <div class="col-md-4">
                           <label class="form-label">Owner Name</label>
                           <input
                              type="text"
                              class="form-control"
                              name="owner_name"
                              />
                        </div>
                        <div class="col-md-4">
                           <label class="form-label">Contact Number</label>
                           <input
                              type="text"
                              class="form-control"
                              name="owner_contact"
                              />
                        </div>
                        <div class="col-md-4">
                           <label class="form-label">Whatsapp Number</label>
                           <input
                              type="text"
                              class="form-control"
                              name="owner_alt_contact"
                              />
                        </div>
                        <div class="col-md-4">
                           <label class="col-form-label" for="email"
                              >Email Address <span class="text-danger">*</span></label
                              >
                           <input
                              class="form-control"
                              id="email"
                              name="email"
                              type="email"
                              placeholder="Enter Email Address"
                              />
                           <span class="text-danger invalid email_err"></span>
                        </div>
                     </div>
                  </div>
                  <!-- 📐 Total Farm Area -->
                  <div class="row mt-4">
                     <div class="col-md-6">
                        <h5>Total Farm Area</h5>
                        <input
                           type="text"
                           class="form-control"
                           name="farm_area"
                           placeholder="Eg: 10,000 sq.ft or 1 acre"
                           />
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-8">
                           <table class="table table-bordered align-middle">
                              <tbody>
                                 <tr>
                                    <td style="width: 40%"><label class="form-label mb-0">Number of Rooms</label></td>
                                    <td>
                                       <input type="number" name="room_count" id="roomCountInput" class="form-control" min="1" placeholder="e.g. 5" />
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><label class="form-label mb-0">Number of Villas</label></td>
                                    <td>
                                       <input type="number" name="villa_count" id="villaCountInput" class="form-control" min="1" placeholder="e.g. 2" />
                                    </td>
                                 </tr>
                                 <tr>
                                    <td><label class="form-label mb-0">Number of Bungalows</label></td>
                                    <td>
                                       <input type="number" name="bungalow_count" id="bungalowCountInput" class="form-control" min="1" placeholder="e.g. 1" />
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                <button type="submit" class="btn btn-outline-success btn-border" id="addSubmit">Submit</button>
                <button type="reset" class="btn btn-soft-warning btn-border">Reset</button>
               </div>
         </form>
         </div>
      </div>
   </div>



    {{-- Edit Form --}}
    <div class="row" id="editContainer" style="display:none;">
        <div class="col">
            <form class="form-horizontal form-bordered" method="post" id="editForm">
                @csrf
                <section class="card">
                    <header class="card-header">
                        <h4 class="card-title">Edit Expenses</h4>
                    </header>

                    <div class="card-body py-2">

                        <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                        <div class="mb-3 row">
                         <div class="col-md-4">
                            <label class="col-form-label" for="edit_name">Expenses Name <span class="text-danger">*</span></label>
                            <input class="form-control" id="edit_name" name="name" type="text" placeholder="Enter Expenses Name">
                            <span class="text-danger invalid name_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="edit_initial">Initial Name <span class="text-danger">*</span></label>
                            <input class="form-control" id="edit_initial" name="initial" type="text" placeholder="Enter Initial Name">
                            <span class="text-danger invalid initial_err"></span>
                        </div>
                        <div class="col-md-4 " >
                                <label class="col-form-label" for="edit_status">Status <span class="text-danger">*</span></label>
                                <select class="form-control status" id="edit_status" name="status">
                                    <option value="">--Select Status--</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                                <span class="text-danger invalid status_err"></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-border" id="editSubmit">Submit</button>
                        <button type="reset" class="btn btn-soft-warning btn-border">Reset</button>
                    </div>
                </section>
            </form>
        </div>
    </div>


    



</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('commission.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('commission.index') }}';
                    });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>


<!-- Edit -->
<script>
   $("#buttons-datatables").on("click", ".edit-element", function(e) {
    e.preventDefault();
    var model_id = $(this).attr("data-id");
    var url = "{{ route('commission.edit', ':model_id') }}";

    $.ajax({
        url: url.replace(':model_id', model_id),
        type: 'GET',
        data: {
            '_token': "{{ csrf_token() }}",
            'model_id':model_id
        },
        success: function(data, textStatus, jqXHR) {
            editFormBehaviour();
            if (!data.error) {
                $("#editForm input[name='edit_model_id']").val(data.commission.id);
                $("#edit_name").val(data.commission.name);
                $("#edit_initial").val(data.commission.initial);
                $("#edit_status").val(data.commission.status);
            } else {
                alert(data.error);
            }
        },
        error: function(error, jqXHR, textStatus, errorThrown) {
            alert("Something went wrong");
        },
    });
});
</script>


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('commission.update', ':model_id') }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('commission.index') }}';
                        });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
                title: "Are you sure to delete this expense?",
                // text: "Make sure if you have filled Vendor details before proceeding further",
                icon: "info",
                buttons: ["Cancel", "Confirm"]
            })
            .then((justTransfer) => {
                if (justTransfer) {
                    var model_id = $(this).attr("data-id");
                    var url = "{{ route('expenses.destroy', ':model_id') }}";

                    $.ajax({
                        url: url.replace(':model_id', model_id),
                        type: 'POST',
                        data: {
                            '_method': "DELETE",
                            '_token': "{{ csrf_token() }}",
                            'model_id':model_id
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (!data.error && !data.error2) {
                                swal("Success!", data.success, "success")
                                    .then((action) => {
                                        window.location.reload();
                                    });
                            } else {
                                if (data.error) {
                                    swal("Error!", data.error, "error");
                                } else {
                                    swal("Error!", data.error2, "error");
                                }
                            }
                        },
                        error: function(error, jqXHR, textStatus, errorThrown) {
                            swal("Error!", "Something went wrong", "error");
                        },
                    });
                }
            });
    });
</script>

