@extends('templates.dashboard.index')

@section('dashboard')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">List Category</h4>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="m-b-30 m-t-0">Buttons Example</h4>

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>OPTION</th>
                            <th>OWNER</th>
                            <th>CATEGORIES</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>CONTENT</th>
                            <th>CREATED_AT</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>OPTION</th>
                            <th>OWNER</th>
                            <th>CATEGORIES</th>

                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>CONTENT</th>
                            <th>CREATED_AT</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div> <!-- End Row -->
{{-- modal AddNew --}}
<div class="modal fade bs-example-modal-lg" id="modalAddNew" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title m-0" id="myLargeModalLabel">NEW CATEGORY</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal" id="addNewForm">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 control-label">NAME</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Name" 
                            name="Name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Description" class="col-sm-3 control-label">DISCRIPTION</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Description" 
                            name="Description" placeholder="Description">
                        </div>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')
<script>
    
    $(document).ready(function () {
        init();
        // validateFormAdd();
    });

    function init(){
        listData = $('#datatable').dataTable({
            createdRow: function (row, data, dataIndex) {
                $(row).addClass('cursor-pointer');
            },
            ajax: {
                url: "{{route('listdocument')}}",
                type: "GET",
                dataSrc: 'result'
            },
            columns: [
                { data: "count" },
                { width: "5%" },
                { data: "owner" },
                { data: "category" },
                { data: "name" },
                { data: 'isActive' },
                { data: 'content' },
                { data: 'created_at' },
            ],
            dom: "Bfrtip",
            buttons: [{
                text: "<i class='fas fa-plus-circle'></i> Thêm mới",
                className: 'btn btn-primary waves-effect',
                action: function (e) {
                    window.location.href = "{{route('newdocument')}}"
                }
            },  
                {
                    text: "<i class='far fa-file-excel'></i> Xuất Excel",
                    className: 'btn btn-success waves-effect',
                    extend: "excel"
                }
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: null,
                    defaultContent: '<div class="btn-group"> <button  data-toggle="tooltip" data-placement="top" title="Update"  class="btn btn-info waves-effect btn-sm"><i class="fas fa-edit"></i></button> <button data-toggle="tooltip" data-placement="top" title="Delete"  class="btn btn-danger waves-effect btn-sm" id="delete"><i class="fas fa-trash"></i></button>'
                },
                {
                    targets: 5,
                    data: 'isDelete',
                    render: function(data){
                        if(data == 1){
                            return '<span class="badge badge-danger">Deleted</span>';
                        }else{
                            return '<span class="badge badge-primary">Active</span>';
                        }
                    }
                },
            ],
            responsive: !0,
            pageLength: 10,
            processing: true,
            serverSide: false,
            destroy: true,
            scrollX: true,
            lengthChange: false,
            autoWidth: false,
        });

        $('#datatable tbody').on( 'click', 'button#delete', function () {
            var data = listData.DataTable().row( $(this).parents('tr') ).data();
            Swal.fire({
                title: 'Confirm',
                text: "Are you sure delete Categories Name: "+data.name+" ?" ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((confirmDelete) => {
                    if (confirmDelete.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "post",
                            url: "{{route('deleteCategories')}}",
                            data: {data: data.id},
                            dataType: "json",
                            success: function (d) {
                                if (d.status) {
                                    Swal.fire('Successful !', '', 'success');

                                }else{
                                    Swal.fire('Error !', '', 'error');                 
                                }
                                init();
                            }
                        });
                    }else{
                        Swal.fire('Cancel !', '', 'error');
                    }
            });
            
        });
    }

    function validateFormAdd(){
        $('#addNewForm').validate({
            errorClass: 'help-block animation-slideDown',
            errorElement: 'span',
            errorPlacement: function(error, e) {
                e.parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                $(e).closest('.help-block').remove();
            },
            success: function(e) {
                e.closest('.form-group').removeClass('has-success has-error');
                e.closest('.help-block').remove();
            },
            rules: {
                Name : {
                    required: true,
                    minlength: 5
                },
                Description: {
                    required: true,
                    minlength: 10
                }
            },
            messages:{
                Name : {
                  required: "Enter name category",
                  minlength: "Name Category must have least 5 characters",
                },
                Description: {
                  required: "Enter Description",
                  minlength: "Name Category must have least 10 characters"
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                addNew();
            }
        })
    }

    function addNew(){
        data = new Object();
        data.Name = $("#Name").val();
        data.Description = $("#Description").val();

        dataJson = JSON.stringify(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            
            type: "POST",
            url: "{{route('addCategory')}}",
            data: {data: dataJson},
            dataType: "json",
            success: function (d) {
                if (d.status) {
                    Swal.fire('Successful !', '', 'success');
                }else{
                    Swal.fire('Lỗi!', 'Lỗi trong quá trình thêm thành viên, vui lòng thử lại!', 'error');                 
                }
                $('#modalAddNew').modal('hide');
                $('#addNewForm')[0].reset();
                init();

            }
        });
    }

</script>
@endsection