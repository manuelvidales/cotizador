<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CotizaexcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cotizador.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subirarchivo()
    {
    return view('cotizador.archivos')->with('info','Archivo almacenado con exito');;
    }

    public function mostrararchivos()
    {
       $docs = Storage::disk('documentos')->files('');
    //    $myCollectionObj = collect($docs);
    //    $files = $this->paginate($myCollectionObj);
        return response()->json($docs);
    }

    public function guardararchivo(Request $request)
    {
        $validacion = $request->validate([
        'filenew' => 'file|mimes:pdf,xlsx,xls|max:10240']);
        // if($validacion->fails()){
        // return back()->withInput()->with('error','La informacion NO fue enviada')->withErrors($validacion->errors());
        // }
        if($request->hasFile('filenew')){
        $file= $request->file('filenew');
        $filename = $file->getClientOriginalName(); //coloca nombre Original del archivo
        //almacena el archivo dentro de la carpeta public
        $path= $request->file('filenew')->storeAs('archivos', $filename);
        return back()->withInput()->with('info','Archivo almacenado con exito');
        }


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calcular(Request $request)
    {
        $contado = $request->contado;
        $inicial = $request->inicial;
        $plazo = $request->plazo;
        $inputFileType = 'Xlsx';
        $reader = IOFactory::createReader($inputFileType);
        $reader->setLoadSheetsOnly(["BARATODO_TV","Cotizador"]);
        $spreadsheet = $reader->load("storage/cotiza.xlsx");
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('E4', $contado);
        $sheet->setCellValue('E5', $inicial);
        $sheet->setCellValue('E7', $plazo);
        $dataArray = $spreadsheet->getActiveSheet()->rangeToArray('E4:E11', NULL, TRUE, TRUE, TRUE);
       $row8 = $dataArray[8];
       $pfactura = number_format($row8['E'], 2, '.', '');
       $row10 = $dataArray[10];
       $vcuota = number_format($row10['E'], 2, '.', '');
       $row11 = $dataArray[11];
       $pfinal = number_format($row11['E'], 2, '.', '');    
       $resultado = array($pfactura, $vcuota, $pfinal);
       return response()->json($resultado);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Storage::download('archivos/'.$id);
    }


    public function paginate($items, $perPage = 5, $page = null)
    {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
    'path' => Paginator::resolveCurrentPath(),
    'pageName' => 'page',
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete('archivos/'.$id);

        return $this->subirarchivo();
    }
}
