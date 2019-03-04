<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Services\Business\ProfileBusinessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
/**
 * Handles navigation for profile module
 * @author Anthony Natividad
 *
 */
class ProfileController extends Controller
{

    /**
     * create method mapped to /makeProfile POST route
     * takes in Request 
     * navigates to page with data
     */
    public function create(Request $request)
    {
        try{
        // Get form data
        $description = $request->input('description');
        $status = $request->input('status');
        $title = $request->input('title');
        $skills = $request->input('skills');
        $email = $request->input('email');
        $phoneNo = $request->input('phoneno');
        
        // Make profile
        $profile = new Profile($title,$description,$status,$skills,$email,$phoneNo);
        // Call business service
        $service = new ProfileBusinessService();
        $result = $service->makeProfile($profile);
        // navigate to response page
        if($result){
            $data = ['profile' => $profile];
            //Login was successful
            return view('profileResponse')->with($data);
        }
        else
        {
            return view('createProfile');
        }
        }catch (Exception $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    /**
     * WORK IN PROGRESS
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function update(Request $request)
    {
        try{
        // Get form data
        $description = $request->input('description');
        $status = $request->input('status');
        $title = $request->input('title');
        $skills = $request->input('skills');
        $email = $request->input('email');
        $phoneNo = $request->input('phoneno');
        
        // Make profile
        $profile = new Profile($title,$description,$status,$skills,$email,$phoneNo);
        // Call business service
        $service = new ProfileBusinessService();
        $result = $service->editProfile($profile);
        // navigate to response page
        if($result){
            $data = ['profile' => $profile];
            //Login was successful
            return view('profileResponse')->with($data);
        }
        else
        {
            return view('editProfile');
        }
        }catch (Exception $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }
}
