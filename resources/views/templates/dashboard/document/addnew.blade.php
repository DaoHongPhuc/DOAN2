@extends('templates.dashboard.index')

@section('dashboard')
@include('templates.lib.flashMessage')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title m-0">Add New Document</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
                <form class="form-horizontal row" method="post" 
                id="addNewForm">
					
					<div class="col-lg-12 col-sm-12 col-12">
						<div class="form-group row">
                            <label for="categoriesDocument" class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="categoriesDocument" 
                                    id="categoriesDocument">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="levelDocument" class="col-sm-2 control-label">Level</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="levelDocument" 
                                    id="levelDocument">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

	                    </div>
						<div class="form-group row">
	                        <label for="nameDocument" class="col-sm-2 control-label">Name</label>
	                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="nameDocument" 
                                name="nameDocument" placeholder="Name Document">
	                        </div>
	                    </div>
	                    <div class="form-group m-b-0 row">
	                    	<label for="fileDocument" class="col-sm-2 control-label">
                                File
                            </label>
	                    	<div class="col-sm-10">
                                <input type="file" class="filestyle" id="fileDocument" 
                                name="fileDocument" 
                                >
	                    	</div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label" for="contentDocument">
                                Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" 
                                id="contentDocument"
                                 name="contentDocument"></textarea>
                            </div>
                            <script>
                                CKEDITOR.replace('contentDocument');
                            </script>
                        </div>
                        
                        
					</div>
					@csrf
					<div class="col-lg-12 col-sm-12 col-12 pt-3">
						<div class="text-center">
							<button type="submit" class="btn btn-info waves-effect">
                                <i class="fas fa-plus"></i> Add Post</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
   <script>
        $(document).ready(function () {
            loadCategories();
            loadLevel();
            validateFormAdd();
        });

        function loadLevel(){
            $.ajax({
               type: "get",
               url: "{{route('listlevels')}}",
               data: null,
               dataType: "json",
               success: function (d) {
                    var list = new Array;
                    list.push('<option value="" class="">Choose a Categories</option>');
                    $.each(d.result, function (k, v) {
                        list.push('<option value="'+v.id+'" class="">'+v.name+'</option>');
                    });
                    $("#levelDocument").html(list);
               }
            });
        }
       
        function loadCategories(){
            $.ajax({
               type: "get",
               url: "{{route('listcategories')}}",
               data: null,
               dataType: "json",
               success: function (d) {
                    var list = new Array;
                    list.push('<option value="" class="">Choose a Level</option>');
                    $.each(d.result, function (k, v) {
                        list.push('<option value="'+v.id+'" class="">'+v.name+'</option>');
                    });
                    $("#categoriesDocument").html(list);
               }
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
                    categoriesDocument : {
                        required: true,
                    },
                    nameDocument : {
                        required: true,
                        minlength: 3
                    },
                    fileDocument: {
                        required: true,
                    },
                    contentDocument: {
                        required: true,
                    }
                },
                messages:{
                    categoriesDocument : {
                        required: "Enter Categories Document",
                    },
                    nameDocument: {
                        required: "Enter Name Document",
                        minlength: "Name must have least 3 characters"
                    },
                    fileDocument: {
                        required: "Enter Abstract Document",
                    },
                    contentDocument: {
                        required: "Enter Content Document",
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    addNew();
                }
            })
        }

        function addNew(){
            let formData = new FormData(document.getElementById("addNewForm"));
            formData.append('contentDocument', CKEDITOR.instances['contentDocument'].getData());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{route('postnewdocument')}}",
                method:'POST',  
                data: formData,
                contentType: false,
                dataType: 'json',
                processData:false,
                success: function(d){
                    if (d.status) {
                        Swal.fire({
                            title: 'Success',
                            text: "Add new post successful !" ,
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok !'
                            }).then((confirm) => {
                                window.location.href = "{{route('listalldocument')}}"
                        });
                    }else{
                        Swal.fire('Error !','', 'error');                 
                    }
                    $('#addNew')[0].reset();
                }
            });
        };
   </script>
@endsection