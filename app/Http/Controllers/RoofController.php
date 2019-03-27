<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use Storage;
use move;
use Response;

class RoofController extends Controller
{

     public function index()
    {   
        //get id and name of user
        $id = Auth::id();
        //specify 'where' array...get only non-deleted files and user's files
        $files_to_get = ['user_id' => $id, 'deleted' => 'no'];

        //get all files into an array
        $all_files = File::where($files_to_get)->orderBy('created_at', 'DESC')->get();

        return view('home', [
            'files' => $all_files
        ]);


    }

    public function trash()
    {   
        //get id and name of user
        $id = Auth::id();
        //specify 'where' array...get only non-deleted files and user's files
        $files_to_get = ['user_id' => $id, 'deleted' => 'yes'];

        //get all relevant files into an array
        $all_files = File::where($files_to_get)->orderBy('created_at', 'DESC')->get();

        return view('bin.trash', [
            'files' => $all_files
        ]);


    }

        public function store(Request $request)
    {
        //get id and name of user
        $id = Auth::id();
        $user_name = Auth::user()->name;
        //new file
        $file = new File;

        //get file from input name "files" 
		$path = Storage::putFile('public', $request->file('files'));
		$url = Storage::url($path);
        $url = substr($url, 9); 
        //get details of file uploaded
		$ext = $request->file('files')->getClientOriginalExtension();
        $name = $request->file('files')->getClientOriginalName();
        $size = $request->file('files')->getSize();

        //remove the extension from full file name
        $lent = strlen($ext) + 1;
        $name = substr($name, 0, -$lent);

        //store variables
		$file->extension = $ext;
        $file->file = $url;
        $file->name = $name;
        $file->size = $size;
        $file->user_id = $id;
        //save to database
        $file->save();

        //prevent 'confirm form resubmission'    
        return back();

}

    function getFile($filename){
        $file = $filename;
        return response()->download(storage_path("app/public/{$filename}"));
    }

   function deleteFile($fileToDelete){
        $file = $fileToDelete;
        //set record to deleted

        $query = File::where('file', $file)->update(['deleted'=>'yes']);

        return back();

    }
    function removeFile($filename){
        //to delete a file permanently
        $file = $filename;
        
        //remove file from folder
        unlink(storage_path('app/public/'.$file));

        //remove file from database
        $query = File::where('file', $file)->delete();
        return back();

        
    }

        function restoreFile($filename){
        //to restore a file
        $file = $filename;
        
        //set deleted to 'no'
        $query = File::where('file', $file)->update(['deleted'=>'no']);
        return back();

        
    }


}

