<?php

namespace App\Http\Controllers;

use App\FinalizedProjects;
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

    public function viewLoginError(){
        return view('pages.Error');
    }

    public function viewProject($id){
        $project = Project::where("id",$id)->get();
        $user_id = $project[0]->user_id;
        $user = User::find($user_id);
        $reservationCount = Reservations::where("project_id",$id)->count(); //Get number of reservation for identified project
        $volunteerCount = Volunteers::where("project_id",$id)->count(); //Get number of volunteers for identified project
        $finalized = FinalizedProjects::where("project_id",$id)->get();
        $finalizedBy = $finalized[0]->user;
        return view('pages.Project', compact('project','user','reservationCount','volunteerCount','finalizedBy'));

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
        $project = Project::get(); //Get all the projects from the Projects table

        $reservation = Reservations::where('user',$name)->get(); //Get reserved projects
        $reserved = array(); //Create array to store reserved project ids
        foreach($reservation as $res){
            array_push($reserved,$res->project_id); //Save each reserved project id to the array
        }
        $projectR = Project::whereNotIn('id',$reserved)->get(); //Get projects which are not reserved

        $volunteer = Volunteers::where('user',$name)->get(); //Get volunteered projects
        $volunteered = array(); //Create array to store volunteered project ids
        foreach($volunteer as $vol){
            array_push($volunteered,$vol->project_id); //Save each volunteered project id to the array
        }
        $projectV = Project::whereNotIn('id',$volunteered)->get(); //Get projects which are not volunteered

        $finalizedProject = FinalizedProjects::where('user',$name)->get(); //Get finalized project
        $finalized_pn = "";
        if(sizeof($finalizedProject)!=0){
            $finalized_pn = $finalizedProject[0]->project_name;
        }

        if($type=="lecturer"){
            return view('pages.ViewProjectsLecturer',compact('projectV','volunteer')); //Return the web page to view projects for a lecturer
        }
        elseif($type=="student"){
            return view('pages.ViewProjectsStudent',compact('projectR','reservation','finalized_pn')); //Return the web page to view projects for a student
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
        $project = Project::get(); //Get all the projects from the Projects table

        $reservation = Reservations::where('user',$name)->get(); //Get reserved projects
        $reserved = array(); //Create array to store reserved project ids
        foreach($reservation as $res){
            array_push($reserved,$res->project_id); //Save each reserved project id to the array
        }
        $projectR = Project::whereNotIn('id',$reserved)->get(); //Get projects which are not reserved

        $volunteer = Volunteers::where('user',$name)->get(); //Get volunteered projects
        $volunteered = array(); //Create array to store volunteered project ids
        foreach($volunteer as $vol){
            array_push($volunteered,$vol->project_id); //Save each volunteered project id to the array
        }
        $projectV = Project::whereNotIn('id',$volunteered)->get(); //Get projects which are not volunteered

        $finalizedProject = FinalizedProjects::where('user',$name)->get(); //Get finalized project
        $finalized_pn = "";
        if(sizeof($finalizedProject)!=0){
            $finalized_pn = $finalizedProject[0]->project_name;
        }

        if($type=="lecturer"){
            return view('pages.ViewProjectsLecturer',compact('projectV','volunteer')); //Return the web page to view projects for a lecturer
        }
        elseif($type=="student"){
            return view('pages.ViewProjectsStudent',compact('projectR','reservation','finalized_pn')); //Return the web page to view projects for a student
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

        $reservation = Reservations::where('user',$name)->get(); //Get reserved projects from the verified user
        $reserved = array(); //Create array to store reserved project ids
        foreach($reservation as $res){
            array_push($reserved,$res->project_id); //Save each reserved project id to the array
        }
        $projectR = Project::whereNotIn('id',$reserved)->get(); //Get projects which are not reserved from the Project table

        $finalizedProject = FinalizedProjects::where('user',$name)->get(); //Get finalized project
        $finalized_pn = "";
        if(sizeof($finalizedProject)!=0){
            $finalized_pn = $finalizedProject[0]->project_name;
        }

        return view('pages.ViewProjectsStudent',compact('projectR','reservation','finalized_pn')); //Show reservations
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

        $volunteer = Volunteers::where('user',$name)->get(); //Get volunteered projects
        $volunteered = array(); //Create array to store volunteered project ids
        foreach($volunteer as $vol){
            array_push($volunteered,$vol->project_id); //Save each volunteered project id to the array
        }
        $projectV = Project::whereNotIn('id',$volunteered)->get(); //Get projects which are not volunteered

        return view('pages.ViewProjectsLecturer',compact('projectV','volunteer')); //Show volunteering projects
    }

    public function finalizeProject($id){
        $user = Auth::user();
        $name = $user->name;
        $user_id = $user->id;
        $project = Project::where("id",$id)->get();
        $project_id = $project[0]->id;
        $project_name = $project[0]->name;
        $finalizedProject = new FinalizedProjects();
        $finalizedProject -> user_id = $user_id;
        $finalizedProject -> user = $name;
        $finalizedProject -> project_id = $project_id;
        $finalizedProject -> project_name = $project_name;

        $finalizedProject->save();

        $finalizedProject = FinalizedProjects::where('user',$name)->get(); //Get finalized project
        $finalized_pn = "";
        if(sizeof($finalizedProject)!=0){
            $finalized_pn = $finalizedProject[0]->project_name;
        }

        $reservation = Reservations::where('user',$name)->get(); //Get reserved projects from the verified user
        $reserved = array(); //Create array to store reserved project ids
        foreach($reservation as $res){
            array_push($reserved,$res->project_id); //Save each reserved project id to the array
        }
        $projectR = Project::whereNotIn('id',$reserved)->get(); //Get projects which are not reserved from the Project table

        return view('pages.ViewProjectsStudent',compact('projectR','reservation','finalized_pn')); //Show finalized project
    }
}
