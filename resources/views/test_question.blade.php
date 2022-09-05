@foreach($questions as $question)

<h1>{{$question->instruction}}</h1>
<h2>{{$question->content}}</h2>
<h3>Correct answer: {{$question->correct}}</h3>
@endforeach