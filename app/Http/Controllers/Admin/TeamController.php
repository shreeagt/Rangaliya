<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Config;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use App\Model\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TeamController extends Controller
{

    private function storeFile($file) {
        $name = $file->getClientOriginalName();
        $name = pathinfo($name, PATHINFO_FILENAME);
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time() . '-' . $name . '.' . $file->extension();
        $filePath = 'blogs/' . $newImageName;
        #Store Image
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $bucket_name = env('AWS_BUCKET');
        $region = env('AWS_DEFAULT_REGION');
        $url = 'https://' . $bucket_name . '.s3.' . $region . '.amazonaws.com/' . $filePath;
        return $url;
    }

    public function index() {
        $team = Team::get();
        return view('main.pages.team.index', ['team' => $team]);
    }

    public function show() {
        return view('main.pages.team.create');
    }

    public function store(Request $request) {

        $allFiles = $request->allFiles();
        $thumbnail = null;
        if (isset($allFiles['profile_image'])) {
            $profile_image = $this->storeFile($allFiles['profile_image']);
        }
        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation; 
        $team->email = $request->email; 
        $team->profile_image = $profile_image;
        $team->team_url = $request->team_url;
        $team->status = $request->status; 
        $team->save();
        return redirect()->route('admin-team.index');
    }

    public function edit($id)
    {
        $team_info = Team::find($id);

        return view('main.pages.team.edit', ['team_info' => $team_info]);
    }

    public function update(Request $request)
    {
        $allFiles = $request->allFiles();
        $profile_image = $request->old_profile_image;
        if (isset($allFiles['profile_image'])) {
        $profile_image = $this->storeFile($allFiles['profile_image']);
        }

        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->designation = $request->designation; 
        $team->email = $request->email; 
        if ($profile_image != null) {
        $team->profile_image = $profile_image;

        }
        $team->team_url = $request->team_url;
        $team->status = $request->status; 
        $team->save();

        return redirect()->route('admin-team.index');
    }
    public function delete($id)
    {
        Team::find($id)->delete();
        return redirect()->back();
    }


}
