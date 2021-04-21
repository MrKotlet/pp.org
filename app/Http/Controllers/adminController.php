<?php

namespace App\Http\Controllers;

use App\Company;
use App\Event;
use App\Photo;
use App\Role;
use App\Stream;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $type = 1;
        return view('Admin.dashboard', compact('type'));
    }

    public function roles()
    {
        $roles = Role::all();
        $type = 2;
        return view('Admin.dashboard', compact('type', 'roles'));
    }

    public function roleDelete($id)
    {
        $role = Role::find($id);
        $users = $role->users;
        foreach ($users as $user) {
            $user->role_id = 2;
            $user->save();
        }

        $role->delete();
        return redirect('admin/roles');
    }

    public function addRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('name');
        $role->save();
        return redirect('admin/roles');
    }

    public function giveRole(Request $request)
    {
        $user = User::where('email', $request->input('user'))->first();
        $user->role_id = $request->input('role');
        $user->save();
        return redirect('admin/roles');

    }

    public function companyVerify()
    {
        $companies = Company::where('verified', 0)->get();
        $type = 3;
        return view('Admin.dashboard', compact('type', 'companies'));
    }

    public function companyVerified($id)
    {
        $company = Company::find($id);
        $company->verified = 1;
        $company->save();

        return redirect('admin/companyVerify');
    }

    public function companyDelete($id)
    {
        $company = Company::find($id);
        $photos = $company->photos;
        $company->tags()->detach();
        $company->hours()->detach();
        $meetings = $company->meetings();

        foreach ($photos as $photo) {
            File::delete('companies/' . $photo->company->id . '/' . $photo->name);


            $photo->delete();
        }
        foreach ($meetings as $meet) {

            $meet->delete();
        }


        $company->delete();

        return redirect('admin/companyVerify');
    }

    public function photoVerify()
    {
        $photos = Photo::where('verified', 0)->get();
        $type = 4;
        return view('Admin.dashboard', compact('type', 'photos'));
    }

    public function photoVerified($id)
    {
        $photo = Photo::find($id);
        $photo->verified = 1;
        $photo->save();

        return redirect('admin/photoVerify');
    }

    public function photoDelete($id)
    {
        $photo = Photo::find($id);
        File::delete('companies/' . $photo->company->id . '/' . $photo->name);
        $photo->delete();
        return redirect('admin/photoVerify');
    }

    public function companySearch()
    {
        $type = 5;
        $tags = Tag::all();

        $companies = Company::where('user_id', Auth::id())->get();
        return view('Admin.dashboard', compact('type', 'companies', 'tags'));
    }

    public function compcreator2($id)
    {


        $user = Auth::user();

        $company = Company::find($id);
        $others = Photo::where('company_id', $id)->where('type', 'other')->get();
        $logo = Photo::where('company_id', $id)->where('type', 'logo')->first();
        $main = Photo::where('company_id', $id)->where('type', 'main')->first();
        $tags = Tag::all();


        if ($logo) {

            if ($main) {
                return view('Admin.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => $logo, "main" => $main, "others" => $others, "tags" => $tags]);
            }

            return view('Admin.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => $logo, "main" => 0, "others" => $others, "tags" => $tags]);


        }
        if ($main) {
            return view('Admin.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => 0, "main" => $main, "others" => $others, "tags" => $tags]);
        }


        return view('Admin.step2', ["title" => "Kreator Profilu Firmy", "user" => $user, "company" => $company, "logo" => 0, "main" => 0, "others" => $others, "tags" => $tags]);


    }


    public function tags()
    {
        $tags = Tag::all()->sortByDesc('created_at');
        $type = 6;
        return view('Admin.dashboard', compact('type', 'tags'));
    }

    public function tagDelete($id)
    {
        $tag = Tag::find($id);
        $tag->companies()->detach();
        $tag->delete();
        return redirect('admin/tags');
    }

    public function tagEdit(Request $request)
    {
        $tag = Tag::find($request->id);
        $tag -> name = $request->tagName;
        $tag -> save();

        return response()->json(['tagName'=>$tag->name]);

    }

    public function addTag(Request $request)
    {
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        return redirect('admin/tags');
    }

    public function events()
    {
        $events = Event::all();
        $type = 7;
        return view('Admin.dashboard', compact('type', 'events'));
    }

    public function media()
    {
        $streams = Stream::all();
        $type = 8;
        return view('Admin.dashboard', compact('type', 'streams'));
    }

    public function options()
    {
        $type = 9;
        return view('Admin.dashboard', compact('type'));
    }
}
