<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Visualisation as VS;
use Auth;
class VisualizationController extends Controller
{

	public function store(Request $request)
	{
        $validate = $this->validateRequest($request);
        if($validate['status'] == 'false'){

            $response = ['status'=>'error','error'=>$validate['error']];
            return $response;
        }

        try{

            $model = new VS();

            $model->dataset_id = $request->dataset;
            $model->visual_name = $request->visual_name;
            $model->options = $request->options;
            $model->settings = $request->settings;
            $model->created_by = Auth::User()->id;
            $model->save();
        }catch(\Exception $e){

            if($e instanceOf \Illuminate\Database\QueryException){
                return ['status'=>'error','message'=>'No dataset found!'];
            }else{
                return ['status'=>'error','message'=>'something went wrong!'];
            }
        }

		return ['status'=>'success','message'=>'Successfully created!'];
	}

    protected function validateRequest($request){

        if($request->has('dataset') && $request->has('visual_name')){

            return ['status'=>'true','errors'=>''];
        }else{
            return ['status'=>'false','error'=>'Fill required fields!'];
        }
    }

    public function visualList(){

        $model = VS::get();

        $responseArray = [];
        $index = 0;
        foreach($model as $key => $value){

            $responseArray[$index]['id'] = $value->id;
            $responseArray[$index]['dataset_id'] = $value->dataset_id;
            $responseArray[$index]['dataset_name'] = $value->dataset->dataset_name;
            $responseArray[$index]['visual_name'] = $value->visual_name;
            $responseArray[$index]['settings'] = $value->settings;
            $responseArray[$index]['options'] = $value->options;
            $responseArray[$index]['created_by'] = $value->createdBy->name;
            $responseArray[$index]['created_at'] = $value->created_at->format('Y-m-d H:i:s');
            $index++;
        }

        return ['status'=>'success','records'=>$responseArray];
    }

    public function visualByID($id){

        $model = VS::find($id);
        if(empty($model)){
            return ['status'=>'success','records'=>[]];
        }
        $responseArray = [];
        $index = 0;

        $responseArray[$index]['id'] = $model->id;
        $responseArray[$index]['dataset_id'] = $model->dataset_id;
        $responseArray[$index]['dataset_name'] = $model->dataset->dataset_name;
        $responseArray[$index]['visual_name'] = $model->visual_name;
        $responseArray[$index]['settings'] = $model->settings;
        $responseArray[$index]['options'] = $model->options;
        $responseArray[$index]['created_by'] = $model->createdBy->name;
        $responseArray[$index]['created_at'] = $model->created_at->format('Y-m-d H:i:s');

        return ['status'=>'success','records'=>$responseArray];
    }
}
