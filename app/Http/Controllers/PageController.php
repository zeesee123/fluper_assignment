<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subject;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index(){

        return view('pages.index');
    }

    public function save_val(Request $r){

        $r->validate(['firstname'=>'required','dob'=>'required','frequency'=>'required']);

        if($r->frequency=='Daily' && empty($r->daily_frequency)){
            
        }else{
            // dd('good');

            $flag=false;
            

            $data=new Subject;
            $data->dob=$r->dob;
            $data->firstname=$r->firstname;
            $data->frequency=$r->frequency;

            $firstname=$r->firstname;

            
            
            if(!empty($r->daily_frequency)){

                $data->daily_frequency=$r->daily_frequency;
            }

            $data->save();

            if($r->frequency=='Monthly'||$r->frequency=='Weekly'){

                $flag=true;
            }

            $dob=Carbon::parse($r->dob);

            $currentDate=Carbon::now();

            $age=$dob->diffInYears($currentDate);

            $message='';
            $type='';

            switch($age){

                case $age<18:
                    $message='Participants must be over 18 years of age';
                    $type='error';
                    $data->result='ineligibile';
                    break;
                case $age>18:
                    if($flag){
                        $message="Participant
                        $firstname is assigned to Cohort A";
                        $type='success';
                        $data->result='eligibile, assigned to cohort A';
                    }else{
                        $message="Candidate $firstname is assigned to
                        Cohort B";
                        $type='success';
                        $data->result='eligibile, assigned to cohort B';
                    }
                    break;
                default:
                   break;
                    
            }

            $data->save();

            return back()->with($type,$message);
        }

        
    }


    public function view_table(){

        $data=Subject::all();

        $count=Subject::count();

        return view('pages.table',compact('data','count'));
    }
}
