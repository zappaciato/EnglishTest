@extends('layouts.app')

@section('content')

    <div class="container card p-5">
        <h3>Hi {{auth()->user()->name}}, here is some infor for you: </h3>
        <div class="container overflow-hidden p-3">
            <div class="row gy-3">
                <div class="col-6 col-style">
                    <div class="p-3 border bg-light">
                        <h5>Questions waiting for your answer: </h5>
                        <h4>{{count($questions) - count($resultsAll)}}</h4></div>
                </div>
                <div class="col-6 col-style">
                    <div class="p-3 border bg-light">
                        <h5>Questions answered: </h5>
                        <h4>{{count($resultsAll)}}</h4></div>
                </div>
                <div class="col-6 col-style">
                    <div class="p-3 border bg-light">
                        <h5>All your correct answers: </h5>
                        <h4>{{count($resultsCorrect)}}</h4></div>
                </div>
                <div class="col-6 col-style">
                    <div class="p-3 border bg-light">
                        <h5>Your possible general English level is: </h5>
                        <h4>{{$englishLevel}}</h4></div>
                </div>
            </div>
        </div>

        <div style="width: 50vw;" class="d-flex flex-row container-fluid justify-content-center p-5 align-items-center mt-5">
            <div class="d-flex"> 
                <button class="btn btn-primary btn-lg"><a class="text-decoration-none p-2 text-white" href=" {{route('test.question')}}">{{ __('Test Yourself') }}</a></button>
            </div>
        </div>

        @include('partials.dashboard_block.stats_grid');

    </div>
@endsection
