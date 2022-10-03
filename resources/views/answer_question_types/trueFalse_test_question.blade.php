@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

@section('content')

<div class="bg-info container d-flex justify-content-start flex-column align-items-start mt-2 border">
    <div class="modal-content">
        @include('partials.question_block.instruction')

        <div class="modal-header">
            <h3 class="text-secondary mt-5">{{$question->content}}</h3>
        </div>

        @include('partials.question_block.truefalse_answers')

       <div>
       <input class="btn btn-secondary mt-5" type="submit" value="Submit">
       </div>
   </div>

@can('manage-page')
<a href="{{route('admin.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@else
<a href="{{route('user.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@endcan

</div>
</div>
</div>
@endsection