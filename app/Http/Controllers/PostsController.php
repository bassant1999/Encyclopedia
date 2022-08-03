<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

include 'FileController.php';
 

class PostsController extends Controller
{
    public function index()  
    { 
    //$r = app('App\Http\Controllers\FileController')->get_entry("CSS");
    $r = new FileController();
      return $r->get_entry("HTML");
    } 

}
