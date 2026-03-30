<?php

namespace Cp\Tour\Controllers;


use App\Http\Controllers\Controller;
use Cp\Tour\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AdminTourController extends Controller
{
    public function toursAll() 
    {
        menuSubmenu('tour', 'toursAll');
        $data['tours'] = Tour::latest()->paginate(20);
        return view('tour::admin.tours.toursAll', $data);
    }


    public function tourCreate() 
    {
        menuSubmenu('tour', 'toursAll');
        return view('tour::admin.tours.tourCreate');
    }

    public function tourStore(Request $request)
    {
        menuSubmenu('tour', 'toursAll');
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'location_name' => 'required',
            'featured_image' => 'required|image',
        ]);


        $tour = new Tour();
        $tour->title = $request->title;
        $tour->excerpt = $request->excerpt;
        $tour->description = $request->description;
        $tour->location_name = $request->location_name;
        $tour->embedded_code = $request->embedded_code;

        if ($request->hasFile('featured_image')) {
            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('tours/' . $imageName, File::get($file));
            $tour->featured_image = $imageName;
        }

        $tour->addedby_id = Auth::id();
        $tour->save();
        toast('Tour added successfully', 'success');
        return redirect()->route('admin.toursAll');
    }


    public function tourEdit(Tour $tour)
    {
        menuSubmenu('tour', 'toursAll');
        return view('tour::admin.tours.tourEdit', compact('tour'));
    }


    public function tourUpdate(Request $request, Tour $tour)
    {
        menuSubmenu('tour', 'toursAll');
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'location_name' => 'required',
            'featured_image' => 'nullable|image',
        ]);

        $tour->title = $request->title;
        $tour->excerpt = $request->excerpt;
        $tour->description = $request->description;
        $tour->location_name = $request->location_name;
        $tour->embedded_code = $request->embedded_code;

        if ($request->hasFile('featured_image')) {
            $old = 'tours/' . $tour->featured_image;
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('tours/' . $imageName, File::get($file));
            $tour->featured_image = $imageName;
        }

        $tour->editedby_id = Auth::id();
        $tour->save();
        toast('Tour successfully updated', 'success');
        return redirect()->back();
    }


    public function tourDelete(Tour $tour)
    {
        menuSubmenu('tour', 'toursAll');
        $old = 'tours/' . $tour->featured_image;
        if (Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }
        $tour->delete();
        toast('Tour successfully deleted', 'success');
        return redirect()->back();
    }
}
