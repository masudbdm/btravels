<?php

namespace Cp\Product\Controllers;


use Cp\Product\Models\ProductCategory;
use Cp\Product\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use Cp\Media\Models\Media;
use Cp\Product\Models\Product;
use Cp\Product\Models\ProductFile;
use Cp\Product\Models\ProductCat;
use Cp\Product\Models\productSubcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminProductController extends Controller
{
    public function productCategoriesAll()
    {
        menuSubmenu('product', 'productCategoriesAll');
        $data['categories'] = $categories = ProductCategory::latest()->paginate(30);
        return view('product::admin.productCategories.productCategoriesAll', $data);
    }


    public function productCategoryCreate()
    {
        menuSubmenu('product', 'productCategoriesAll');
        return view('product::admin.productCategories.productCategoryCreate');
    }


    public function productCategoryStore(Request $request)
    {

        menuSubmenu('product', 'productCategoriesAll');
        $request->validate([
            'name' => 'string|required',

        ]);

        $category =  new ProductCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->excerpt = $request->excerpt;
        $category->addedby_id = Auth::id();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('product_categories_images/' . $imageName, File::get($file));
            $category->image = $imageName;
        }

        $category->save();
        cache()->flush();
        toast('Category successfully Created', 'success');
        return redirect()->back();
    }


    public function productCategoryEdit(ProductCategory $category)
    {
        menuSubmenu('product', 'productCategoriesAll');
        $data['category'] = $category;
        return view('product::admin.productCategories.productCategoryEdit', $data);
    }




    public function productCategoryUpdate(Request $request, ProductCategory $category)
    {
        menuSubmenu('product', 'productCategoriesAll');
        $request->validate([
            'name' => 'string|required',
        ]);

        $category->name        = $request->name;
        $category->slug = Str::slug($request->name);
        $category->excerpt = $request->excerpt;
        $category->active      = $request->active ?? 0;
        $category->editedby_id = Auth::id();

        if ($request->hasFile('image')) {
            $old_file = 'product_categories_images/' . $category->image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('product_categories_images/' . $imageName, File::get($file));
            $category->image = $imageName;
        }

        $category->save();
        cache()->flush();
        toast('Product Category successfully Updated', 'success');
        return redirect()->back();
    }

    public function productCategoryDelete(ProductCategory $category)
    {
        menuSubmenu('product', 'productCategoriesAll');
        $old_file = 'product_categories_images/' . $category->image;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $category->delete();
        cache()->flush();
        toast('Product Category successfully deleted', 'success');
        return redirect()->back();
    }


    public function productCategoryActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('product_categories')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('product_categories')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }



    public function productSubCategoriesAll()
    {
        menuSubmenu('product', 'productSubCategoriesAll');
        $data['subCategories'] = $subCategories =  ProductSubCategory::latest()->paginate(30);
        return view('product::admin.productSubCategories.productSubCateoriesAll', $data);
    }

    public function productSubCategoryCreate()
    {
        menuSubmenu('product', 'productSubCategoriesAll');
        $data['categories'] = ProductCategory::latest()->get();
        return view('product::admin.productSubCategories.productSubCategoryCreate', $data);
    }


    public function productSubCategoryStore(Request $request)
    {

        menuSubmenu('product', 'productSubCategoriesAll');

        $request->validate([
            'name' => 'string|required',
            'product_category_id' => 'string|required',
        ]);

        $subCategory              = new ProductSubCategory();
        $subCategory->product_category_id = $request->product_category_id;
        $subCategory->name        = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->excerpt = $request->excerpt;
        $subCategory->addedby_id  = Auth::id();
        if ($request->hasFile('image')) {
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('product_subCategories_images/' . $imageName, File::get($file));
            $subCategory->image = $imageName;
        }
        $subCategory->save();
        cache()->flush();
        toast('Sub Category successfully created', 'success');
        return redirect()->back();
    }


    public function productSubCategoryEdit(ProductSubCategory $subCategory)
    {
        menuSubmenu('product', 'productSubCategoriesAll');
        $data['subCategory'] = $subCategory;
        $data['categories'] = ProductCategory::latest()->get();
        return view('product::admin.productSubCategories.productSubCateoryEdit', $data);
    }



    public function productSubCategoryUpdate(Request $request, ProductSubCategory $subCategory)
    {
        menuSubmenu('product', 'productSubCategoriesAll');
        $request->validate([
            'name' => 'string|required',
        ]);

        $subCategory->product_category_id = $request->product_category_id;
        $subCategory->name        = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->excerpt = $request->excerpt;
        $subCategory->active      = $request->active ?? 0;
        $subCategory->editedby_id = Auth::id();
        if ($request->hasFile('image')) {
            $old_file = 'product_subCategories_images/' . $subCategory->image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('product_subCategories_images/' . $imageName, File::get($file));
            $subCategory->image = $imageName;
        }
        $subCategory->save();
        cache()->flush();
        toast('Sub Category successfully Updated', 'success');
        return redirect()->back();
    }

    public function productSubCategoryDelete(ProductSubCategory $subCategory)
    {
        menuSubmenu('product', 'productSubCategoriesAll');
        $old_file = 'product_subCategories_images/' . $subCategory->image;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $subCategory->delete();
        cache()->flush();
        toast('Product Sub Category successfully deleted', 'success');
        return redirect()->back();
    }


    public function productSubCategoryActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('product_sub_categories')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('product_sub_categories')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }



    public function productsAll()
    {
        menuSubmenu('product', 'productsAll');
        $data['products'] = $products = Product::latest()->paginate(30);
        return view('product::admin.products.productsAll', $data);
    }


    public function productShow(Product $product)
    {
        menuSubmenu('product', 'productsAll');
        $data['product'] =  $product;
        return view('product::admin.products.productShow', $data);
    }

    public function productCreate()
    {
        menuSubmenu('product', 'productsAll');
        $data['categories'] = ProductCategory::latest()->get();
        $data['subCategories'] =  ProductSubCategory::latest()->get();
        $data['medias'] = Media::latest()->paginate(20);
        return view('product::admin.products.productCreate', $data);
    }




    public function productStore(Request $request)
    {
        menuSubmenu('product', 'productsAll');
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'featured_image' => 'nullable|image',
        ]);

        $product = new Product();
        $product->name    = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price   = $request->price;
        $product->excerpt = $request->excerpt;
        $product->description = $request->description;
        $product->editor = $request->editor ?? 0;
        $product->active = $request->active ?? 0;
        $product->addedby_id = Auth::id();
        if ($request->hasFile('featured_image')) {
            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('product_images/' . $imageName, File::get($file));
            $product->featured_image = $imageName;
        }
        $product->save();
        if ($request->product_files) {
            $this->ProductFileUpload($request->product_files, $product);
        }

        $product->productCategories()->attach($request->categories);

        if ($request->subcategories) {
            foreach ($request->subcategories as $subcat) {
                $sc = productSubcat::where('product_subcategory_id', $subcat)->where('product_id', $product->id)->first();
                if (!$sc) {
                    $sc = new productSubcat;
                    $sc->product_subcategory_id = $subcat;
                    $sc->product_id = $product->id;
                    $sc->addedby_id = Auth::id();
                    $sc->save();

                    $subcategory = ProductSubCategory::find($subcat);
                    $category = $subcategory->productCategory;

                    $c = ProductCat::where('product_category_id', $category->id)->where('product_id', $product->id)->first();
                    if (!$c) {
                        $c = new ProductCat();
                        $c->product_category_id = $category->id;
                        $c->product_id = $product->id;
                        $c->addedby_id = Auth::id();
                        $c->save();
                    }
                }
            }
        }

        toast('Product successfully created', 'success');
        return redirect()->back();
    }


    public function ProductFileUpload($files, $product)
    {
        foreach ($files as $file) {
            $extension = strtolower($file->getClientOriginalExtension());
            $file_mime = strtolower($file->getClientMimeType());
            $file_original_name = strtolower($file->getClientOriginalName());

            $file_name = 'product_file_' . uniqid() . "_" . date('Y_m_d_his') . '.' . $extension;
            Storage::disk('public')->put('product_files/' . $file_name, File::get($file));


            if (in_array($extension, ProductFile::SUPPORTED_IMAGE_TYPES)) {
                $file_type = "image";
            } else if (in_array($extension, ProductFile::SUPPORTED_WORD_TYPES)) {
                $file_type = "word";
            } else if (in_array($extension, ProductFile::SUPPORTED_PDF_TYPES)) {
                $file_type = "pdf";
            }

            $post_file = new ProductFile();
            $post_file->product_id = $product->id;
            $post_file->file_name = $file_name;
            $post_file->file_mime = $file_mime;
            $post_file->file_type = $file_type;
            $post_file->file_ext = $extension;
            $post_file->file_original_name = $file_original_name;
            $post_file->addedby_id = Auth::id();
            $post_file->save();
        }
    }



    public function productEdit(Product $product)
    {
        menuSubmenu('product', 'productsAll');
        $data['product'] =  $product;
        $data['categories'] = ProductCategory::latest()->get();
        $data['subCategories'] =  ProductSubCategory::latest()->get();
        $data['medias'] = Media::latest()->paginate(20);
        return view('product::admin.products.productEdit', $data);
    }


    public function productUpdate(Request $request, Product $product)
    {
        menuSubmenu('product', 'productsAll');
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $product->name    = $request->name;
        $product->slug = Str::slug($request->name);
        $product->excerpt = $request->excerpt;
        $product->price   = $request->price;
        $product->description = $request->description;
        $product->editor = $request->editor ?? 0;
        $product->active = $request->active ?? 0;
        $product->editedby_id = Auth::id();
        if ($request->hasFile('featured_image')) {
            $old_file = 'product_images/' . $product->featured_image;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->featured_image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = time() . $ext;
            Storage::disk('public')->put('product_images/' . $imageName, File::get($file));
            $product->featured_image = $imageName;
        }
        $product->save();

        if ($request->product_files) {
            $this->ProductFileUpload($request->product_files, $product);
        }

        $product->productCategories()->detach($product->categories);
        $product->productCategories()->attach($request->categories);
        $product->productSubcategories()->detach($product->subcategories);

        if ($request->subcategories) {
            foreach ($request->subcategories as $subcat) {
                $sc = productSubcat::where('product_subcategory_id', $subcat)->where('product_id', $product->id)->first();
                if (!$sc) {
                    $sc = new productSubcat;
                    $sc->product_subcategory_id = $subcat;
                    $sc->product_id = $product->id;
                    $sc->save();

                    $subcategory = ProductSubCategory::find($subcat);
                    $category = $subcategory->productCategory;

                    $c = ProductCat::where('product_category_id', $category->id)->where('product_id', $product->id)->first();
                    if (!$c) {
                        $c = new ProductCat();
                        $c->product_category_id = $category->id;
                        $c->product_id = $product->id;
                        $c->save();
                    }
                }
            }
        }
        toast('Product successfully updated', 'success');
        return redirect()->back();
    }


    public function productDelete(Product $product)
    {
        menuSubmenu('product', 'productsAll');
        $old_file = 'product_images/' . $product->featured_image;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }
        $product->delete();
        toast('Product successfully deleted', 'success');
        return redirect()->back();
    }


    public function productActive(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('products')->where('id', $request->id)->update(['active' => 1]);
        } else {
            DB::table('products')->where('id', $request->id)->update(['active' => 0]);
        }
        return response()->json(['msg' => 'Status Successfully updated ', 'status' => true]);
    }



    public function productFileDelete(ProductFile $file)
    {
        $old_file = 'product_files/' . $file->file_name;
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }

        $file->delete();
        toast('Product File successfully deleted', 'success');
        return redirect()->back();
    }
}
