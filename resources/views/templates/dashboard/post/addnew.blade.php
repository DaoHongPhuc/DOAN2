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
                    <h4 class="page-title m-0">Add New</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h4 class="m-b-30 m-t-0">Thông tin bài viết</h4>
                <form class="form-horizontal row" method="post" 
                id="addNewForm">
					
					<div class="col-lg-12 col-sm-12 col-12">
						<div class="form-group row">
                            <label for="titlePost" class="col-sm-2 control-label">Categories</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select class="form-control" name="categoriesPost" 
                                    id="categoriesPost">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

	                    </div>
						<div class="form-group row">
	                        <label for="titlePost" class="col-sm-2 control-label">Title</label>
	                        <div class="col-sm-10">
                                <input type="text" class="form-control" id="titlePost" 
                                name="titlePost" placeholder="Title Post">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="abstractPost" class="col-sm-2 control-label">
                                Abstract
                            </label>
	                        <div class="col-sm-10">
                                <textarea style="resize: none;" class="form-control" rows="3" 
                                id="abstractPost" name="abstractPost" 
                                placeholder="Abstract Post"></textarea>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0 row">
	                    	<label for="imagePost" class="col-sm-2 control-label">
                                Image
                            </label>
	                    	<div class="col-sm-10">
                                <input type="file" class="filestyle" id="imagePost" 
                                name="imagePost" 
                                accept=".jpg, .png">
	                    	</div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label" for="contentPost">
                                Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" 
                                id="contentPost"
                                 name="contentPost"></textarea>
                            </div>
                            <script>
                                CKEDITOR.replace('contentPost');
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
            validateFormAdd();
        });
       
        function loadCategories(){
           $.ajax({
               type: "get",
               url: "{{route('listcategories')}}",
               data: null,
               dataType: "json",
               success: function (d) {
                    var list = new Array;
                    list.push('<option value="" class="">Choose a Categories</option>');
                    $.each(d.result, function (k, v) {
                        list.push('<option value="'+v.id+'" class="">'+v.name+'</option>');
                    });
                    $("#categoriesPost").html(list);
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
                    categoriesPost : {
                        required: true,
                    },
                    titlePost : {
                        required: true,
                        minlength: 10
                    },
                    abstractPost: {
                        required: true,
                    },
                    imagePost: {
                        required: true,
                    },
                    contentPost: {
                        required: true,
                    }
                },
                messages:{
                    categoriesPost : {
                        required: "Enter Categories Post",
                    },
                    titlePost: {
                        required: "Enter Title Post",
                        minlength: "Name Category must have least 10 characters"
                    },
                    abstractPost: {
                        required: "Enter Abstract Post",
                    },
                    imagePost: {
                        required: "Enter Image Post",
                    },
                    contentPost: {
                        required: "Enter Content Post",
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
            formData.append('contentPost', CKEDITOR.instances['contentPost'].getData());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{route('addnewpost')}}",
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
                                window.location.href = "{{route('listallpost')}}"
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