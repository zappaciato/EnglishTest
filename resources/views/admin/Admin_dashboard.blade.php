@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container row justify-content-center">
        <div class="col-md-12">
            <div class="card container">
      {{-- Here goes auth() for admin user or any other user --}}
                <div class="container-fluid card-header d-flex justify-content-start"> 
                    {{-- <h3>{{ __('Admin Dashboard') }}</h3> --}}
                    <h3><a class="text-decoration-none text-underline-hover p-2 text-primary h5" href=" {{route('questions.list')}}">View Questions</a></h3>
                    <h3><a class="text-decoration-none p-2 text-primary h5" href=" {{route('add.question')}}">Add Questions</a></h3>
                    <h3><a class="text-decoration-none p-2 text-primary h5" href=" {{route('test.question')}}">Test Yourself</a></h3>
                    
                </div>
                <div class="row justify-content-evenly p-5">
                    <div class="col-sm border p-5 d-flex flex-column align-items-center justify-content-center" >
                        <h5 style="font-size: 0.9rem">Users registered:</h5>
                        <h3 style="font-size: 1.8rem">{{count($users)}}</h3>
                        
                    </div>
                    <div class="col-sm border p-5 justify-content-center d-flex flex-column align-items-center" >    
                        <h5 style="font-size: 0.8rem">Number of questions:</h5>
                        <h3 style="font-size: 1.8rem">{{count($questions)}}</h3>
                    </div>
                    <div class="col-sm border p-5 justify-content-center d-flex flex-column align-items-center" >
                        <h5 style="font-size: 0.8rem">Questions answered to date:</h5>
                        <h3 style="font-size: 1.8rem">{{count($results)}}</h3>
                    </div>
                    <div class="col-sm border p-5 justify-content-center d-flex flex-column align-items-center" >
                        <h5 style="font-size: 0.6rem">Top User:</h5>
                        <h3 style="font-size: 1.8rem">{{$userName->name}}</h3>
                    </div>
                    <div class="col-sm border p-5 justify-content-center d-flex flex-column align-items-center" >
                        <h5 style="font-size: 0.6rem">Top User (correct answers):</h5>
                        <h3 style="font-size: 1.8rem">{{$stats->general_correct}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
