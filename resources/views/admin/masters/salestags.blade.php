<x-admin.layout>
    <x-slot name="title">Salestags</x-slot>
    <x-slot name="heading">Salestags</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


    <!-- Add Form -->
    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="tagname">Tag Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="tagname" name="tagname" type="text" placeholder="Enter Tag Name">
                                <span class="text-danger invalid tagname_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="discount_rate">Discount Rate<span class="text-danger">*</span></label>
                                <input class="form-control" id="discount_rate" name="discount_rate" type="number" placeholder="Enter discount_rate">
                                <span class="text-danger invalid discount_rate_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="code">Code <span class="text-danger">*</span></label>
                                <input class="form-control" id="code" name="code" type="text" placeholder="Enter code Name">
                                <span class="text-danger invalid code_err"></span>
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
                        <h4 class="card-title">Edit Salestag</h4>
                    </header>

                    <div class="card-body py-2">

                        <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                        <div class="mb-3 row">
                         <div class="col-md-4">
                                <label class="col-form-label" for="edit_tagname">Tag Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_tagname" name="tagname" type="text" placeholder="Enter Tag Name">
                                <span class="text-danger invalid tagname_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="edit_discount_rate">Discount Rate<span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_discount_rate" name="discount_rate" type="number" placeholder="Enter discount_rate">
                                <span class="text-danger invalid discount_rate_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="edit_code">Code <span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_code" name="code" type="text" placeholder="Enter code Name">
                                <span class="text-danger invalid code_err"></span>
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


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @can('salestag.create')
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-outline-primary btn-border">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-soft-danger btn-border" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead style="background-color: rgba(var(--vz-light-rgb), .75);">
                                <tr>
                                    <th class="table-srno-column">Sr No.</th>
                                    <th>Tag Name</th>
                                    <th>Discount Rate</th>
                                    <th>Code</th>
                                    <th class="table-action-column">Status</th>
                                    <th class="table-action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salestags as $salestags)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td>{{ $salestags->tagname }}</td>
                                        <td>{{ $salestags->discount_rate }}</td>
                                        <td>{{ $salestags->code }}</td>
                                        <td class="text-center align-middle">
                                            @if($salestags->status == 1)
                                                <span class="badge bg-success-subtle text-success " style="font-size: 13px;">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger " style="font-size: 13px;">Deactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('salestag.edit')
                                                <button class="edit-element btn btn-soft-secondary px-0 py-0" title="Edit salestags" data-id="{{ $salestags->id }}"><i class="ri-edit-box-line fs-4 w-100 h-100 text-center"></i></button>
                                            @endcan
                                            @can('salestag.delete')
                                                <button class="delete-element btn btn-soft-danger rem-element px-0 py-0" title="Delete salestags" data-id="{{ $salestags->id }}"><i class="ri-delete-bin-2-line fs-4 w-100 h-100 text-center"></i> </button>
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
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
            url: '{{ route('salestags.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('salestags.index') }}';
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
    var url = "{{ route('salestags.edit', ':model_id') }}";
    alert("Edit button clicked for model ID: " + model_id);

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
                $("#editForm input[name='edit_model_id']").val(data.salestag.id);
                $("#edit_tagname").val(data.salestag.tagname);
                $("#edit_discount_rate").val(data.salestag.discount_rate);
                $("#edit_code").val(data.salestag.code);
                $("#edit_status").val(data.salestag.status);
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
            var url = "{{ route('salestags.update', ':model_id') }}";
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
                            window.location.href = '{{ route('salestags.index') }}';
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
                    var url = "{{ route('salestags.destroy', ':model_id') }}";

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

