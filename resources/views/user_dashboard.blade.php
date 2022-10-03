@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container row justify-content-center">
        <div class="col-md-12">
            <div class="card container row">
      {{-- Here goes auth() for admin user or any other user --}}
                <div class="container-fluid card-header d-flex justify-content-between"> 
                    <h3><a class="text-decoration-none p-2 text-danger" href=" {{route('test.question')}}">{{ __('Test Yourself') }}</a></h3>
                </div>
                <h5>Hi {{ Auth::user()->name }}! Here are your stats:</h5>

                <div class="row justify-content-evenly p-5">
                    <div class="col-sm border p-5 d-flex flex-column align-items-center" >    
                        <h5>Number of questions:</h5>
                        <h3>{{count($questions)}}</h3>
                    </div>
                    <div class="col-sm border p-5 d-flex flex-column align-items-center" >
                        <h5>Questions answered:</h5>
                        <h3>0</h3>
                    </div>
                    <div class="col-sm border p-5 d-flex flex-column align-items-center" >
                        <h5>Correct answers:</h5>
                        <h3>0</h3>
                    </div>
                    <div class="col-sm border p-5 d-flex flex-column align-items-center" >
                        <h5>English Level</h5>
                        <h3>B1</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
