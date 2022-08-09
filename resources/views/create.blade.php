
@extends('layouts.master')  
@section('title')  
Create page  
@stop  

@section('content')  
    <div class="container">
        
        <h1>Create page</h1>
    
        @if(Session::has('fail'))
        <div class="alert alert-warning">
            {{ Session::get('fail') }}
            @php
                Session::forget('fail');
            @endphp
        </div>
        @endif
    
        <form method="POST" action="{{route('create')}}">
    
            {{ csrf_field() }}
    
            <div class="mb-3">
                <label class="form-label" for="inputName">Title:</label>
                <input type="text" name="title"  id="inputName"class="form-control" placeholder="title">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="inputtextarea">Content:</label>
                <textarea class="form-control" placeholder="add content" rows="10" name="content"></textarea>

                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
    
            <div class="mb-3">
                <button class="btn btn-primary btn-submit">Save</button>
            </div>
        </form>
    </div>  
@stop  

