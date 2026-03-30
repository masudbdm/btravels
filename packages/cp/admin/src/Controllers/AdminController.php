<?php

namespace Cp\Admin\Controllers;

use Auth;
use Event;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use Cp\Admin\Models\Menu;
use App\Http\Controllers\Controller;
use Cp\Frontend\Models\ContactUs;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        menuSubmenu('dashboard', 'dashboard');
        return view('admin::dashboard.dashboard');
    }


    public function contactsAll() 
    {
        menuSubmenu('contact', 'contactsAll');
        $data['allContacts'] = ContactUs::paginate(50);
        return view('frontend::admin.contacts.contactsAll', $data);
    }

    public function contactDelete($id)
    {
        $ContactUs = ContactUs::find($id);
        $ContactUs->delete();
        return back()->with("success", "ContactUs Delated Successfuly");
    }
}
