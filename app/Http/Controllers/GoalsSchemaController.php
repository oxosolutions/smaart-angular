<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Auth;
use Session;
use DB;
use App\GoalsSchema as GS;
class GoalsSchemaController extends Controller
{

    public function index(){

    	$plugins = [
        			'css' => ['datatables',],
        			'js' => ['datatables','custom'=>['gen-datatables']]
    	           ];


    	return view('schemas.index',$plugins);
    }


    public function indexData(){

    	$model = GS::withUsers()->get();

    	return Datatables::of($model)
            ->addColumn('actions',function($model){
                return view('schemas._actions',['model' => $model])->render();
            })->make(true);
    }

    public function create(){
    	$plugins = [

    			'css' => ['fileupload'],
    			'js' => ['fileupload','custom'=>['schema-create']]
    	];
    	return view('schemas.create',$plugins);
    }

    public function store(Request $request){

    	$this->modelValidate($request);
    	DB::beginTransaction();
    	try{

    		$model = new GS($request->except(['_token']));
	    	$model->created_by = Auth::user()->id;
	    	$path = 'schema_file';

	    	if($request->hasFile('schema_image')){

                $filename = date('Y-m-d-H-i-s')."-".$request->file('schema_image')->getClientOriginalName();

                $request->file('schema_image')->move($path, $filename);

                $model->schema_image = $filename;
            }

            $model->save();

	    	DB::commit();
    	} catch(\Exception $e){

    		DB::rollback();
    		throw $e;
    	}


    	Session::flash('success','Successfully created!');

        return redirect()->route('schema.list');
    }

    public function modelValidate($request){

    	$rules = [
    				'schema_id'     =>  'required|numeric',
    				'schema_title'  =>  'required',
    				'schema_desc'   =>  'required',
                    'schema_image'  =>  'image|mimes:jpg,png,jpeg'
    	];

    	$this->validate($request, $rules);
    }
     public function editModelValidate($request){

        $rules = [
                    'schema_id'     =>  'required|numeric',
                    'schema_title'  =>  'required',
                    'schema_desc'   =>  'required',
                    'schema_image'  =>  'image|mimes:jpg,png,jpeg'
                ];

        $this->validate($request, $rules);
    }

    public function destroy($id){

        $model = GS::findOrFail($id);

        try{

            $model->delete();
            Session::flash('success','Successfully deleted!');
        }catch(\Exception $e){

            throw $e;
        }

        return redirect()->route('schema.list');
    }

    public function edit($id){

        try{
            $model = GS::findOrFail($id);
            return view('schemas.edit', ['model'=>$model, 'css'=>['fileupload'],'js'=>['fileupload','custom'=>['schema-create']]]);
        }catch(\Exception $e)
        {
            Session::flash('error','No data found for this.');
            return redirect()->route('schema.list');

        }
    }

    public function update(Request $request, $id){

        $model = GS::findOrFail($id);

        $this->editModelValidate($request);

        DB::beginTransaction();
        try{

            $model->fill($request->except(['_token']));

            if($request->hasFile('schema_image')){

                $path = 'schema_file';

                $filename = date('Y-m-d-H-i-s')."-".$request->file('schema_image')->getClientOriginalName();

                $request->file('schema_image')->move($path, $filename);

                $model->schema_image = $filename;
            }

            $model->save();
            DB::commit();
            Session::flash('success','Successfully update!');
            return redirect()->route('schema.list');
        }catch(\Exception $e){

            throw $e;
        }
    }
}
