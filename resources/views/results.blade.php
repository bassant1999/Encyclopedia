@extends('layouts.master')  
@section('title')  
Results page  
@stop  

@section('content')  
    <h1>Results</h1>  
    <ul>
        @foreach($titles as $t)  
        <li><a href="{{route('wiki', ['title' => $t])}}">{{$t}}</a></li>
        @endforeach 
    </ul> 
@stop  

