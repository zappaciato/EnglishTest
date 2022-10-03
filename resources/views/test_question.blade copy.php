@extends('layouts.app')
@section('content')

<div class="container-md d-flex flex-column p-5">

<form method="POST" action="{{route('test.question')}}">
<div class="d-flex flex-column p-5">
{{-- <h4>Question number: {{$question->id}}</h4> --}}

<h4 class="text-primary">{{$question->instruction}}</h4>
{{-- <h4>Question content:</h4> --}}
<h3 class="text-secondary mt-5">{{$question->content}}</h3>


<div class="container d-flex justify-content-start flex-row align-items-center mt-2 border">
                <label class="py-1 m-4" for="formGroupExampleInput">Answers:</label>
                <label class="m-3" for="">{{$answers->answer_a}}<input style="margin-left: 15px;" type="radio" name="correct" value="answer_a"></label>
                <label class="m-3" for="">{{$answers->answer_b}}<input style="margin-left: 15px;" type="radio" name="correct" value="answer_b"></label>
                <label class="m-3" for="">{{$answers->answer_c}}<input style="margin-left: 15px;" type="radio" name="correct" value="answer_c"></label>
                <label class="m-3" for="">{{$answers->answer_d}}<input style="margin-left: 15px;" type="radio" name="correct" value="answer_d"></label>
            </div>
<input class="btn btn-secondary" type="submit" value="Submit">
</form>

<h3>Correct answer: {{$question->correct}}</h3>
</div>
@can('manage-page')
<a href="{{route('admin.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@else
<a href="{{route('user.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@endcan
</div>
@endsection