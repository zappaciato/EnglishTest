@extends('layouts.app')

@section('content')
    
    <form method="POST" action="{{ route('add.question') }}">
        @csrf
        <div class="d-flex flex-column py-5 container align-items-center" >
            <div style="width: 50vw; margin-bottom: 30px;" class="d-flex justify-content-start align-items-start"><h2>Add a question</h2></div>
        
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
            <div class="row mt-5">
                <label for="">Answers</label>
                <div class="col">
                    <span>A</span><input type="text" class="form-control border border-secondary" name="answer_a" value="{{old('answer_a')}}" placeholder="Answer A">
                </div>
                <div class="col">
                    <span>B</span><input type="text" class="form-control border border-secondary" name="answer_b" value="{{old('answer_b')}}" placeholder="Answer B">
                </div>
                <div class="col">
                    <span>C</span><input type="text" class="form-control border border-secondary" name="answer_c" value="{{old('answer_c')}}" placeholder="Answer C">
                </div>
                <div class="col">
                    <span>D</span><input type="text" class="form-control border border-secondary" name="answer_d" value="{{old('answer_d')}}" placeholder="Answer D">
                </div>
            </div>
            <div class="container d-flex justify-content-start flex-row align-items-center mt-5">
                <label class="py-2 m-5" for="formGroupExampleInput">Correct Answer:</label>
                <label class="m-3" for="">A<input type="radio" name="correct"></label>
                <label class="m-3" for="">B<input type="radio" name="correct"></label>
                <label class="m-3" for="">C<input type="radio" name="correct"></label>
                <label class="m-3" for="">D<input type="radio" name="correct"></label>
            </div>
        </div>
    
        {{-- Questions' Categories --}}
        {{-- @include('includes.categories') --}}

            <div class="d-flex flex-row py-3 justify-content-end align-items-center d-md-inline-flex container">
                <input class="btn btn-secondary" type="submit" value="Submit">
                <input class="ms-3 btn btn-danger" type="cancel" value="Cancel">
            </div>
        </div>
    </form>
@endsection