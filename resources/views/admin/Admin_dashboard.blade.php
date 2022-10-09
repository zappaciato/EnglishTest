@extends('layouts.app')

@section('content')

    <div class="container p-2">
        <div class="container card-header p-2"> 
            <div class="row overflow-hidden">
                <div class="col-2 col-style">
                    <button class="btn btn-success btn-lg">
                        <a class="text-decoration-none p-2 text-white" href=" {{route('questions.list')}}">{{ __('View Questions') }}</a>
                    </button>
                </div>
                <div class="col-2 col-style">
                    <button class="btn btn-warning btn-lg">
                        <a class="text-decoration-none p-2 text-white" href=" {{route('add.question')}}">{{ __('Add Questions') }}</a>
                    </button>
                </div>
                <div class="col-2 col-style">
                    <button class="btn btn-primary btn-lg">
                    <a class="text-decoration-none p-2 text-white" href=" {{route('test.question')}}">{{ __('Test Yourself') }}</a>
                </button>
                </div>
            </div>
        </div>

        <div class="container card p-5">
        
            <div class="container overflow-hidden p-3">
                <div class="row gy-3">

                    <div class="col-6 col-style">
                        <div class="p-3 border bg-light">
                            <h5 style="font-size: 0.9rem">{{ __('Users registered:') }}</h5>
                            <h3>{{count($users)}}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-style">
                        <div class="p-3 border bg-light">
                            <h5 style="font-size: 0.8rem">{{ __('Number of questions:') }}</h5>
                            <h3>{{count($questions)}}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-style">
                        <div class="p-3 border bg-light">
                            <h5 style="font-size: 0.8rem">{{ __('All answered questions:') }}</h5>
                            <h3>{{count($results)}}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-style">
                        <div class="p-3 border bg-light">
                            <h5 style="font-size: 0.8rem">{{ __('Best User:') }} </h5>
                            <h3>{{$stats->name}}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-style">
                        <div class="p-3 border bg-light">
                            <h5 style="font-size: 0.8rem">{{ __('Best User Correct Answers Total:') }} </h5>
                            <h3>{{$stats->general_correct}}</h3>
                        </div>
                    </div>
                    <div class="col-6 col-style">
                        <div class="p-3 border bg-light">
                            <h5 style="font-size: 0.8rem">{{ __('Best User Correct Answers Total:') }} </h5>
                            <h3>{{$stats->general_correct}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
