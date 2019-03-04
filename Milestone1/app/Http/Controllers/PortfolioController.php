<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Services\Business\PortfolioBusinessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Skills;
use App\Models\History;
use App\Models\Education;

/**
 * 
 * @author Mark
 *
 */
class PortfolioController extends Controller
{

    /**
     * create method mapped to /makeProfile POST route
     * takes in Request 
     * navigates to page with data
     */
    public function createPortfolioData(Request $request)
    {
        //input data from views
        $webSkills = $request->input('skills');
        $webHistory = $request->input('history');
        $webEducation = $request->input('education');
        
        $skill = new Skills($webSkills);
        $his = new History($webHistory);
        $edu = new Education($webEducation);
        //connect to business service and return successful user creation
        $service = new PortfolioBusinessService();
        $result = $service->trySetSkills($skill);
        $result1 = $service->trySetHistory($his);
        $result2 = $service->trySetEducation($edu);
        
        if($result && $result1 && $result2)
        {
            $data = ['skill' => $skill, 'history' => $his, 'education' => $edu];
            return view('portfolioView')->with($data);
        }
        else
        {
            return view('createPortfolio');
        }
        
    }
   
   

    public function getAllPortfolios(Request $request)
    {
        $service = new PortfolioBusinessService();
        $skillresult = $service->tryDisplayAllSkills();
        $historyresult = $service->tryDisplayAllHistory();
        $educationresult = $service->tryDisplayAllEducation();
        //return view and data
        $data = ['skillr' => $skillresult, 'historyr' => $historyresult, 'educationr' => $educationresult];
        return view('editPortfolioView')->with($data);
    }
    
    public function deletePortfolio(Request $request)
    {
        
    }
    /**
     * 
     * @param Request $request returns true or false based on if deletion was successful
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function deleteSkill(Request $request)
    {
        $webSkills = $request->input('skills');
        $skill = new Skills($webSkills);
        $service = new PortfolioBusinessService();
        $result = $service->tryDeleteSkill($skill);
        if($result)
        {
            return view('editPortfolioView');
        }
        else
        {
            return view('editPortfolioView');
        }
    }
    
    public function deleteHistory(Request $request)
    {
        $webHistory = $request->input('History');
        $history = new History($webHistory);
        $service = new PortfolioBusinessService();
        $result = $service->tryDeleteHistory($history);
        if($result)
        {
            return view('editPortfolioView');
        }
        else
        {
            return view('editPortfolioView');
        }
    }
    public function deleteEducation(Request $request)
    {
        $webEducation = $request->input('Education');
        $education = new Education($webEducation);
        $service = new PortfolioBusinessService();
        $result = $service->tryDeleteEducation($education);
        if($result)
        {
            return view('editPortfolioView');
        }
        else
        {
            return view('editPortfolioView');
        }
    }
    public function addSkill(Request $request)
    {
        $webSkills = $request->input('skills');
        $skill = new Skills($webSkills);
        $service = new PortfolioBusinessService();
        $result = $service->trySetSkills($skill);
        $data = ['skill' => $skill];
        if($result)
        {
            return view('editPortfolioView')->with($data);
        }
        else 
        {
            return view('addSkill');
        }
    }
  
}
