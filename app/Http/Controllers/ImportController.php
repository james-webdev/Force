<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Account;
use App\Models\Contact;
use App\Models\UserImport;
use Illuminate\Http\Request;
use Excel;
use App\Imports\BasicImport;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    
    public $imports;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $import = new Import();
        $imports = $import->imports;
        
        return response()->view('imports.index', ['imports'=>$imports]);
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
    public function store(Request $request)
    {
        
        if ($request->hasFile('file_import')) {
            $dir = request('type');
            $fileName = time().'_'.$request->file('file_import')->getClientOriginalName();

            $filePath = $request->file('file_import')->storeAs($dir, $fileName, 'local');
            
            $data = $this->saveCsvData($filePath);
            
            //$headings = (new HeadingRowImport)->toArray(storage_path('app/'.$data->filename));
            $fileData =   array_map('str_getcsv', file(storage_path('app/'.$data->filename)));
            
            $fields = $this->_getModelFields($data['type']);
            //ddd($fields, $data['type'], $fileData[1]);
            return response()->view('imports.create', compact('fileData', 'fields', 'data'));
        
        }
        return redirect()->back()->withError("No File");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        //
    }

    public function mapping(Request $request, Import $import)
    {
        $class = "App\Models\\".ucwords($import->type);

        $mappings = array_values(request()->except('_token', 'submit'));
        $fileData = array_map('str_getcsv', file(storage_path('app/'.$import->filename)));
      
        $n = null;
        $insertData = [];
        foreach ($fileData as $data) {

            if ($n) {
                foreach ($mappings as $id=>$map) {
                    if ($map != 'Ignore') {
                        $insertData[$map] =   iconv('windows-1250', 'utf-8', $fileData[$n][$id]);
                    }
                  
                }
                if (! isset($insertData['sf_id'])) {
                    ddd($insertData);
                }
                $class::create($insertData); 
            }
            $n++;
        }
        
        return redirect()->route('import.index')->withMessage('Import completed');
        //create teh new objects
    }
    
     /* [getFileFields description]
     * 
     * @param [type] $data [description]
     * 
     * @return [type]       [description]
     */
    private function _getModelFields($type)
    {
        $modelName = 'App\\Models\\'.ucwords($type);
      
        $model = new $modelName();
        return $model->fillable;
    }

    private function saveCsvData($filePath)
    {
       
        $data = array_map('str_getcsv', file(storage_path('app/'.$filePath)));
       
        if (preg_match('%(\N*)/%m', $filePath, $regs)) {
            $type = $regs[1];
        } else {
            dd('Hmmmmm');
        }


        
        return Import::create(
            [
                'filename' => $filePath,
                
                //'data' => json_encode(serialize($data)),
                'type' => $type
            ]
        );
    }
}
