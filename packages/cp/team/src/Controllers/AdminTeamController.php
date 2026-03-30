<?php

namespace Cp\Team\Controllers;


use App\Http\Controllers\Controller;
use Cp\Media\Models\Media;
use Cp\BlogPost\Models\BlogPost;
use Cp\BlogPost\Models\BlogCategory;
use Cp\BlogPost\Models\BlogPostFile;

use Cp\ClientProject\Models\OurProject;
use Cp\ClientProject\Models\Client;

use Cp\BlogPost\Models\Tag;
use Cp\Team\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminTeamController extends Controller
{

    public function teamsAll()
    {
        menuSubmenu('team', 'teamsAll');
        $data['teams'] = $teams = Team::orderBy('drag_id')->latest()->paginate(30);
        //  dd($data['teams'] );
        return view('team::admin.team.teamsAll', $data);
    }


    public function teamCreate()
    {
        menuSubmenu('team', 'teamsAll');
        $data['medias'] = Media::latest()->paginate(20);
        return view('team::admin.team.teamCreate', $data);
    }

    public function teamStore(Request $request)
    {
        // dd($request->all());
        menuSubmenu('team', 'teamsAll');

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'designation' => 'required|string',
            'profession' => 'required|string',
            'joining_date' => 'required|date',
            'profile_pic' => 'nullable|image|mimes:jpeg,webp,jpg,png',
            'cover_pic' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->mobile1 = $request->mobile1;
        $team->mobile2 = $request->mobile2;
        $team->email = $request->email;
        $team->designation = $request->designation;
        $team->profession = $request->profession;
        $team->joining_date = $request->joining_date;
        $team->leave_date = $request->leave_date;
        $team->short_bio = $request->short_bio;
        $team->details = $request->details;
        $team->gender = $request->gender;
        $team->active = $request->active ?? 0;
        $team->contact_hide = $request->contact_hide ?? 0;
        $team->addedby_id = Auth::id();
        if ($request->hasFile('profile_pic')) {
            $file = $request->profile_pic;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . rand(1,50) . $ext;
            Storage::disk('public')->put('team/' . $imageName, File::get($file));
            $team->profile_pic = $imageName;
        }
        if ($request->hasFile('cover_pic')) {
            $file = $request->cover_pic;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . rand(50,100) . $ext;
            Storage::disk('public')->put('team/' . $imageName, File::get($file));
            $team->cover_pic = $imageName;
        }
        $team->save();

        cache()->flush();
        toast('Team Member Add Successfully', 'success');
        return redirect()->route('admin.teamsAll');
    }

    public function teamEdit(Team $team)
    {
         menuSubmenu('team', 'teamsAll');
        $data['medias'] = Media::latest()->paginate(20);
        $data['team'] = $team;
        return view('team::admin.team.teamEdit', $data);
    }

    public function teamUpdate(Request $request, Team $team)
    {
        // dd($team);
         menuSubmenu('team', 'teamsAll');
         $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'designation' => 'required|string',
            'profession' => 'required|string',
            'joining_date' => 'required|date',
            'profile_pic' => 'nullable|image|mimes:jpeg,webp,jpg,png',
            'cover_pic' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);

        $team->name = $request->name;
        $team->mobile1 = $request->mobile1;
        $team->mobile2 = $request->mobile2;
        $team->email = $request->email;
        $team->designation = $request->designation;
        $team->profession = $request->profession;
        $team->joining_date = $request->joining_date;
        $team->leave_date = $request->leave_date;
        $team->short_bio = $request->short_bio;
        $team->details = $request->details;
        $team->gender = $request->gender;
        $team->active = $request->active ?? 0;
        $team->contact_hide = $request->contact_hide ?? 0;
        $team->editedby_id = Auth::id();

        if ($request->hasFile('profile_pic')) {
            $old_file = 'team/' . $team->profile_pic;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->profile_pic;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . rand(1,50) . $ext;
            Storage::disk('public')->put('team/' . $imageName, File::get($file));
            $team->profile_pic = $imageName;
        }
        if ($request->hasFile('cover_pic')) {
            $old_file = 'team/' . $team->cover_pic;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->cover_pic;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . rand(50,100) . $ext;
            Storage::disk('public')->put('team/' . $imageName, File::get($file));
            $team->cover_pic = $imageName;
        }
        $team->save();

        toast('Team Member successfully updated', 'success');
        return redirect()->back();
    }



    public function teamDelete(Team $team)
    {
        
        menuSubmenu('team', 'teamsAll');

        $old_file = 'team/' . $team->profile_pic;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $old_file2 = 'team/' . $team->cover_pic;
        if (Storage::disk('public')->exists($old_file2)) {
            Storage::disk('public')->delete($old_file2);
        }
        $team->delete();
        toast('Team Member successfully deleted', 'success');
        return redirect()->back();
    }


    public function teamActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('teams')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('teams')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }

    public function teamSort(Request $request)
    {

        foreach ($request->sorted_data as $key => $d) {
            DB::table('teams')->where('id', $d)->update(['drag_id' => ($key + 1)]);
        }
        return response()->json([
            'success' => true,
        ]);
    }




}