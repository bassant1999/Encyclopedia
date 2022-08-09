
@extends('layouts.master')  
@section('title')  
Entry page  
@stop  

@section('content')    
    <?php echo $content ?>
    <a class="btn btn-primary" href="{{route('edit',['title' => $title])}}"> Edit </a>
@stop  

