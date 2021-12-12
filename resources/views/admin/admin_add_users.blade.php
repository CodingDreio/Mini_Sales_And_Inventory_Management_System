@extends('layouts.admin_layout')
@section('content')
    <div class="container p-3">
        <a class="header-link" href="{{ route('admin_viewUsers') }}">
            <h2 class="header-text">
                <i class="fa fa-users"></i>
                &nbsp;&nbsp;Users
            </h2>
        </a>
        <hr>

        <section id="addEmployeeForm">
            <div class="card w-75 m-auto shadow-lg">
                <div class="card-header pt-4 ps-4 pe-4">
                    <a href="{{ route('admin_viewUsers') }}" class="btn btn-danger float-end"><i class="fa fa-times-circle"></i> </a>
                    <h4 class="text-center text-primary">Add Users</h4>
                    <h6 class="text-secondary">Fields with (<span class="text-danger">*</span>) is required.</h6>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin_storeUsers') }}" method="post">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="mb-2">
                                    <div class="align-items-center text-center" id="updateImg">
										<div class="align-items-center text-center" id="imgPreview">
											<img src="{{ asset('images/default.png')}}" alt="Profile Picture" class="rounded-circle imgDef" width="150">
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
                                <input class="form-control" type="text" placeholder="First Name" id="fname" name="fname" required>
                            </div>
                            {{-- <div class="col-md-4 col-lg-4 col-sm-12 mb-1">
                                <input class="form-control" type="text" placeholder="Middle Name" id="mname" name="mname">
                            </div> --}}
                            <div class="col-md-6 col-lg-6 col-sm-12 mb-1">
                                <input class="form-control" type="text" placeholder="Last Name" id="lname" name="lname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4 col-sm-12">
                                <div class="mb-2">
                                    <label for="address" class="form-label">Street: <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" placeholder="Street" id="street" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-12">
                                <div class="mb-2">
                                    <label for="address" class="form-label">City: <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" placeholder="City" id="city" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-12">
                                <div class="mb-2">
                                    <label for="address" class="form-label">Provivince: <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" placeholder="Provivince" id="province" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2 col-sm-12">
                                <div class="mb-2">
                                    <label for="address" class="form-label">Zip-Code:&nbsp;<strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" placeholder="Zip-Code" id="zipcode" name="address" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <div class="mb-2">
                                    <label for="fate" class="form-label">Bithdate: <strong class="text-danger">*</strong></label>
                                    <input type="date" class="form-control" placeholder="Date" id="bdate" name="bdate" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Phone: <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email: <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="mb-2">
                                    <label for="uname" class="form-label">Account Type: <strong class="text-danger">*</strong></label>
                                    {{-- <input type="text" class="form-control" placeholder="Username" id="uname" name="uname" required> --}}
                                    <select name="type" id="type" class="form-select">
                                        <option value='2' selected>Cashier</option>
                                        <option value='3' >Inventory</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password <strong class="text-danger">*</strong></label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="mb-2">
                                    <label for="password" class="form-label">Confirm Password <strong class="text-danger">*</strong></label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                        <div class="float-end">
                            <a href="{{ route('admin_viewUsers') }}" class="btn btn-danger"> Cancel </a>
                            <button type="submit" class="btn btn-primary"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    
    <script>
                
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
    </script>
@endsection