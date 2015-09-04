<?php

namespace App\Http\Controllers;

use App\Reservations;
use App\Volunteers;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectDetailsRequest;

class PageController extends Controller
{
    public function viewIndex(){
        return view('pages.Index');
    }

    public function viewProject($id){
        $project = Project::where("id",$id)->get();
        $user_id = $project[0]->user_id;
        $user = User::find($user_id);
        return view('pages.Project', compact('project','user'));

    }

    public function viewHome(){
        $user = Auth::user();
        $user_name = $user->name;
        $type = $user->type;

        //Return different views for each user type; student, lecturer or coordinator
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
        $user = Auth::user(); //Identify the user name
        $type = $user->type; //Identify the type of the user; student, lecturer or the coordinator
        if($type=="student" || "coordinato") { //Return AddNewProjects web page only for the students and the coordinator
            return view('pages.AddNewProjects');
        }
    }

    public function viewDisplay(){
        $user = Auth::user();
        $type = $user->type;
        $name = $user->name;
        $project = Project::get();
        $reservation = Reservations::where('user',$name)->get();
        $volunteer = Volunteers::where('user',$name)->get();
        if($type=="lecturer"){
            return view('pages.ViewProjectsLecturer',compact('project','volunteer')); //Return the web page to view projects for a lecturer
        }
        elseif($type=="student"){
            return view('pages.ViewProjectsStudent',compact('project','reservation')); //Return the web page to view projects for a student
        }
        elseif($type=="coordinato"){
            return view('pages.ViewProjects',compact('project')); //Return the web page to view projects for the coordinator
        }
    }

    public function addProjects(StoreProjectDetailsRequest $request){ //Add new project to the database
        $owner = $request -> owner;
        $users = User::where("name",$owner)->get(); //Verifying the user_id of the project owner
        $user_id = $users[0]->id;
        $project_name = $request -> project_name;
        $description = $request -> description;
        $technologies = $request -> technologies;
        $deadline = $request -> deadline;
        $project = new Project();
        $project -> user_id = $user_id;
        $project -> name = $project_name;
        $project -> description = $description;
        $project -> technologies = $technologies;
        $project -> deadline = $deadline;
        $project->save(); //Save data to the "project" table

        //Display added projects
        $user = Auth::user();
        $type = $user->type;
        $name = $user->name;
        $project = Project::get(); //Returns an array of project objects
        $reservation = Reservations::where('user',$name)->get();
        $volunteer = Volunteers::where('user',$name)->get();
        if($type=="lecturer"){
            return view('pages.ViewProjectsLecturer',compact('project','volunteer')); //Return the web page to view projects for a lecturer
        }
        elseif($type=="student"){
            return view('pages.ViewProjectsStudent',compact('project','reservation')); //Return the web page to view projects for a student
        }
        elseif($type=="coordinato"){
            return view('pages.ViewProjects',compact('project')); //Return the web page to view projects for the coordinator
        }
    }

    public function reserveProject($id){ //Add reserved projects to the database
        $user = Auth::user();
        $name = $user->name;
        $user_id = $user->id;
        $project = Project::where("id",$id)->get();
        $project_id = $project[0]->id;
        $project_name = $project[0]->name;
        $reservation = new Reservations();
        $reservation -> user_id = $user_id;
        $reservation -> user = $name;
        $reservation -> project_id = $project_id;
        $reservation -> project_name = $project_name;
        $reservation -> status = "reserved";
        $reservation->save();

        if($reservation -> status != "reserved" ){
            $reservation->save();
        }


        $project = Project::get(); //Get all the projects from the Projects table
        $reservation = Reservations::where('user',$name)->get(); //Get reservations from the verified user
        return view('pages.ViewProjectsStudent',compact('project','reservation')); //Show reservations
    }

    public  function volunteerProject($id){ //Add volunteered projects to the database
        $user = Auth::user();
        $name = $user->name;
        $user_id = $user->id;
        $project = Project::where("id",$id)->get();
        $project_id = $project[0]->id;
        $project_name = $project[0]->name;
        $volunteer = new Volunteers();
        $volunteer -> user_id = $user_id;
        $volunteer -> user = $name;
        $volunteer -> project_id = $project_id;
        $volunteer -> project_name = $project_name;

        $volunteer->save();


        $project = Project::get(); //Get all the projects from the Projects table
        $volunteer = Volunteers::where('user',$name)->get(); //Get volunteering projects from the verified user
        return view('pages.ViewProjectsLecturer',compact('project','volunteer')); //Show volunteering projects
    }
}
