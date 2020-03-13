@extends('admin.layouts.front')

@section('content')

       
<div class="account-pages"></div>

        <!-- Begin page -->
        <div class="wrapper-page">
            <div class="card">
                <div class="card-block">

                    <div class="ex-page-content text-center">

                        
                        <h1 class="text-dark"> 404!</h1>
                        <h4 class="">Sorry, page not found</h4><br>

                    <a class="btn btn-info mb-5 waves-effect waves-light" href="{{ route('login')}}"><i class="mdi mdi-home"></i> Back to Login</a>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">© Copyright Reserved to Nugsoft </p>
            </div>

        </div>

   


@endsection