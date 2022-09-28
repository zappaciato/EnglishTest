@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('question.truefalse') }}">
        @csrf


        {{-- question type hidden input --}}
        <input type="hidden" value="trueFalse" name="type" id="type">

        <div class="d-flex flex-column py-5 container align-items-center" >
            <div style="width: 50vw; margin-bottom: 30px;" class="d-flex justify-content-start align-items-start"><h2>Add a True or False question</h2></div>
        
        {{-- Question and instructions --}}
        <div style="width:45vw; height:auto" class="form-group d-flex flex-column">

            <label for="">Question instruction</label>
            <div class="input-group">
                <input type="text" class="form-control border border-secondary"  name="instruction" placeholder="Question instruction..." value="{{ old('instruction') }}">
            </div>

            <label for="">Question content</label>
            <div class="input-group">
                <input type="text" class="form-control border border-secondary" name="content" placeholder="Question content..." value="{{ old('content') }}">
            </div>

            {{-- Answers --}}
            <div class="row">
                <div class="container d-flex justify-content-start flex-row align-items-center">
                    <label class="py-2 m-5" for="formGroupExampleInput">Correct Answer:</label>
                    {{-- question answer hidden input --}}
                    <input type="hidden" value="1" name="answer_a" id="answer_a">
                    <input type="hidden" value="0" name="answer_b" id="answer_b">
                    <input type="hidden" value="0" name="answer_c" id="answer_c">
                    <input type="hidden" value="0" name="answer_d" id="answer_d">
                    <label class="m-3" for="answer_a">True<input type="radio" name="correct" value="answer_a" id="correct"></label>
                    <label class="m-3" for="answer_b">False<input type="radio" name="correct" value="answer_b" id="correct"></label>
                
                </div>
                <div class="container d-flex justify-content-start flex-row align-items-center mt-5">
                <label class="py-2 m-5" for="formGroupExampleInput">Level:</label>
                <label class="m-3" for="">A1<input type="radio" name="level" value="a1"></label>
                <label class="m-3" for="">A2<input type="radio" name="level" value="a2"></label>
                <label class="m-3" for="">B1<input type="radio" name="level" value="b1"></label>
                <label class="m-3" for="">B2<input type="radio" name="level" value="b2"></label>
                <label class="m-3" for="">C1<input type="radio" name="level" value="c1"></label>
            </div>
            </div>
            
        </div>
    
        {{-- Questions' Categories --}}
        @include('includes.categories')

            <div class="d-flex flex-row py-3 justify-content-end align-items-center d-md-inline-flex container">
                <input class="btn btn-secondary" type="submit" value="Submit">
                <a href="{{route('add.question')}}" class="ms-3 btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>


@endsection