<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\customer;
use DB;
use Auth;
use Hash;
use Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $company = DB::table('sysdb.company')
                    ->get();

        return view('login',compact('company'));
    }

    public function login(Request $request)
    {   
        $remember = false;

        $user = User::where('username',request('username'))
                    ->where('password',request('password'))
                    ->where('compcode',request('compcode'));

        if(empty($request->computerid) &&  $user->first()->groupid != 'ADMIN'){
            return back();
        }

        if($user->exists()){

            $department = DB::table('sysdb.department')
                            ->where('compcode', $user->first()->compcode)
                            ->where('deptcode', $user->first()->dept)
                            ->first();

            $request->session()->put('dept', $user->first()->dept);
            $request->session()->put('dept_desc', $department->description);
            $request->session()->put('username', request('username'));
            $request->session()->put('compcode', $user->first()->compcode);
            
            // if($user->first()->status == 'Inactive'){
            //     return back()->withErrors(['Sorry, your account is inactive, contact admin to activate it again']);
            // }
            
            // if ($request->password == $user->first()->password) {
                Auth::login($user->first(),$remember);
                if(Auth::user()->groupid == 'patient'){
                    return redirect('/preview');
                }else if(strtoupper(Auth::user()->groupid) == 'DOCTOR'){
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'REHABILITATION'){
                    $this->setsession_($request);
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'PHYSIOTERAPHY'){
                    $this->setsession_($request);
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'DIETICIAN'){
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'CLINICAL'){
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'ADMIN'){
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'MR'){
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'REGISTER'){
                    return redirect('/casenote');
                }else if(strtoupper(Auth::user()->groupid) == 'PATHLAB'){
                    return redirect('/casenote');
                }else{
                    return redirect('/casenote');
                }
            // }else{
            //     return back()->withErrors(['Try again, Password entered incorrect']);
            // }
        }else{
            return back()->withErrors(['Try again, Username or Password incorrect']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // dd('sdsd');
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    public function setsession_(Request $request){
        $chggroup = DB::table('sysdb.sysparam')
                        ->where('compcode','=',Auth::user()->compcode)
                        ->where('source','=','OE')
                        ->where('trantype','=',Auth::user()->groupid);

        if($chggroup->exists()){
            $chggroup = $chggroup->first();
            $request->session()->put('chggroup', $chggroup->pvalue1);
        }

    }
}
