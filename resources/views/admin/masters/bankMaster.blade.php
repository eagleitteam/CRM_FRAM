<x-admin.layout>
    <x-slot name="title">Add Bank Details Master</x-slot>
    <x-slot name="heading">Add Bank Details Master</x-slot>
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
                                <label for="FormSelectBankType" class="form-label">Bank Type<span class="text-danger">*</span></label>
                                                    <select id="FormSelectBankType" name="act_type" class="form-select" data-choices data-choices-sorting="true">
                                                        <option value="1" selected>Current Account</option>
                                                        <option value="2" >Overdraft Account</option>
                                                        <option value="3" >Saving Account</option>
                                                    </select>
                                <span class="text-danger invalid type_err"></span>
                            </div>
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="Bank_Name">Bank Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="Bank_Name" name="Bank_Name" type="text" placeholder="Enter Bank Name">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="BankBranch">Bank Branch <span class="text-danger">*</span></label>
                                <input class="form-control" id="BankBranch" name="BankBranch" type="text" placeholder="Enter Bank Branch">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="BankAccountNo">Bank Account No: <span class="text-danger">*</span></label>
                                <input class="form-control" id="BankAccountNo" name="BankAccountNo" type="number" placeholder="Enter Bank Account No">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="BankIFSCCode">Bank IFSC Code: <span class="text-danger">*</span></label>
                                <input class="form-control" id="BankIFSCCode" name="BankIFSCCode" type="text" placeholder="Enter Bank IFSC Code">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="Remark">Remark</label>
                                <input class="form-control" id="Remark" name="Remark" type="text" placeholder="Mention Remark If Any">

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
                        <h4 class="card-title">Edit Bank Details</h4>
                    </header>

                    <div class="card-body py-2">

                        <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                        <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label for="FormSelectBankType" class="form-label">Bank Type<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="edit_act_type" name="act_type">
                                                            <option value="">Select Account type ...</option>
                                                            <option value="1">Current Account</option>
                                                            <option value="2">Overdraft Account</option>
                                                            <option value="3">Saving Account</option>
                                                        </select>
                                    <span class="text-danger invalid type_err"></span>
                                </div>
                                <div class="col-md-8">

                                </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="Bank_Name">Bank Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_Bank_Name" name="Bank_Name" type="text" placeholder="Enter Bank Name">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="BankBranch">Bank Branch <span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_BankBranch" name="BankBranch" type="text" placeholder="Enter Bank Branch">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="BankAccountNo">Bank Account No: <span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_BankAccountNo" name="BankAccountNo" type="number" placeholder="Enter Bank Account No">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="BankIFSCCode">Bank IFSC Code: <span class="text-danger">*</span></label>
                                <input class="form-control" id="edit_BankIFSCCode" name="BankIFSCCode" type="text" placeholder="Enter Bank IFSC Code">
                                <span class="text-danger invalid description_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="Remark">Remark</label>
                                <input class="form-control" id="edit_Remark" name="Remark" type="text" placeholder="Mention Remark If Any">

                            </div>
                            
                            <div class="col-md-4">
                                    <label for="FormSelectBankType" class="col-form-label">Status<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="edit_status" name="status">
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
                @can('bankmaster.create')
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
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Account Type</th>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th>Bank Account No</th>
                                    <th>Bank IFSC Code</th>
                                    <th>Remark</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bankmasters as $bankmasters)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $bankmasters->act_type == 1 ? 'Current Account' : ($bankmasters->act_type == 2 ? 'Overdraft Account' : ($bankmasters->act_type == 3 ? 'Saving Account' : '')) }}
                                        </td>
                                        <td>{{ $bankmasters->Bank_Name }}</td>
                                        <td>{{ $bankmasters->BankBranch }}</td>
                                        <td>{{ $bankmasters->BankAccountNo }}</td>
                                        <td>{{ $bankmasters->BankIFSCCode }}</td>
                                        <td>{{ $bankmasters->Remark }}</td>
                                        <td>
                                            {{ $bankmasters->status == 1 ? 'Active' : ($bankmasters->status == 2 ? 'Inactive' : '')}}
                                        </td>
                                        <td>
                                            @can('bankmaster.edit')
                                                <button class="edit-element btn btn-soft-secondary px-0 py-0" title="Edit Vehicle" data-id="{{ $bankmasters->id }}"><i class="ri-edit-box-line fs-4 w-100 h-100 text-center"></i></button>
                                            @endcan
                                            @can('bankmaster.delete')
                                                <button class="delete-element btn btn-soft-danger rem-element px-0 py-0" title="Delete Vehicle" data-id="{{ $bankmasters->id }}"><i class="ri-delete-bin-2-line fs-4 w-100 h-100 text-center"></i> </button>
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
            url: '{{ route('bankmaster.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                    .then((action) => {
                        window.location.href = '{{ route('bankmaster.index') }}';
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
    var url = "{{ route('bankmaster.edit', ':model_id') }}";

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
                $("#editForm input[name='edit_model_id']").val(data.bankmasters.id);
                $("#edit_act_type").val(data.bankmasters.act_type).trigger('change');
                $("#edit_Bank_Name").val(data.bankmasters.Bank_Name);
                $("#edit_BankBranch").val(data.bankmasters.BankBranch);
                $("#edit_BankAccountNo").val(data.bankmasters.BankAccountNo);
                $("#edit_BankBranch").val(data.bankmasters.BankBranch);
                $("#edit_BankIFSCCode").val(data.bankmasters.BankIFSCCode);
                $("#edit_Remark").val(data.bankmasters.Remark);
                $("#edit_status").val(data.bankmasters.status).trigger('change');
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
            var url = "{{ route('bankmaster.update', ':model_id') }}";
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
                            window.location.href = '{{ route('bankmaster.index') }}';
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
                    var url = "{{ route('bankmaster.destroy', ':model_id') }}";

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





