<?php



namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    use App\Company;
    use App\Photo;
    use App\Tag;


class CatalogueController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        $photos = Photo::where('type', 'logo')->where('company_id','>', 0)->get();
        $companies = Company::where('verified', 1)->get();
        $filter = 0;
        return view('catalogue',["companies"=>$companies,"photos"=>$photos,"tags"=>$tags,"title"=>"Catalogue","check"=>1,"filter"=>$filter]);
    }
    public function b2b(){
        $tags=Tag::all();
        $photos = Photo::where('type', 'logo')->where('company_id','>', 0)->get();
        $companies = Company::where('b2b', 1)->where('verified', 1)->get();
        $filter = 0;
        return view('catalogue2',["companies"=>$companies,"photos"=>$photos,"tags"=>$tags,"title"=>"Catalogue","check"=>1,"filter"=>$filter]);

    }

    public function indexeng()
    {
        $tags=Tag::all();
        $photos = Photo::where('type', 'logo')->get();
        $companies = Company::all();
        $filter = 0;
        return view('eng.catalogue',["companies"=>$companies,"photos"=>$photos,"tags"=>$tags,"title"=>"Catalogue","check"=>1,"filter"=>$filter]);
    }

    public function filter($id){
        $tags= Tag::all();
        $photos = Photo::where('type', 'logo')->get();
        $companies = Company::all();
        $filter = $id;
        return view('catalogue',["companies"=>$companies,"photos"=>$photos,"tags"=>$tags,"title"=>"Catalogue","check"=>0,"filter"=>$filter]);
    }

}


