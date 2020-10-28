<?php


namespace App\Http\Controllers;
use App\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function file(){
        $header = header("Content-type:application/pdf");

        $files = Pdf::all();
        $pdfFileName = "http://" . $_SERVER['SERVER_NAME'] .'/uploads/';
        $files_array = [];
        foreach ($files as $key => $value ){
            $files_array[] = $pdfFileName.$value->name;
        }
        return response()->json([
            'success'=>true,
            'message'=>'string',
            'data'=>$files_array
        ]);
    }

}
