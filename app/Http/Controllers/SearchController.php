<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Job;
use App\Employer;

class SearchController extends Controller
{
    //
    public function search()
    {
        $searchjobtitle = \Request::get('searchjobtitle');
        $searchjoblocation = \Request::get('searchjoblocation');
        $careertype = \Request::get('careertype');

        $job = Job::where('companyName', 'like', '%' .$searchjobtitle .'%' )
                    ->Where('lookingFor', 'like', '%' .$careertype . '%')
                    ->where(function($q) use ($searchjoblocation) {
                        $q->Where('state', 'like' ,'%' .$searchjoblocation .'%' )
                          ->orWhere('district', 'like' ,'%' .$searchjoblocation .'%' );
                    })-> orderBy('companyName') -> paginate(20);
   
        return view('student.searchedResult', compact('job'));
    }

    public function searchCompany($id){
        $job = Job::find($id);
        $employer = Employer::find($job->employerID);
        return view('student.companyPage')->with('job',$job)->with('employer',$employer);
    }

    public function employerViewJob($id){
        $employerID = Session::get('id');
        $job = Job::where('employerID', $employerID)->find($id);
        // $job = Employer::where('employerID', $employer)->first(); 

        if ($job){
            return view('/employer/employerViewJob')->with('job',$job);
            // return view('/employer/employerViewJob',$job);
        }else             
            return view('/authentication/employerLogin');

    }
}
