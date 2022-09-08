@extends('layouts.app')

@section('content')
    
        <div class="d-flex flex-column py-5 container align-items-center" >
            <div style="width: 50vw; margin-bottom: 30px;" class="d-flex justify-content-start flex-column align-items-start">

                <h2>Choose a question type:</h2>
                <a href="{{route('question.multi')}}" class="btn btn-primary mb-2" style="width: 10rem;">Multiple question</a>
                <a href="{{route('question.truefalse')}}" class="btn btn-success mb-2" style="width: 10rem;">True or False</a>
                <a href="{{route('question.reading')}}" class="btn btn-warning mb-2" style="width: 10rem;">Reading</a>
                <a href="{{route('question.listening')}}" class="btn btn-info mb-2" style="width: 10rem;">Listening</a>

                <a href="{{route('admin.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>

        </div>

@endsection