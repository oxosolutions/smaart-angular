<?php

  namespace App\Http\Controllers\Services;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Request;
  use Validator;
  use Illuminate\Support\Collection;
  use Auth;
  use Excel;
  use App\DatasetsList as DL;

class ImportdatasetController extends Controller
{

    function uploadDataset(Request $request){

    	$validate = $this->validateRequst($request);
    	if($validate['status'] == 'false'){

    		$response = ['status'=>'error','error'=>$validate['error']];
    		return $response;
    	}
    	$path = 'datasets';
    	$file = $request->file('file');
    	if($file->isValid()){
    		$filename = date('Y-m-d-H-i-s')."-".$request->file('file')->getClientOriginalName();
    		$uploadFile = $request->file('file')->move($path, $filename);
    		$this->storeInDatabase($path.'/'.$filename, $request->file('file')->getClientOriginalName());
    	}
      $columnsArray = $this->getColumns();
  		if($uploadFile){
  			$response = ['status'=>'success','message'=>'file uploaded successfully!','columns'=>$columnsArray];
  			return $response;
  		}else{
  			$response = ['status'=>'error','message'=>'unable to upload file!'];
  			return $response;
  		}
    }
    protected function validateRequst($request){

    	$errors = [];
    	if($request->file('file') == '' || empty($request->file('file')) || $request->file('file') == null){
    		$errors['file'] = 'File field should not empty!';
    	}
    	if($request->format == 'undefined' || empty($request->format) || $request->format  == null){
    		$errors['format'] = 'Please select file format';
    	}
    	if($request->add_replace == 'undefined' || empty($request->add_replace) || $request->add_replace  == null){
    		$errors['add_replace'] = 'Please select file format!';
    	}
    	if($request->add_replace == 'replace' || $request->add_replace == 'append'){
    		if($request->with_dataset == '' || $request->with_dataset == 'undefined' || empty($request->with_dataset)){
    			$errors['dataset'] = 'Please select dataset to '.$request->add_replace;
    		}
    	}
    	if(count($errors)>=1){
    		$return = ['status' => 'false','error'=>$errors];
    		return $return;
    	}else{
    		$return = ['status' => 'true','error'];
    		return $return;
    	}


    }

    protected function getColumns(){

        $model = DL::orderBy('created_at','desc')->first();
        $records = $model->dataset_records;
        $headers = [];
        foreach($records[0] as $key => $val){
            foreach($val as $k => $v){
                if(!in_array($k,$headers)){
                    $headers[] = $k;
                }
            }
        }

        return $headers;
    }

    function storeInDatabase($filename, $origName){


    	$FileData = [];
    	$data = Excel::load($filename, function($reader){
    	})->get();

    	foreach($data as $key => $value){

			$FileData[] = $value->all();
    	}
		$model = new DL();
		$model->dataset_name = $origName;
        $model->dataset_records = json_encode($FileData);
		$model->user_id = Auth::user()->id;
		$model->uploaded_by = Auth::user()->name;
		$model->save();

		if($model){

			return true;
		}else{

			return false;
		}
    }
}
