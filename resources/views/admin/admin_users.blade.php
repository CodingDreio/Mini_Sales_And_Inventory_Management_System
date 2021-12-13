@extends('layouts.admin_layout')
@section('content')
    <div class="container p-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('admin_viewUsers') }}"><h2 class="header-text"><i class="fa fa-users"></i>&nbsp;&nbsp;Users</h2></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> </ul>
                <form class="d-flex">
                    <div class="input-group">
                        <input id="searchUser" class="form-control mt-1" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        {{-- <span class="btn"><i class="fas fa-search"></i></span> --}}
                        <button class="btn btn-primary mt-1 primary-btn" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        <a href="{{ route('admin_addUsers') }}" class="btn btn-primary form-inline ms-2 mt-1 primary-btn" id="btn-plus-label"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Users</a>
                        <a href="{{ route('admin_addUsers') }}" class="btn btn-primary form-inline ms-2 mt-1 primary-btn" id="btn-plus"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </form>
              </div>
            </div>
          </nav>
        <hr>

        <section id="list">
            <div>
                <div class="row">
                    @foreach ($users as $user)
                        <div class="col-md-12 col-lg-4 col-sm-12 mt-4 d-flex">
                            <div class="card flex-fill shadow-lg">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('images/'.$user->photo) }}" alt="" class="employee-img" alt="Photo">
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <a href="{{ route('admin_updateUsers',['id'=>$user->id]) }}" class="empUpdateLink">
                                            <h5>{{ $user->first_name.' '.$user->last_name }}</h5>
                                            <h6>
                                                @if ($user->role == 2)
                                                    Cashier
                                                @elseif ($user->role == 3)
                                                    Inventory
                                                @elseif ($user->role == 1)
                                                    Admin
                                                @endif
                                            </h6>
                                        </a>
                                        <hr>
                                        <div class="input-group mb-3">
                                            <span id="phone-icon"><i class="fa fa-phone"></i></span>
                                            <span class="ms-3" id="phone"><h6>{{ $user->phone_no }}</h6></span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span id="email-icon"><i class="fa fa-envelope"></i></span>
                                            <span class="ms-3" id="email"><h6>{{ $user->email }}</h6></span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span id="address-icon"><i class="fa fa-map-marker-alt"></i></span>
                                            <span class="ms-3" id="address">
                                                <h6>
                                                    {{ $user->street }},
                                                    {{  $user->city }},
                                                    {{  $user->province }},
                                                    {{  $user->zip_code }}
                                                </h6></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <script>

        $(document).ready(function(){
            $("#searchUser").on("keyup", function(){
                var keyword = $("#searchUser").val();
                if(keyword==""){
                    $.ajax({
                        type:"get",
                        url:"/admin/search_user/"+keyword,
                        datatype:"json",
                        success:function(response){
                            
                        }
                    });
                }else{
                    $.ajax({
                    type:"get",
                    url:"/admin/search_user/"+keyword,
                    datatype:"json",
                    success:function(response){
                        
                    }
                });
                }
                
            });
        });


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