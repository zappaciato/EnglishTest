@extends('layouts.app')
@section('content')


<form method="POST" action="{{route('test.question')}}">
    @csrf
<div class="bg-info container d-flex justify-content-start flex-column align-items-start mt-2 border">

    <div class="modal-content">

        @include('partials.question_block.instruction')

        @include('partials.question_block.content')

        @include('partials.question_block.multi_answers')

        <div>
            <input class="btn btn-secondary mt-5" type="submit" value="submit">
        </div>

    </div>

@can('manage-page')
<a href="{{route('admin.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@else
<a href="{{route('user.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@endcan

</div>
</form>
@endsection