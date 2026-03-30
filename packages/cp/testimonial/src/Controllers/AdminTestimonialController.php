<?php

namespace Cp\Testimonial\Controllers;


use Cp\Media\Models\Media;
use App\Http\Controllers\Controller;
use Cp\Testimonial\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AdminTestimonialController extends Controller
{
    public function testimonialAll()
    {
        menuSubmenu('testimonial', 'testimonialAll');
        $data['testimonials'] = Testimonial::latest()->paginate(20);
        return view('testimonial::admin.testimonial.testimonialAll', $data);
    }


    public function testimonialtore(Request $request)
    {
        // dd($request->all());
        menuSubmenu('slider', 'slidersAll');
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);


        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->company = $request->company;
        $testimonial->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('testimonial/' . $imageName, File::get($file));
            $testimonial->image = $imageName;
        }

        $testimonial->addedBy_id = Auth::id();
        $testimonial->save();
        toast('Testimonial added successfully', 'success');
        return back();
    }


    public function TestimonialEdit(Testimonial $testimonial)
    {
        menuSubmenu('testimonial', 'testimonialsAll');
        return view('testimonial::admin.testimonial.testimonialEdit', compact('testimonial'));
    }


    public function testimonialUpdate(Request $request, Testimonial $testimonial)
    {
        // dd($request->all());

        menuSubmenu('testimonial', 'testimonialsAll');
        $request->validate([
            'title' => 'required',
        ]);



        $testimonial->title = $request->title;
        $testimonial->company = $request->company;
        $testimonial->description = $request->description;
        $testimonial->active = $request->active == 'on' ? 1 : 0;

        if ($request->hasFile('image')) {
            $old = 'testimonial/' . $testimonial->image;
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('testimonial/' . $imageName, File::get($file));
            $testimonial->image = $imageName;
        }

        $testimonial->addedBy_id = Auth::id();
        $testimonial->save();

        toast('Testimonial successfully updated', 'success');
        return back();
    }


    public function testimonialDelete(Testimonial $testimonial)
    {
        menuSubmenu('testimonial', 'testimonialsAll');

        $old = 'testimonial/' . $testimonial->image;
        if (Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }
        $testimonial->delete();
        toast('Testimonial successfully deleted', 'success');
        return redirect()->back();
    }
}
