@extends('layouts.admin_layout')
@section('content')
    <div class="container p-3">
        <a class="header-link" href="{{ route('admin_viewUsers') }}">
            <h2 class="header-text">
                <i class="fa fa-users"></i>
                &nbsp;&nbsp;Users/Employees
            </h2>
        </a>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="bg-light mt-3">
            <ol class="breadcrumb pt-1 pb-1 ps-3">
                <li class="breadcrumb-item">
                    <a class="fs-6" style="text-decoration: none;" href="{{ route('admin_viewUsers') }}">Users / Employes</a>
                </li>
                <li class="breadcrumb-item fs-6 active" aria-current="page">View / Update Information</li>
            </ol>
        </nav>
        <hr>

        <section id="addEmployeeForm">
            <div class="card w-75 m-auto shadow-lg">
                <div class="card-header pt-4 ps-4 pe-4">
                    <a href="{{ route('admin_viewUsers') }}" class="btn btn-danger float-end"><i class="fa fa-times-circle"></i> </a>
                    <h4 class="text-center header-text">Update User</h4>
                    <h6 class="text-secondary">Fields with (<span class="text-danger">*</span>) is required.</h6>
                </div>
                @foreach ($users as $user)
                    <div class="card-body p-4">
                        <form action="{{ route('admin_editUser',['id'=>$id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="mb-2">
                                        <div class="align-items-center text-center" id="updateImg">
                                            <div class="align-items-center text-center" id="imgPreview">
                                                <img src="{{ asset('images/'.$user->photo) }}" alt="Profile Picture" class="rounded-circle imgDef" width="150">
                                                <img src="" alt="New Profile Picture" class="rounded-circle imgPrev" width="150">
                                            </div>
                                            <div class="mt-3">
                                                <input type="file" name="imgInput" id="imgInput" accept="file_extension | audio/* | video/* | image/* | media_type">
                                            </div>
                                            <div class="imgWarning mt-2">
                                                <h6 class="text-danger">
                                                    Invalid Image File <br>
                                                    Please select another image file.
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="form-label" for="name">Name: <strong class="text-danger">*</strong></label>
                                <div class="col-md-6 col-lg-6 col-sm-12 mb-1">
                                    <input class="form-control" type="text" placeholder="First Name" id="fname" name="fname" value="{{ $user->first_name }}" required>
                                </div>
                                {{-- <div class="col-md-4 col-lg-4 col-sm-12 mb-1">
                                    <input class="form-control" type="text" placeholder="Middle Name" id="mname" name="mname">
                                </div> --}}
                                <div class="col-md-6 col-lg-6 col-sm-12 mb-1">
                                    <input class="form-control" type="text" placeholder="Last Name" id="lname" name="lname" value="{{ $user->last_name }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-sm-12">
                                    <div class="mb-2">
                                        <label for="address" class="form-label">Street: <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" placeholder="Street" id="street" name="street"  value="{{ $user->street }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-sm-12">
                                    <div class="mb-2">
                                        <label for="address" class="form-label">City: <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" placeholder="City" id="city" name="city" value="{{ $user->city }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 col-sm-12">
                                    <div class="mb-2">
                                        <label for="address" class="form-label">Provivince: <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" placeholder="Provivince" id="province" name="province" value="{{ $user->province }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-2 col-sm-12">
                                    <div class="mb-2">
                                        <label for="address" class="form-label">Zip-Code:&nbsp;<strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" placeholder="Zip-Code" id="zipcode" name="zipcode" value="{{ $user->zip_code }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12">
                                    <div class="mb-2">
                                        <label for="fate" class="form-label">Birthdate: <strong class="text-danger">*</strong></label>
                                        <input type="date" class="form-control" placeholder="Date" id="bdate" name="bdate" value="{{ $user->birthdate }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3 col-sm-12">
                                    <div class="mb-2">
                                        <label for="phone" class="form-label">Phone: <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" value="{{ $user->phone_no }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                    <div class="mb-2">
                                        <label for="email" class="form-label">Email: <strong class="text-danger">*</strong></label>
                                        <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="mb-2">
                                        <label for="uname" class="form-label">Account Type: <strong class="text-danger">*</strong></label>
                                        {{-- <input type="text" class="form-control" placeholder="Username" id="uname" name="uname" required> --}}
                                        <select name="type" id="type" class="form-select">
                                            @if ( $user->role == 1)
                                                <option value='2' >Cashier</option>
                                                <option value='3' >Inventory</option>
                                                <option value='1' selected>Admin</option>
                                            @elseif ($user->role == 2)
                                                <option value='2' selected>Cashier</option>
                                                <option value='3' >Inventory</option>
                                                <option value="1">Admin</option>
                                            @else
                                                <option value='2' >Cashier</option>
                                                <option value='3'selected >Inventory</option>
                                                <option value="1">Admin</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="mb-2">
                                        <label for="password" class="form-label">Confirm Password </label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword">
                                        <p id="errConfirm" hidden><i class="text-danger">Password didn't match.</i></p>
                                        <p id="sucConfirm" hidden><i class="text-success">Password confirmed.</i></p>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4">
                            <div class="float-start">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    <i class="fa fa-trash"></i>&nbsp;&nbsp;Remove
                                </button>
                            </div>
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary primary-btn" id="submitUpdate"> Submit </button>
                                <a href="{{ route('admin_viewUsers') }}" class="btn btn-danger"> Cancel </a>
                            </div>
                        </form>
                    </div>
                @endforeach
                
            </div>

            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="ConfirmDelete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteTitle"><h4>Delete Employee Details</h4></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-warning">This will permanently remove employee details.</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('admin_removeUser',['id'=>$id]) }}" method="POST">
                                @csrf
                                <button type="submit" id="btnDel" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script>
        $(document).ready(function(){
            $("#password").on("keyup", function(){
                var pass = $("#password").val();
                var btnSubmit = document.getElementById("submitUpdate");

                if(pass === ''){
                    btnSubmit.disabled = false;
                }else{
                    btnSubmit.disabled = true;
                }
            });


            $("#cpassword").on("keyup", function(){
                var pass = $("#password").val();
                var cpass = $("#cpassword").val();
                var btnSubmit = document.getElementById("submitUpdate");
                var labelConfirm = document.getElementById("errConfirm");
                var sucConfirm = document.getElementById("sucConfirm");

                btnSubmit.disabled = true;
                labelConfirm.hidden = true;
                sucConfirm.hidden = true;
                if(pass === cpass){
                    btnSubmit.disabled = false;
                    sucConfirm.hidden = false;
                    labelConfirm.hidden = true;
                }else{
                    labelConfirm.hidden = false;
                    sucConfirm.hidden = true;
                }
                if(cpass === ''){
                    sucConfirm.hidden = true;
                    labelConfirm.hidden = true;
                }
            });
        });

        $(document).ready(function(){
            const imgInput = document.getElementById("imgInput");
            const imgPreviewContainer = document.getElementById("imgPreview");
            const updateImg = document.getElementById("updateImg");
            const previewImage = imgPreviewContainer.querySelector(".imgPrev");
            const defImage = imgPreviewContainer.querySelector(".imgDef");
            const imgWarning = updateImg.querySelector(".imgWarning");

            imgInput.addEventListener("change",function(){
                var fileName = document.querySelector('#imgInput').value;
                var extension = fileName.split('.').pop();
                const img = this.files[0];
                
                if(img){
                    if(extension == "png" || extension == "jpg" || extension == "jpeg" || extension == "gif"){
                        const reader = new FileReader();
                
                        previewImage.style.display = "block";
                        defImage.style.display = "none";
                        imgWarning.style.display = "none";
                
                        reader.addEventListener("load",function(){
                            previewImage.setAttribute("src", this.result);
                        });
                        reader.readAsDataURL(img);
                    }else{
                        imgInput.value = '';
                        previewImage.style.display = "none";
                        defImage.style.display = "block";
                        imgWarning.style.display = "block";
                    }
                }else{
                    previewImage.style.display = "none";
                    defImage.style.display = "block";
                    imgWarning.style.display = "none";
                }
            });    
        });
                 
    </script>
@endsection