<?php

namespace Cp\ClientProject\Controllers;


use App\Http\Controllers\Controller;
use Cp\Media\Models\Media;
use Cp\BlogPost\Models\BlogPost;
use Cp\BlogPost\Models\BlogCategory;
use Cp\BlogPost\Models\BlogPostFile;

use Cp\ClientProject\Models\OurProject;
use Cp\ClientProject\Models\Client;

use Cp\BlogPost\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminClientProjectController extends Controller
{

    public function clientsAll()
    {
        menuSubmenu('clientproject', 'clientsAll');
         $data['clients'] = $clients = Client::orderBy('drag_id')->latest()->paginate(30);
        return view('clientproject::admin.client.clientsAll', $data);
    }


    public function clientCreate()
    {
        menuSubmenu('clientproject', 'clientsAll');
        $data['medias'] = Media::latest()->paginate(20);
        return view('clientproject::admin.client.clientCreate', $data);
    }

    public function clientStore(Request $request)
    {
        // dd($request->all());
        menuSubmenu('clientproject', 'clientsAll');

        $this->validate($request, [
            'title' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'tags' => 'nullable',
            'feature_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);

        $client = new Client();
        $client->title = $request->title;
        $client->address = $request->address;
        $client->mobile = $request->mobile;
        $client->email = $request->email;
        $client->description = $request->description;
        $client->active = $request->active ?? 0;
        $client->featured = $request->featured ?? 0;
        $client->addedby_id = Auth::id();
        if ($request->hasFile('image_name')) {
            $file = $request->image_name;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('client_image/' . $imageName, File::get($file));
            $client->image_name = $imageName;
        }
        $client->save();

        cache()->flush();
        toast('Client Create Successfully', 'success');
        return redirect()->back();
    }

    public function clientEdit(Client $client)
    {
        menuSubmenu('clientproject', 'clientsAll');
        $data['medias'] = Media::latest()->paginate(20);
        $data['client'] = $client;
        return view('clientproject::admin.client.clientEdit', $data);
    }

    public function clientUpdate(Request $request, Client $client)
    {
        // dd($client);
        menuSubmenu('clientproject', 'clientsAll');
        $this->validate($request, [
            'title' => 'required|string',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'tags' => 'nullable',
            'feature_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);

        $client->title = $request->title;
        $client->address = $request->address;
        $client->mobile = $request->mobile;
        $client->email = $request->email;
        $client->description = $request->description;
        $client->active = $request->active ?? 0;
        $client->featured = $request->featured ?? 0;
        $client->editedby_id = Auth::id();
        if ($request->hasFile('image_name')) {
            $old_file = 'client_image/' . $client->image_name;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->image_name;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('client_image/' . $imageName, File::get($file));
            $client->image_name = $imageName;
        }

        $client->save();

        toast('Client successfully updated', 'success');
        return redirect()->back();
    }



    public function clientDelete(Client $client)
    {
        // dd($client);
        menuSubmenu('clientproject', 'clientsAll');
        $old_file = 'client_image/' . $client->image_name;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $client->delete();
        toast('Client successfully deleted', 'success');
        return redirect()->back();
    }


    public function clientActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('clients')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('clients')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }

    public function clientSort(Request $request)
    {
        // dd($request->sorted_data);
        foreach ($request->sorted_data as $key => $d) {
            DB::table('clients')->where('id', $d)->update(['drag_id' => ($key + 1)]);
        }
        return response()->json([
            'success' => true,
        ]);
    }



    //----------------------------OUR PROJECTS ALL METHOD-------------------------------
    public function ourProjectAll()
    {
        menuSubmenu('clientproject', 'ourProjectAll');
        $data['projects'] = $projects = OurProject::orderBy('drag_id')->latest()->paginate(30);
        return view('clientproject::admin.ourProject.ourProjectsAll', $data);
    }

    public function ourProjectCreate()
    {
        menuSubmenu('clientproject', 'ourProjectAll');
        $data['clients'] = $clients = Client::latest()->get();
        $data['medias'] = Media::latest()->paginate(20);
        return view('clientproject::admin.ourProject.ourProjectCreate', $data);
    }


    public function ourProjectStore(Request $request)
    {
        // dd($request->all());
        menuSubmenu('clientproject', 'ourProjectAll');

        $this->validate($request, [
            'title' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'tags' => 'nullable',
            'feature_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);

        $OurProject = new OurProject();
        $OurProject->title = $request->title;
        $OurProject->client_id = $request->client_id;
        $OurProject->link = $request->link;
        $OurProject->description = $request->description;
        $OurProject->active = $request->active ?? 0;
        $OurProject->featured = $request->featured ?? 0;
        $OurProject->addedby_id = Auth::id();
        if ($request->hasFile('image_name')) {
            $file = $request->image_name;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('project_image/' . $imageName, File::get($file));
            $OurProject->image_name = $imageName;
        }
        $OurProject->save();

        cache()->flush();
        toast('Our Project Create Successfully', 'success');
        return redirect()->back();
    }

    public function ourProjectEdit(OurProject $ourProject)
    {

        menuSubmenu('clientproject', 'ourProjectAll');
        $data['clients'] = $clients = Client::latest()->get();
        $data['medias'] = Media::latest()->paginate(20);
        $data['ourProject'] = $ourProject;
        return view('clientproject::admin.ourProject.ourProjectEdit', $data);
    }

    public function ourProjectUpdate(Request $request, OurProject $ourProject)
    {
        // dd($request->all());
        menuSubmenu('clientproject', 'clientsAll');
        $this->validate($request, [
            'title' => 'required|string',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'tags' => 'nullable',
            'feature_image' => 'nullable|image|mimes:jpeg,webp,jpg,png',
        ]);

        $ourProject->title = $request->title;
        $ourProject->client_id = $request->client_id;
        $ourProject->link = $request->link;
        $ourProject->description = $request->description;
        $ourProject->active = $request->active ?? 0;
        $ourProject->featured = $request->featured ?? 0;
        $ourProject->editedby_id = Auth::id();
        // if ($request->hasFile('image_name')) {
        //     $old_file = 'project_image/' . $ourProject->image_name;
        //     if (Storage::disk('public')->exists($old_file)) {
        //         Storage::disk('public')->delete($old_file);
        //     }
        //     $file = $request->image_name;
        //     $ext = "." . $file->getClientOriginalExtension();
        //     $imageName = time() . $ext;
        //     Storage::disk('public')->put('project_image/' . $imageName, File::get($file));
        //     $ourProject->image_name = $imageName;
        // }
        if ($request->hasFile('image_name')) {
            $old_file = 'project_image/' . $ourProject->image_name;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->image_name;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('project_image/' . $imageName, File::get($file));
            $ourProject->image_name = $imageName;
        }


        $ourProject->save();

        toast('Project successfully updated', 'success');
        return redirect()->back();
    }

    public function ourProjectDelete(OurProject $ourProject)
    {
        // dd($client);
        menuSubmenu('clientproject', 'clientsAll');
        $old_file = 'client_image/' . $ourProject->image_name;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $ourProject->delete();
        toast('Project successfully deleted', 'success');
        return redirect()->back();
    }

    public function ourProjectActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('our_projects')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('our_projects')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }

    public function projectSort(Request $request)
    {

        foreach ($request->sorted_data as $key => $d) {
            DB::table('our_projects')->where('id', $d)->update(['drag_id' => ($key + 1)]);
        }
        return response()->json([
            'success' => true,
        ]);
    }


}
