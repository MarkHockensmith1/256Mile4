<?php

namespace App\Http\Controllers;
use App\Services\Business\UserBusinessService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\User;
use App\Services\Data\UserDataService;

class PostController extends Controller
{
    
    
    
    public function loginSubmit(Request $request)
    {
        try
        {
            $username = $request->input('username');
            $password = $request->input('password');
            
            $user = new User(null, null, $username, $password, null);
            $service = new UserBusinessService();
            $result = $service->tryLogin($user);
            $thisUser = $service->returnUserData($user);
            
            //this is getting back just boolean
            //we need to find another way to get a user and return their data
            $data = ['user' => $user];
            //$x = 1;
            if($result){
                //shoud check if user is an admin and display correct page
                if($thisUser)
                {
                    //Login was successful
                    
                    return view('loginResponseAdmin')->with($data);
                    
                }
                else
                {
                    return view('loginResponse')->with($data);
                }
            }
            else
            {
                
                return view('Login');
            }
            
            
        }
        catch (Exception $e)
        {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' =>$e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
    
    public function registerSubmit(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $password = $request->input('password');
        
        
        $user = new User($firstname, $lastname, $username, $password, 0);
        
        $service = new UserBusinessService();
        $result = $service->tryRegister($user);
        
        if($result){
            //return view and data
            $data = ['firstname'=> $firstname, 'lastname' => $lastname];
            return view('home')->with($data);
        }
        else
        {
            return view('register');
        }
    }
    
    public function displayAll(Request $request)
    {
        try
        {
            $service = new UserBusinessService();
            $result = $service->tryDisplayUsers();
            
            //return view and data
            
            
            return view('admin')->with($result);
            
            
        }
        catch (Exception $e)
        {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' =>$e->getMessage()];
            return view('exception')->with($data);
        }
    }
}
