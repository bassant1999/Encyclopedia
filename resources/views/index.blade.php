@extends('layouts.master')  
@section('title')  
Home page  
@stop  

@section('content')  
    <h1>Home Page </h1>  
    <ul>
        @foreach($files as $file)  
        <li><a href="{{route('wiki', ['title' => $file])}}">{{$file}}</a></li>
        @endforeach 
    </ul> 
@stop  

