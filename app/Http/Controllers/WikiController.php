<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

include 'FileController.php';

include '../vendor/autoload.php';
 
use League\CommonMark\CommonMarkConverter;


class WikiController extends Controller
{
    // Home
    public function index()  
    { 
    $files = app('App\Http\Controllers\FileController')->entries_list();
    return view('index', ['files'=>$files]);  
    } 

    // entry
    public function entry($title)  
    { 
        $content = app('App\Http\Controllers\FileController')->get_entry($title);
        if($content){
            $converter = new CommonMarkConverter();
            $content =  $converter->convertToHtml($content);
            return view('entry', ['content'=>$content, 'title' =>$title]); 
        }
        return view('error', ['content'=>"No such Entry"]); 
    } 
    
    // search
    public function search(Request $request)
    {
        $validatedData = $request->validate([
                'q' => 'required'
            ], [
                'q.required' => 'this field is required.'
            ]);
        $filec =  new FileController();
        $entry = $filec->get_entry($validatedData['q']);
        if($entry) {
            return redirect('wiki/'.$validatedData['q']); 
        }
        $titles = [];
        $title = $validatedData['q'];
        $files = app('App\Http\Controllers\FileController')->entries_list();
        foreach ($files as $file) {
            if (str_contains(strtolower($file), strtolower($title)) !== false) {
                $titles[] = $file;
            }
        }
        return view('results',['titles'=> $titles]);  
    }

    // create new page
    public function create()  
    { 
        return view('create');
    }
    public function createentry(Request $request)  
    { 
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ], [
            'title.required' => 'Title field is required.',
            'content.required' => 'Content field is required.'
        ]);
        $title = $validatedData['title'];
        $content = $validatedData['content'];
        $files = app('App\Http\Controllers\FileController')->entries_list();
        foreach ($files as $file) {
            if ($file == $title) {
                return back()->with('fail', 'This title is already exists');
            }
        }
        app('App\Http\Controllers\FileController')->save_entry($title, $content);
        return redirect('wiki/'.$title);
        
    } 

    //edit entry
    public function edit($title)  
    { 
        $content = app('App\Http\Controllers\FileController')->get_entry($title); 
        return view('edit', ["content" => $content, "title" => $title]); 
    } 
    public function editEntry(Request $request, $title)  
    { 
        app('App\Http\Controllers\FileController')->save_entry($title,$request["content"]);
        return redirect('wiki/'.$title);
    }   

    // random page
    public function random()  
    { 
        $files = app('App\Http\Controllers\FileController')->entries_list();
        echo $rand = $files[array_rand($files)];  
        return redirect('wiki/'.$rand); 
    } 
    
}

