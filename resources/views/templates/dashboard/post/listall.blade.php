@extends('templates.dashboard.index')

@section('dashboard')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">My List Post</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="m-b-30 m-t-0">My List Post</h4> --}}
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                    	<table id="datatable" class="table table-bordered  nowrap" style=" width: 100%;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>OPTION</th>
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    
                                    <th>TITLE</th>
                                    <th>SLUG</th>
                                    <th>CATEGORIES</th>

                                    <th>VIEW</th>
                                    <th>UPDATED_AT</th>
                                    <th>CREATED_AT</th>
                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>OPTION</th>
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    
                                    <th>TITLE</th>
                                    <th>SLUG</th>
                                    <th>CATEGORIES</th>

                                    <th>VIEW</th>
                                    <th>UPDATED_AT</th>
                                    <th>CREATED_AT</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            init();
        });

        function init(){
            listData = $('#datatable').dataTable({
                createdRow: function (row, data, dataIndex) {
                    $(row).addClass('cursor-pointer');
                },
                ajax: {
                    url: "{{route('mylistpost')}}",
                    type: "GET",
                    dataSrc: 'result'
                },
                columns: [
                    { data: "count" },
                    { width: "5%" },
                    { width: "5%" },
                    { data: 'status' },
                    { data: 'title' },
                    { data: 'slug' },
                    { data: "categories" },
                    { data: 'view' },
                    { data: 'updated_at' },
                    { data: 'created_at' },
                ],
                dom: "Bfrtip",
                buttons: [
                    {
                        text: "<i class='fas fa-plus-circle'></i> Thêm mới",
                        className: 'btn btn-primary waves-effect',
                        action: function (e) {
                            window.location.href = "{{route('newpost')}}"
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
                        targets: 2,
                        data: 'image',
                        render: function(data){
                            return '<img src="{{asset("documents/imagePost")}}/'+data+'" alt="" height="30px" width="60px" style="border-radius: 50%;">';
                        }
                    },
                    {
                        targets: 3,
                        data: 'status',
                        render: function (data) {
                        if (data == 1) {
                            return '<span class="badge badge-secondary"><i class="far fa-file"></i> Approved</span>';
                        }else{
                            return '<span class="badge badge-warning"><i class="fas fa-spinner fa-pulse"></i> Waiting</span>';
                        }
                    },
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
                    text: "Are you sure delete Post: "+data.title+" ?" ,
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
                                url: "{{route('deletePost')}}",
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
    </script>
@endsection