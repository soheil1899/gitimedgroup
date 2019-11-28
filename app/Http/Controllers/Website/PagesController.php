<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/17/2019
 * Time: 11:51 AM
 */

namespace App\Http\Controllers\Website;
use App\articlegroup;
use App\articles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SendSms;
use App\languagelist;
use App\m_menu;
use App\ModelLearning\v_professor;
use App\sliders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    use general;

    public function __construct()
    {
        $this->middleware('LoginCheck')->only('home');

    }
    function home(Request $request){


    }
    // Page Default Inforamtion
    private function runpage(){

    }

    function homepage(){
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        $slider = sliders::where('parent', 1)->get();
        $menu = m_menu::where('parent', 0)->with('toParentMenu.toParentMenu')->get();
        $component = 'firstpage';
        $news = articlegroup::where('id', 2)->with('toArticle')->first();


        return view('website.pages.firstpage',compact('header','component', 'slider', 'menu', 'setting', 'news'));
    }

    public function menucomponent()
    {
        $menu = m_menu::where('parent', 0)->with('toParentMenu.toParentMenu')->get();
        return $menu;
    }



    public function gallery()
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        $component = 'gallery';

        return view('website.pages.gallery', compact('header','component', 'setting'));
    }

    public function aboutus()
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $aboutus = articles::where('id', 1)->with('toContent')->first();

        $header->title=trans('site.About Us');
        $header->keywords=$aboutus->keywords;
        $header->description=$aboutus->description;
        $header->image='/media/Layout/'.$setting->logo;

        $component = 'aboutus';

        return view('website.pages.aboutus', compact('header','component', 'aboutus', 'setting'));
    }

    public function getaboutus()
    {

        $aboutus = articles::where('id', 1)->with('toContent')->first();

        return $aboutus;
    }


    public function news()
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        $news = articlegroup::where('url','news')->with('toArticle')->first();
        return view('website.pages.news', compact('header', 'news', 'setting'));

    }

    public function getnews($group,$url)
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;

        $news = articles::where('url', $url)->with('toContent')->first();

        return view('website.pages.getnews', compact('header', 'news', 'setting'));

    }
    public function article($articleurl)
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;

        $articleshow = articles::where('url',$articleurl)->with('toContent')->first();
        return view('website.pages.articleshow', compact('header', 'articleshow', 'setting'));

    }
    public function getgallery()
    {

        $gallery = sliders::where('parent', 2)->get();

        return $gallery;

    }



    public function managers()
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        $managers = articlegroup::where('id', 3)->with('toArticle.toContent')->first();

        return view('website.pages.managers', compact('header', 'managers', 'setting'));

    }


    public function getmanager($url)
    {
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;

        $manager = articles::where('url', $url)->with('toContent')->first();

        return view('website.pages.getmanager', compact('header', 'manager', 'setting'));

    }


    public function getpartners()
    {
        $partners = articlegroup::where('id', 4)->with('toArticle.toContent')->first();
        return $partners['toArticle'];
    }
















    function whyballon(){
        $setting=$this->getsetting();
        $article=articles::where('url','whyballoon')->with('toContent')->first();

        $header=(object) array();
        $header->title=$article->name;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        return view('website.pages.showarticle',array('header'=>$header,'article'=>$article,'menu'));

    }
    function about(){
        $setting=$this->getsetting();
        $article=articles::where('url','about')->with('toContent')->first();
        $header=(object) array();
        $header->title=$article->name;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        return view('website.pages.showarticle',array('header'=>$header,'article'=>$article,'menu'));

    }
    function teacherdetail(Request $request){
       $user=User::where('id',$request->id)->with('toProf')->first();
        $setting=$this->getsetting();
        $header=(object) array();

        $header->title=$user->name.' '.@$user->toProf[0]->family;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        return view('website.pages.teacher',array('header'=>$header,'user'=>$user,'id'=>$user->toProf[0]->id));

    }

    function checklogin(){


        if(Auth::check()){
            return Auth::user();

        }else{
            return abort(422, trans('Not Login.'));

        }
    }
    function loadarticle(Request $request){
        return articles::where('id',$request->id)->with('toContent')->first();
    }
    function video(Request $request){
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title='ویدیوهای آموزشی';
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        return view('website.pages.videolist',array('header'=>$header,'menu'));

    }
    function profiledetail(Request $request){
        $user=Auth::id();
        return User::where('id',$user)->select('mobile')->first();
    }
    function changemobile(Request $request){
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title='تغییر شماره همراه';
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        return view('website.publicpage',array('header'=>$header,'component'=>'changemobile'));
    }
    function changemobilenumber(Request $request){
        $request->validate([
            'mobile' => 'required|min:11|numeric',

        ]);

        $id=Auth::id();
        $sms= new SendSms();
        $rand=rand(10000,99999);
        $messege=trans('site.wellcome to Ballon. Your Verification  number is:').$rand;

        $save=User::where('id',$id)->first();
        $save->mobile=$request->mobile;

        $sms->Sendsms($messege,$request->mobile);
        $save->tokenmobile=Hash::make($rand);
        $save->save();

    }
    function checkmobilephone(Request $request){
        $check=User::where('id',Auth::id())->first();

        $request->validate([
            'confirmcode' => ['required', function ($attribute, $value, $fail) use ($check) {
                if (!\Hash::check($value, $check->tokenmobile)) {
                    return $fail(__('web.The current mobile code is incorrect.'));
                }
            }],

        ]);
        $check->tokenmobile=null;
        $check->save();


    }
}
