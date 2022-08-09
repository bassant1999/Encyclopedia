
@extends('layouts.master')  
@section('title')  
Edit page  
@stop  

@section('content')    
<div class="container">
    <form method="POST" action="{{route('editEntry',['title' => $title])}}">
        
        {{ csrf_field() }}

        <div class="mb-3">
            <label class="form-label" for="inputtextarea">Content:</label>
            <textarea class="form-control" placeholder="add content" rows="10" name="content">{{$content}}</textarea>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary btn-submit">Save</button>
        </div>
    </form>
</div>
@stop  

