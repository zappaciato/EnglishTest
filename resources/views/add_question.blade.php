@extends('layouts.app')

@section('content')
    
    <form>
        @csrf
        <div class="d-flex flex-column py-5 container align-items-center" >
            <div style="width: 50vw; margin-bottom: 30px;" class="d-flex justify-content-start align-items-start"><h2>Add a question</h2></div>
        
        {{-- Question and instructions --}}
        <div style="width:45vw; height:auto" class="form-group d-flex flex-column">

            <label for="">Question instruction</label>
            <div class="input-group">
                <input type="text" class="form-control border border-secondary">
            </div>

            <label for="">Question content</label>
            <div class="input-group">
                <input type="text" class="form-control border border-secondary">
            </div>

            {{-- Answers --}}
            <div class="row mt-5">
                <label for="">Answers</label>
                <div class="col">
                    <span>A</span><input type="text" class="form-control border border-secondary" placeholder="Answer A">
                </div>
                <div class="col">
                    <span>B</span><input type="text" class="form-control border border-secondary" placeholder="Answer B">
                </div>
                <div class="col">
                    <span>C</span><input type="text" class="form-control border border-secondary" placeholder="Answer C">
                </div>
                <div class="col">
                    <span>D</span><input type="text" class="form-control border border-secondary" placeholder="Answer D">
                </div>
            </div>
            <div class="container d-flex justify-content-start flex-row align-items-center mt-5">
                <label class="py-2 m-5" for="formGroupExampleInput">Correct Answer:</label>
                <label class="m-3" for="">A<input type="radio"></label>
                <label class="m-3" for="">B<input type="radio"></label>
                <label class="m-3" for="">C<input type="radio"></label>
                <label class="m-3" for="">D<input type="radio"></label>
            </div>
        </div>
    
        {{-- Questions' Categories --}}
        @include('includes.categories')

            <div class="d-flex flex-row py-3 justify-content-end align-items-center d-md-inline-flex container">
                <button type="button" class="btn btn-secondary">Submit</button>
                <button type="button" class="ms-3 btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
        
@endsection