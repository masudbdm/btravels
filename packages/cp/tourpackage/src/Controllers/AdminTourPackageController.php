<?php

namespace Cp\TourPackage\Controllers;


use App\Http\Controllers\Controller;
use Cp\Media\Models\Media;
use Cp\TourPackage\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminTourPackageController extends Controller
{


    public function tourPackagesAll()
    {
        menuSubmenu('jobPost', 'tourPackagesAll');
        // dd(TourPackage::all());
        $data['tourPackages']  = TourPackage::orderBy('drag_id')->paginate(30);
        return view('tourpackage::admin.tourPackages.tourPackagesAll', $data);
    }

    public function tourPackageSortable(Request $request)
    {
        // dd($request->all());
        $orderData = $request->input('order');
        foreach ($orderData as $item) {
            TourPackage::where('id', $item['id'])->update(['drag_id' => $item['order']]);
        }
        return response()->json(['success' => true]);
    }


    public function  tourPackageCreate()
    {
        menuSubmenu('jobPost', 'tourPackagesAll');
        $data['medias'] = Media::latest()->paginate(20);
        return view('tourpackage::admin.tourPackages.tourPackageCreate', $data);
    }

    public function tourPackageStore(Request $request)
    {
        menuSubmenu('tourPackage', 'tourPackagesAll');

        $this->validate($request, [
            'tour_package_image' => 'required|image',
            'title' => 'required',
            'package_type' => 'required',
            'price' => 'required',
            'time_duration' => 'required',
            'hotel_makka' => 'required',
            'hotel_madina' => 'required',
            'flight_up' => 'required',
            'flight_down' => 'required',
            'food' => 'required',
            'special_service' => 'required',
        ]);

        $tourPackage = new TourPackage();
        $tourPackage->title = $request->title;
        $tourPackage->package_type = $request->package_type;
        $tourPackage->price = $request->price;
        $tourPackage->time_duration = $request->time_duration;
        $tourPackage->hotel_makka = $request->hotel_makka ?? 0;
        $tourPackage->hotel_madina = $request->hotel_madina ?? 0;
        $tourPackage->flight_up = $request->flight_up;
        $tourPackage->flight_down = $request->flight_down;
        $tourPackage->food = $request->food;
        $tourPackage->special_service = $request->special_service;
        $tourPackage->active = $request->active ?? 0;
        $tourPackage->addedby_id = Auth::id();
        if ($request->hasFile('tour_package_image')) {
            $file = $request->tour_package_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('tour_package_image/' . $imageName, File::get($file));
            $tourPackage->tour_package_image = $imageName;
        }

        if ($request->hasFile('tour_package_file')) {
            $file = $request->tour_package_file;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('tour_package_file/' . $imageName, File::get($file));
            $tourPackage->tour_package_file = $imageName;
        }
        $tourPackage->save();
        cache()->flush();
        toast('Job Post Create Successfully', 'success');
        return redirect()->back();
    }






    public function tourPackageEdit(TourPackage $tourPackage)
    {
        // dd($tourPackage);
        menuSubmenu('tourPackage', 'tourPackagesAll');
        $data['tourPackage'] =  $tourPackage;
        return view('tourpackage::admin.tourPackages.tourPackageEdit', $data);
    }


    public function tourPackageUpdate(Request $request, TourPackage $tourPackage)
    {
        // dd($request->all());
        menuSubmenu('tourPackage', 'tourPackagesAll');

        $this->validate($request, [
            'image' => 'nullable|image|mimes:jpeg,webp,jpg,png|dimensions:min_width=370,min_height=270',
            'title' => 'required|string',
            'package_type' => 'required|string',
            'price' => 'required|string',
            'time_duration' => 'required',
            'hotel_makka' => 'required',
            'hotel_madina' => 'required',
            'flight_up' => 'required',
            'flight_down' => 'required',
            'food' => 'required',
            'special_service' => 'required',
            'active' => 'required',
        ]);



        $tourPackage->title = $request->title;
        $tourPackage->package_type = $request->package_type;
        $tourPackage->price = $request->price;
        $tourPackage->time_duration = $request->time_duration;
        $tourPackage->hotel_makka = $request->hotel_makka ?? 0;
        $tourPackage->hotel_madina = $request->hotel_madina ?? 0;
        $tourPackage->flight_up = $request->flight_up;
        $tourPackage->flight_down = $request->flight_down;
        $tourPackage->food = $request->food;
        $tourPackage->special_service = $request->special_service;
        $tourPackage->active = $request->active ?? 0;
        $tourPackage->editedby_id = Auth::id();
        if ($request->hasFile('tour_package_image')) {
            $old_file = 'tour_package_image/' . $tourPackage->tour_package_image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->tour_package_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('tour_package_image/' . $imageName, File::get($file));
            $tourPackage->tour_package_image = $imageName;
        }

        if ($request->hasFile('tour_package_file')) {
            $old_file = 'tour_package_file/' . $tourPackage->tour_package_file;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->tour_package_file;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('tour_package_file/' . $imageName, File::get($file));
            $tourPackage->tour_package_file = $imageName;
        }

        $tourPackage->save();

        toast('Job Post successfully updated', 'success');
        return redirect()->back();
    }



    public function tourPackageDelete(TourPackage $tourPackage)
    {
        menuSubmenu('tourPackage', 'tourPackagesAll');
        $old_file = 'tour_package_image/' . $tourPackage->tour_package_image;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $tourPackage->delete();
        toast('Job Post successfully deleted', 'success');
        return redirect()->back();
    }


    public function tourPackageActive(Request $request)
    {
        // dd($request->all());
        if ($request->mode == 'true') {
            DB::table('tour_packages')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('tour_packages')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }


}
