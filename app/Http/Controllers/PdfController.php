<?php

namespace App\Http\Controllers;

use App\Addres;
use App\Pdf as Pdftable;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
         return view('pdf/index');
    }

    public function index_post(Request $request){

        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|max:20',
            'address' => 'required|max:50',
        ]);

        $address = new Addres();
        $address->name = $request->name;
        $address->email = $request->email;
        $address->address = $request->address;
        if($address->save()){
            $data = [
                'name'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
            ];
            $pdf = PDF::loadView('pdf_view', compact('data'));
            // If you want to store the generated pdf to the server then you can use the store function
            $fileName = uniqid();
            $pdf->save('uploads/'.$fileName.'.pdf');
            $insert_pdf = new Pdftable();
            $insert_pdf->name = $fileName.'.pdf';
            if($insert_pdf->save()){
                return back()
                    ->with('success','You have successfully upload your addres.')
                    ->with('file',$fileName);
            }

        }
    }

    public function upload()
    {
        return view('pdf/upload');
    }

    public function show(){
        $pdfs = Pdftable::all();
        return view('pdf/show')->with(['pdfs'=>$pdfs]);
    }

    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = time().'.'.$request->pdf->extension();

        if($request->pdf->move(public_path('uploads'), $fileName)){
            $pdf = new Pdftable();
            $pdf->name = $fileName;
            if($pdf->save()){
                return back()
                    ->with('success','You have successfully upload file.')
                    ->with('file',$fileName);
            }
        }
    }
}
