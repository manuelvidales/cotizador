<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;

class CotizaexcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pfactura = '';
        $vcuota = '';
        $pfinal ='';
        return view('cotizador.index', compact('pfactura', 'vcuota', 'pfinal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calcular(Request $request)
    {
        dd($request->all());
        
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
       //return response()->json('Precio Factura: '.$pfactura.' Cuota:'.$vcuota);


       //return view('cotizador.show', compact('pfactura', 'vcuota', 'pfinal'));
       //return back()->with($pfactura, $vcuota, $pfinal); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
