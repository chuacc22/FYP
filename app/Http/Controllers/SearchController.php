<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Job;

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
        $job['job'] = Job::find($id);
        $job['job'] = DB::select('select * from jobs where id = ? ', [$id]);
        return view('/student/companyPage',$job);
    }
}
