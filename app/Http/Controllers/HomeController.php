<?php

namespace App\Http\Controllers;

use App\Company;

use App\Tag;
use App\User;
use App\Photo;
use App\View\Components\Admin\roles;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $id = Auth::id();
        $user = User::find($id);

        if ($user->role->name === 'admin') {
            return redirect('admin/dashboard');
        }


        $notes = $user->notes;
        $company = $user->company;


        if (!$company) {

            return view('user.userstart', ["user" => $user, "company" => 0, "photo" => 0, "notes" => $notes]);

        }
        $photo = $company->photos()->where('type', 'logo')->first();
        return view('user.userstart', compact('user', 'company', 'photo', 'notes'));


    }

    public function settings()
    {
        $id = Auth::id();
        $user = User::find($id);

        $company = $user->company;

        return view('user.usersettings', compact('user', 'company'));
    }


    public function deleteother(Request $request)
    {
        $photoid = $request->input('photoid');
        $companyid = $request->input('companyid');
        $photoname = $request->input('photoname');


        $dpath = 'companies/' . $companyid . '/' . $photoname;

        File::delete($dpath);

        Photo::find($photoid)->delete();

        return redirect()->action('HomeController@compcreator2');
    }


    public function editemail(Request $request)
    {
        $request -> validate([
           'email' => 'email:rfc,dns'
        ]);

        $user = User::find($request->input('id'));
        $user->email = $request->input('email');
        $user->save();
        return redirect()->action('HomeController@settings');
    }


    public function compcreator()
    {
        {


            $id = Auth::id();

            $user = User::find($id);

            if ($user->company) {
                return redirect()->action('HomeController@compcreator2');
            }

            $tags = Tag::all();
            $company = $user->company;
            return view('user.step1', compact('user', 'tags', 'company'));


        }
    }

    public function store(Request $request)
    {
        $request->validate([
           'homepage' =>  'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ]);


        $company = new Company;
        $company->user_id = Auth::id();
        $company->name = $request->input('name');
        $company->opis = '';
        $company->verified = '0';
        $company->homepage = $request->input('homepage');
        $company->save();
        $company->tags()->sync($request->input('tags'));



        if (Auth::user()->role->name === "admin" ) {
            return redirect('admin/companySearch');
        }


        return redirect()->action('HomeController@compcreator2');


    }


    public function compcreator2()
    {
        {
            $id = Auth::id();
            $user = User::find($id);

            $company = Company::where('user_id', $id)->first();
            $others = Photo::where('user_id', $id)->where('type', 'other')->get();
            $logo = Photo::where('user_id', $id)->where('type', 'logo')->first();
            $main = Photo::where('user_id', $id)->where('type', 'main')->first();
            $tags = Tag::all();



            if ($logo) {

                if ($main) {
                    return view('user.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => $logo, "main" => $main, "others" => $others, "tags" => $tags]);
                }

                return view('user.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => $logo, "main" => 0, "others" => $others, "tags" => $tags]);


            }
            if ($main) {
                return view('user.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => 0, "main" => $main, "others" => $others, "tags" => $tags]);
            }


            return view('user.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => 0, "main" => 0, "others" => $others, "tags" => $tags]);


        }
    }

    public function storemedia(Request $request)
    {

        $request->validate([

            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

        ]);


        $imageName = time() . '.' . $request->photo->extension();

        $id = $request->input('id');

        $request->photo->move('companies/' . $id, $imageName);

        $type = $request->input('type');


        /* Store $imageName name in DATABASE from HERE */
        $userid = Auth::id();

        $photo = new Photo;
        $photo->company_id = $id;
        $photo->user_id = $userid;
        $photo->name = $imageName;
        $photo->verified = '0';
        $photo->type = $type;
        $photo->save();

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return redirect('admin/compcreator2/'.$id);
        }

        return redirect()->action('HomeController@compcreator2');

    }

    public function description(Request $request)
    {


        $id = $request->input('id');
        $company = Company::find($id);

        $company->opis = $request->input('opis');

        $company->save();

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return redirect('admin/compcreator2/'.$id);
        }

        return redirect()->action('HomeController@compcreator2');
    }


    public function change(Request $request)
    {
        $photoid = $request->input('photoid');

        $photot = Photo::find($photoid);

        $type = $photot['type'];

        $imageName = time() . '.' . $request->changel->extension();

        $id = $request->input('id');

        $request->changel->move('companies/' . $id, $imageName);

        $userid = Auth::id();

        /* Store $imageName name in DATABASE from HERE */


        $photo = new Photo;
        $photo->company_id = $id;
        $photo->user_id = $userid;
        $photo->name = $imageName;
        $photo->verified = '0';
        $photo->type = $type;
        $photo->save();


        $companyid = $request->input('id');
        $photoname = $request->input('photoname');


        $dpath = 'companies/' . $companyid . '/' . $photoname;

        File::delete($dpath);

        $photo = Photo::find($photoid);
        $photo->delete();

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return redirect('admin/compcreator2/'.$id);
        }

        return redirect()->action('HomeController@compcreator2');

    }

    public function editCompanyName(Request $request)
    {


        $company = Company::find($request->input('id'));
        $company->name = $request->input('name');
        $company->save();

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return redirect('admin/compcreator2/'.$request->input('id'));
        }


        return redirect()->action('HomeController@compcreator2');


    }

    public function editTags(Request $request)
    {
        $company = Company::find($request->input('id'));
        $company->tags()->sync($request->input('tags'));

        $user = Auth::user();

        if ($user->role->name === 'admin') {
            return redirect('admin/compcreator2/'.$request->input('id'));
        }
        return redirect()->action('HomeController@compcreator2');
    }

    public function setAsMain($id, $oid)
    {

        $company = Company::find($id);
        $main = $company->photos()->where('type', 'main')->first();
        $main->type = 'other';
        $main->save();

        $newMain = Photo::find($oid);
        $newMain->type = 'main';
        $newMain->save();
        return redirect()->action('HomeController@compcreator2');
    }
    //ajax

    public function addTag(Request $request){
        $name = $request->tagName;

        $tag = new Tag();
        $tag->name = $name;
        $tag->save();

        return response()->json(['tag'=>$tag]);
    }
}






