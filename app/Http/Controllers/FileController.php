<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
include('../Parsedown.php');
include '../vendor/autoload.php';
 
use League\CommonMark\CommonMarkConverter;

class FileController extends Controller
{
    public function get_entry($title)  
    { 
        $dir = "../entries/".$title.".md";
        $files = $this->entries_list();
        foreach ($files as $file) {
            if ($file == $title) {
                // return readfile($dir);
                return file_get_contents($dir);
              }
        }
        return 0;
    } 
    public function entries_list()  
    { 
        $path    = "../entries";
        $files = scandir($path);
        $count = count($files);
        $files = array_diff(scandir($path), array('.', '..'));
        for($x = 2; $x < $count ; $x++) {;
            $files[$x] = substr($files[$x],0,strlen($files[$x])-3);
        }
        return $files;
    } 
    public function save_entry($title, $content)  
    { 
        $path    = "../entries/".$title.".md";
        echo $path;
        $myfile = fopen($path, "w") or die("Unable to open file!");;
        fwrite($myfile, $content);
        fclose($myfile);
    } 
}
