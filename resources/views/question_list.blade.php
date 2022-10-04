@extends('layouts.app')

@section('content')
<div class="container">
    @if (($questionData->count() > 0))
<table style="width: 70vw" class="border d-flex p-2 text-wrap">

    <tr>
        <th>Question Id</th>
        <th>Content</th>
        <th>Categories</th>
        <th>Type</th>
        <th>Action</th>
    </tr>
    <tr>
        @for ($i=0; $i<count($questionData); $i++)

        <td class="border" >{{$questionData[$i][0]->id}}</td> 
        <td class="border text-break">{{$questionData[$i][0]->content}}</td>
        <td class=" border justify-content-end flex-wrap ">
            <span  {!! $questionData[$i][1]->grammar ? 'class="btn btn-outline-primary btn-sm""' : 'class="d-none d-print-none"'!!}>{{$questionData[$i][1]->grammar ? 'Grammar' : ''}}</span>
            <span {!! $questionData[$i][1]->tenses ? 'class="btn btn-outline-success btn-sm"' : 'class="d-none d-print-none"'!!}>{{$questionData[$i][1]->tenses ? 'Tenses' : ''}}</span>
            <span  {!! $questionData[$i][1]->present_simple ? 'class="btn btn-outline-danger btn-sm"' : 'class="d-none d-print-none"'!!}>{{$questionData[$i][1]->present_simple ? 'Present Simple' : ''}}</span>
            <span  {!! $questionData[$i][1]->vocabulary ? 'class="btn btn-outline-warning btn-sm"' : 'class="d-none d-print-none"'!!}>{{$questionData[$i][1]->vocabulary ? 'Vocabulary' : ''}}</span>
            <span  {!! $questionData[$i][1]->business ? 'class="btn btn-outline-dark btn-sm"' : 'class="d-none d-print-none"'!!}>{{$questionData[$i][1]->business ? 'Business' : ''}}</span>

        </td>
        <td class="border h6">{{$questionData[$i][0]->type}}</td>
        <td class="d-flex p-2 justify-content-between border-top align-items-center"> 
            {{-- Here goes link to a single question with id --}}
            <span> <a href="href= {{route('test.question', ['id'=>$questionData[$i][0]->id])}}" class="btn btn-danger btn-sm"> Delete</a></span>
            <span> <a href="href= {{route('test.question', ['id'=>$questionData[$i][0]->id])}}" class="btn btn-primary btn-sm"> Edit</a></span>
        </td>

    </tr>
    @endfor
    
</table>
@else
    <h1>There are no questions yet. <a href="{{route('add.question')}}">Add more Questions</a> to see them here. </h1>
@endif
</div>
@endsection