@extends('layouts.admin_layout')
@section('content')
    <div class="container p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('admin_viewUsers') }}"><h2 class="header-text"><i class="fa fa-users"></i>&nbsp;&nbsp;Users/Employees</h2></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> </ul>
                <form class="d-flex">
                    <div class="input-group">
                        <input id="searchUser" class="form-control mt-1" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        {{-- <span class="btn"><i class="fas fa-search"></i></span> --}}
                        <button class="btn btn-primary mt-1" style="background-color: #1F4068;" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        <a href="{{ route('admin_addUsers') }}" class="btn btn-primary form-inline ms-2 mt-1 primary-btn" id="btn-plus-label"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Users</a>
                        <a href="{{ route('admin_addUsers') }}" class="btn btn-primary form-inline ms-2 mt-1 primary-btn" id="btn-plus"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </form>
              </div>
            </div>
          </nav>
        <hr>

        <section id="list">

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="background-color: #32502E;color:#ffffff;" id="basic-addon1"><i class="fa fa-sliders-h"></i>&nbsp;&nbsp;View Option:</span>
                        <select class="form-select" aria-label="Default select example" id="viewOption">
                            <option value="1" selected>Table View</option>
                            <option value="2">Card View</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <table class="table table-striped table-hover" style="background-color: #ffffff;">
                    <thead style="background-color: #42743c;color:#ffffff;">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="hidden-col">Address</th>
                            <th scope="col" class="hidden-col-a">Role</th>
                        </tr>
                    </thead>
                    <tbody id="usersList">
                        @foreach ($users as $user)
                                <tr onclick="updateUser({{ $user->id }})">
                                    <td class="ps-3">
                                        {{ $user->first_name.' '.$user->last_name }}
                                    </td>
                                    <td>{{ $user->phone_no }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="hidden-col">{{ $user->street.', '.$user->city.', '.$user->province.', '.$user->zip_code }}</td>
                                    <td class="hidden-col-a">
                                        @if ($user->role == 2)
                                            Cashier
                                        @elseif ($user->role == 3)
                                            Inventory
                                        @elseif ($user->role == 1)
                                            Admin
                                        @endif
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        function updateUser(userId){
            location.replace("/admin/users/update/"+userId);
        }

        $(document).ready(function(){
            $("#viewOption").on("change", function(){ 
                if($("#viewOption").val() === '2'){
                    location.replace("/admin/users");
                }
            });
        });


        // Search user
        $(document).ready(function(){
            $("#searchUser").on("keyup", function(){
                var keyword = $("#searchUser").val();
                if(keyword==""){
                    $.ajax({
                        type:"get",
                        url:"/admin/fetch_user/list",
                        datatype:"json",
                        success:function(response){
                            $('#usersList').html('');
                            $('#usersList').append(response.str);
                        }
                    });
                }else{
                    $.ajax({
                        type:"get",
                        url:"/admin/search_user/list/"+keyword,
                        datatype:"json",
                        success:function(response){
                            // $.each(response.users, function(key, str){
                            //     $('#usersList').html('');
                            //     $('#usersList').append(response.str);
                            // });
                                $('#usersList').html('');
                                $('#usersList').append(response.str);
                        }
                    });
                }
                
            });
        });
        
        // Add User Button
        var w = window.innerWidth;
        var x = document.getElementById("btn-plus-label");
        var y = document.getElementById("btn-plus");
        if(w <= 768){
            // x.style.visibility = "hidden";
            // y.style.visibility = "visible";
            x.style.display = "none";
            y.style.display = "inline-block";
        }else{
            // x.style.visibility = "visible";
            // y.style.visibility = "hidden";
            x.style.display = "inline-block";
            y.style.display = "none";
        }

        window.addEventListener("resize",function(){
            var w = window.innerWidth;
            var x = document.getElementById("btn-plus-label");
            var y = document.getElementById("btn-plus");
            if(w <= 768){
                // x.style.visibility = "hidden";
                // y.style.visibility = "visible";
                x.style.display = "none";
                y.style.display = "inline-block";
            }else{
                // x.style.visibility = "visible";
                // y.style.visibility = "hidden";
                x.style.display = "inline-block";
                y.style.display = "none";
            }
        });




    </script>
@endsection