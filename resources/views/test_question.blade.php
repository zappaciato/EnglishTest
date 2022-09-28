@extends('layouts.app')
@section('content')

<div class="container">
<div class="d-flex flex-column p-5">
<h4>Question number: {{$question->id}}</h4>
<h4>Instructions:</h4>
<h3>{{$question->instruction}}</h3>
<h4>Question content:</h4>
<h2>{{$question->content}}</h2>

<div class="container d-flex justify-content-start flex-row align-items-center mt-5 border border-primary">
                <label class="py-2 m-5" for="formGroupExampleInput">Answers:</label>
                <label class="m-3" for="">{{$question->answer_a}}<input type="radio" name="correct" value="answer_a"></label>
                <label class="m-3" for="">{{$question->answer_b}}<input type="radio" name="correct" value="answer_b"></label>
                <label class="m-3" for="">{{$question->answer_c}}<input type="radio" name="correct" value="answer_c"></label>
                <label class="m-3" for="">{{$question->answer_d}}<input type="radio" name="correct" value="answer_d"></label>
            </div>



<h3>Correct answer: {{$question->correct}}</h3>
</div>
@can('manage-page')
<a href="{{route('admin.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@else
<a href="{{route('user.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@endcan
</div>
@endsection