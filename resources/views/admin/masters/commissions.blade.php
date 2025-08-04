<x-admin.layout>
    <x-slot name="title">Commissions</x-slot>
    <x-slot name="heading">Commissions</x-slot>
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
                            <label class="col-form-label" for="name">Expenses Name <span class="text-danger">*</span></label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter Expenses Name">
                            <span class="text-danger invalid name_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="initial">Initial Name<span class="text-danger">*</span></label>
                            <input class="form-control" id="initial" name="initial" type="text" placeholder="Enter Initial name">
                            <span class="text-danger invalid initial_err"></span>
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


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @can('commission.create')
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
                                    <th>Expenses Name</th>
                                    <th>Initial Name</th>
                                    <th class="table-action-column">Status</th>
                                    <th class="table-action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commissions as $commissions)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td>{{ $commissions->name }}</td>
                                        <td>{{ $commissions->initial }}</td>
                                        <td class="text-center align-middle">
                                            @if($commissions->status == 1)
                                                <span class="badge bg-success-subtle text-success " style="font-size: 13px;">Active</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger " style="font-size: 13px;">Deactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('commission.edit')
                                                <button class="edit-element btn btn-soft-secondary px-0 py-0" title="Edit commissions" data-id="{{ $commissions->id }}"><i class="ri-edit-box-line fs-4 w-100 h-100 text-center"></i></button>
                                            @endcan
                                            @can('commission.delete')
                                                <button class="delete-element btn btn-soft-danger rem-element px-0 py-0" title="Delete commissions" data-id="{{ $commissions->id }}"><i class="ri-delete-bin-2-line fs-4 w-100 h-100 text-center"></i> </button>
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

