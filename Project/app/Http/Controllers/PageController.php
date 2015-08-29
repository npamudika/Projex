<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function viewIndex(){
        return view('pages.Index');
    }
    public function viewProject(){
        $project = Project::where("id",1)->get();
        return view('pages.Project', compact('project'));
    }
    public function viewHome(){
        $user = Auth::user();
        $user_name = $user->name;
        $type = $user->type;

        //return '##'.$type."##";
        if($type=="coordinato") {
            return view('pages.Home', compact('user_name'));
        }
        if($type=="student") {
            return view('pages.HomeStudent', compact('user_name'));
        }
        if($type=="lecturer"){
            return view('pages.HomeLecturer', compact('user_name'));
        }
    }
    public function viewAdd(){
        $user = Auth::user();
        $type = $user->type;
        if($type=="student" || "coordinato") {
            return view('pages.AddNewProjects');
        }
    }
    public function viewDisplay(){
        $user = Auth::user();
        $type = $user->type;
        if($type=="lecturer"){
            return view('pages.ViewProjectsLecturer');
        }
        elseif($type=="student"){
            return view('pages.ViewProjectsStudent');
        }

    }
    public function viewDisplayAll(){
        return view('pages.ViewProjects');
    }

}
