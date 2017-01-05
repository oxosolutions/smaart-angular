<?php

namespace App\Http\Middleware;

use Closure;
use App\LogSystem as LG;
use Auth;
Use DB;
use Carbon\Carbon AS TM;

class Logsystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        $current_url =  \Route::current()->uri(); 
        $user_id     =  Auth::user()->id; 
        $ip          =  $request->ip();
        try{
            $chk = LG::orderBy('id','desc')->where('user_id',Auth::user()->id)->first();
            $text = json_decode($chk->text,true);
            $mytime = TM::now();
            $insertTime = $chk->created_at;
            $addSecond = $insertTime->addSeconds(30);
            if($addSecond < $mytime && $current_url ==  $text['route'])
            {
               $this->createLog($current_url , $ip ,$user_id );
                            
            }else if($current_url !=  $text['route'])
                {
                    $this->createLog($current_url, $ip,$user_id);
                }   
        }catch(\Exception $e)
        {
            $this->createLog($current_url , $ip ,$user_id );
        }
          return $next($request);
    }
        Public function createLog($url ,$ip, $uid)
        {
            $Lg = new LG();
            $Lg->user_id = $uid;
            $Lg->type ="frontend";
            $Lg->text =json_encode(['route'=>$url]);
            $Lg->ip_address =  $ip;
            $Lg->save();                      
        }
}