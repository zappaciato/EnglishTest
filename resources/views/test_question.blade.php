

<h1>{{$question->instruction}}</h1>
<h2>{{$question->content}}</h2>
<h3>Correct answer: {{$question->correct}}</h3>

@can('manage-page')
<a href="{{route('admin.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@else
<a href="{{route('user.dashboard')}}" class="btn btn-secondary mb-2" style="width: 10rem; margin-top:30px;">Go back to dashboard</a>
@endcan