<?php

namespace Cp\Frontend\Controllers;


use App\Http\Controllers\Controller;
use Cp\BlogPost\Models\BlogCategory;
use Cp\BlogPost\Models\BlogPost;
use Cp\Frontend\Models\ContactUs;
use Cp\ClientProject\Models\OurProject;
use Cp\Menupage\Models\Page;
use Cp\Product\Models\ProductCategory;
use Cp\QuestionAnswer\Models\QuestionAnswer;
use Cp\Slider\Models\Slider;
use Cp\Testimonial\Models\Testimonial;
use Cp\Tour\Models\Tour;
use Cp\WebsiteSetting\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Cp\ClientProject\Models\Client;
use Cp\Team\Models\Team;
use Illuminate\Support\Facades\Auth;
use Session;
use Config;
use Cp\TourPackage\Models\TourPackage;

class FrontendController extends Controller
{
    public function welcome()
    {
        $data['blogPosts'] = BlogPost::whereActive(true)->whereStatus('published')->take(2)->latest()->get();
        $data['questionAnswers'] = QuestionAnswer::whereActive(true)->whereActive(true)->orderBy('drag_id')->take(4)->latest()->get();
        return view('frontend::welcome.welcome', $data);
    }

    public function productCategory($slug)
    {
        $data['cat'] = ProductCategory::where('slug', $slug)->first();
        return view('frontend::welcome.productCategory', $data);
    }



    public function page($id)
    {
        $data['page'] = Page::whereActive(true)->find($id);
        if(!$data['page']){
            abort(404);
        }

        $data['umrahPackages'] = TourPackage::whereActive(true)->where('package_type', 'umrah')->get();
        $data['hajjPackages'] = TourPackage::whereActive(true)->where('package_type', 'hajj')->get();

        return view('frontend::welcome.page', $data);
    }


    public function blog() 
    {
        if(Session::has('locale')){
            $locale = Session::get('locale',Config::get('app.locale'));
            // dd($locale);
        }
        else{
            $locale = env('DEFAULT_LANGUAGE');
        }

        $data['latest_posts'] = BlogPost::whereActive(true)->whereStatus('published')->take(4)->latest()->get();
        // dd($data['latest_posts']);
        $data['cats'] = $cats = BlogCategory::whereActive(true)->orderBy('name')->get();

        $data['recent_posts'] = BlogPost::latest()->whereActive(true)->whereStatus('published')->latest()->take(5)->get();

        $data['featured_posts'] = BlogPost::latest()->whereActive(true)->whereStatus('published')->where('featured_slider', 1)->take(4)->get();

        return view('frontend::welcome.blog', $data);
    }



    public function singlePost($slug)
    {
        if(Session::has('locale')){
            $locale = Session::get('locale',Config::get('app.locale'));
        }
        else{
            $locale = env('DEFAULT_LANGUAGE');
        }

        $post = BlogPost::with('files')->where('slug' , $slug)->first();

        if(!$post)
        {
            abort(404);
        }

        $post->increment('view_count');

        $postCategories = $post->blogCategories->pluck('id');
        $postIds = DB::table('blog_category_posts')->whereIn('blog_category_id', $postCategories)->take(8)->pluck('blog_post_id');

        $data['relatedPosts'] = BlogPost::whereLocale('title', $locale)->find($postIds);
        $data['post'] = $post;

        $data['popular_posts'] =  BlogPost::orderBy('view_count', 'DESC')->whereActive(true)->whereStatus('published')->whereLocale('title', $locale)->take(6)->get();

        return view('frontend::welcome.post', $data);


    }
    public function clientDetails($id)
    {
        $client = Client::findOrFail($id);
        $data['client'] = $client;

        return view('frontend::welcome.clientDetails', $data);
    }
    public function projectDetails($id)
    {
        $project = OurProject::findOrFail($id);
        $data['project'] = $project;

        return view('frontend::welcome.projectDetails', $data);
    }


    public function ourClients()
    {
        $data['clients'] = Client::whereActive(true)->orderBy('drag_id')->orderBy('id','desc')->paginate(12);

        return view('frontend::welcome.ourClients', $data);
    }

    public function ourProjects()
    {
        $data['ourProjects'] = OurProject::whereActive(true)->orderBy('drag_id')->orderBy('id','desc')->paginate(12);
        return view('frontend::welcome.ourProjects', $data);
    }


    public function ourTeams()
    {
        $data['teams'] = Team::whereActive(true)->where('contact_hide', '1')->orderBy('id','desc')->paginate(12);
        return view('frontend::welcome.ourTeams', $data);
    }
    public function teamDetails($id)
    {
        $team = Team::findOrFail($id);
        $data['team'] = $team;

        return view('frontend::welcome.teamDetails', $data);
    }


    public function aboutUs()
    {
        return view('frontend::welcome.aboutUs');
    }



    public function contactUs(Request $request)
    {

        $request->validate([
            'full_name' => 'required',
            'email'     => 'required',
            'number'   => 'required',
            'message'   => 'required',
        ]);

        $contactUs = new ContactUs();
        $contactUs->package_id  = $request->package_id;
        $contactUs->full_name  = $request->full_name;
        $contactUs->email      = $request->email;
        $contactUs->number     = $request->number;
        $contactUs->message    = $request->message;
        $contactUs->addedBy_id = Auth::id();
        $contactUs->save();

        // $from_email =  $request->email;

        // $data = [
        //     'email'     =>  $request->email,
        //     'subject'   =>  $request->subject,
        //     'full_name' =>  $request->full_name,
        //     'details'   =>  $contactUs->message,
        //     'contactNumber' => $contactUs->number
        // ];


        // $wp = WebsiteSetting::first();
        // dd($wp->contact_email);


        // if (env('APP_ENV') != 'local') {
        //     Mail::send('frontend::welcome.mail', $data, function ($message) use ($from_email, $wp) {
        //         $message->from($from_email, env('APP_NAME'));
        //         $message->to($wp->contact_email, '')
        //             ->subject('Multisoft BD Contact Form: ');
        //     });
        // }


        toast('Contact info send successfully', 'success');
        return redirect()->back();
    }



    public function search(Request $request)
    {
        $data['search_posts'] = BlogPost::whereActive(true)
            ->whereStatus('published')
            ->where(function ($q) use ($request) {
                $q->orWhere('title', 'like', '%' . $request->search . '%')
                    ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                    ->orWhere('tags', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            })
            ->simplePaginate(15);
        return view('frontend::welcome.search', $data);
    }



    public function lazyloadContent(Request $request)
    {
        $data['front_sliders'] = Slider::whereActive(true)->get();
        $data['blogPosts'] = BlogPost::whereActive(true)->whereStatus('published')->take(2)->latest()->get();
        $data['questionAnswers'] = QuestionAnswer::whereActive(true)->whereActive(true)->orderBy('drag_id')->take(4)->latest()->get();
        $data['tourPackages'] = TourPackage::whereActive(true)->latest()->take(3)->get();
        // $data['testimonials'] = Testimonial::where('active', 1)->get();
        $data['tours'] = Tour::whereActive(true)->latest()->take(3)->get();
        $data['hajj_page'] = Page::whereActive(true)->where('page_type', 'hajj')->first();
        $data['umrah_page'] = Page::whereActive(true)->where('page_type', 'umrah')->first();
        $data['visa_page'] = Page::whereActive(true)->where('page_type', 'visa')->first();
        $data['ticket_page'] = Page::whereActive(true)->where('page_type', 'ticket')->first();
        
        $carouselContainer = view('frontend::welcome.includes.carouselContent', $data)->render();
        $homepageContainer = view('frontend::welcome.includes.homepageContent', $data)->render();
        return response()->json([
            'carouselContainer' => $carouselContainer,
            'homepageContainer' => $homepageContainer
        ]);
    }


    public function questionAnswerAll(){

       $data['questionAnswers'] = QuestionAnswer::whereActive(true)->whereActive(true)->orderBy('drag_id')->latest()->paginate(20);
        return view('frontend::welcome.questionAnswerAll', $data);
    }

    public function tourPackageDetails(Request $request, $tourPackage){
        // dd($tourPackage);
       $data['tourPackage'] = TourPackage::orderBy('drag_id')->where('id', $tourPackage)->whereActive(true)->whereActive(true)->latest()->first();
    //    dd($data['tourPackage']);
        return view('frontend::welcome.viewTourPackage', $data);
    }

    public function allPackages(){
       $data['tourPackages'] = TourPackage::orderBy('drag_id')->whereActive(true)->whereActive(true)->latest()->get();
        return view('frontend::welcome.allPackages', $data);
    }


    public function allGuidedTours(){
        $data['tours'] = Tour::whereActive(true)->latest()->get();
        return view('frontend::welcome.allGuidedTours', $data);
    }

     public function tourGuideDetails($id){

        $data['tour'] = Tour::where('id', $id)->whereActive(true)->first();
        return view('frontend::welcome.tourGuideDetails', $data);
    }
}
