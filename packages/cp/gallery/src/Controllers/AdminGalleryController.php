<?php

namespace Cp\Gallery\Controllers;

use App\Http\Controllers\Controller;
use Cp\Gallery\Models\Gallery;
use Cp\Gallery\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function galleriesAll()
    {
        menuSubmenu('gallery', 'galleriesAll');
        $data['galleries'] = Gallery::latest()->paginate(20);
        return view('gallery::admin.galleries.galleriesAll', $data);
    }

    public function galleryStore(Request $request)
    {
        menuSubmenu('gallery', 'galleriesAll');
        $request->validate([
            'title' => 'required',
            'featured_image' => 'required|image',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->description = $request->description;

        if ($request->hasFile('featured_image')) {
            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('galleries/' . $imageName, File::get($file));
            $gallery->featured_image = $imageName;
        }

        $gallery->active = 1;
        $gallery->addedBy_id = Auth::id();
        $gallery->save();

        toast('Gallery added successfully', 'success');
        return back();
    }

    public function galleryEdit(Gallery $gallery)
    {
        menuSubmenu('gallery', 'galleriesAll');
        $gallery->load('items');
        return view('gallery::admin.galleries.galleryEdit', compact('gallery'));
    }

    public function galleryUpdate(Request $request, Gallery $gallery)
    {
        menuSubmenu('gallery', 'galleriesAll');
        $request->validate([
            'title' => 'required',
            'featured_image' => 'nullable|image',
        ]);

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->active = $request->active ? 1 : 0;

        if ($request->hasFile('featured_image')) {
            $old = 'galleries/' . $gallery->featured_image;
            if ($gallery->featured_image && Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }

            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('galleries/' . $imageName, File::get($file));
            $gallery->featured_image = $imageName;
        }

        $gallery->editedBy_id = Auth::id();
        $gallery->save();

        toast('Gallery updated successfully', 'success');
        return back();
    }

    public function galleryDelete(Gallery $gallery)
    {
        menuSubmenu('gallery', 'galleriesAll');

        $items = GalleryItem::where('gallery_id', $gallery->id)->get();
        foreach ($items as $item) {
            if ($item->image) {
                $oldItem = 'gallery_items/' . $item->image;
                if (Storage::disk('public')->exists($oldItem)) {
                    Storage::disk('public')->delete($oldItem);
                }
            }
            $item->delete();
        }

        if ($gallery->featured_image) {
            $old = 'galleries/' . $gallery->featured_image;
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
        }

        $gallery->delete();
        toast('Gallery deleted successfully', 'success');
        return redirect()->back();
    }

    public function galleryItemStore(Request $request, Gallery $gallery)
    {
        menuSubmenu('gallery', 'galleriesAll');
        $request->validate([
            'image' => 'required|image',
        ]);

        $item = new GalleryItem();
        $item->gallery_id = $gallery->id;
        $item->description = $request->description;
        $item->active = 1;
        $item->addedBy_id = Auth::id();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = rand(111, 555) . time() . $ext;
            Storage::disk('public')->put('gallery_items/' . $imageName, File::get($file));
            $item->image = $imageName;
        }

        $item->save();
        toast('Gallery item added successfully', 'success');
        return back();
    }

    public function galleryItemDelete(GalleryItem $galleryItem)
    {
        menuSubmenu('gallery', 'galleriesAll');

        if ($galleryItem->image) {
            $old = 'gallery_items/' . $galleryItem->image;
            if (Storage::disk('public')->exists($old)) {
                Storage::disk('public')->delete($old);
            }
        }

        $galleryItem->delete();
        toast('Gallery item deleted successfully', 'success');
        return redirect()->back();
    }
}

