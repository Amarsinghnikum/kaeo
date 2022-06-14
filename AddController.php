<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Banner;
use App\Models\Purpose;
use App\Models\Causes;
use App\Models\Gallery;
use App\Models\Help;
use App\Models\Upcomingevent;
use App\Models\Peoplecomment;
use App\Models\Homesponsor;
use App\Models\Gallerycategory;
use App\Models\Submenu;
use Session;
use Image;
use File;
use DB;
use Auth;
use Hash;
use Response;
use Validator;

class AddController extends Controller
{

    public function AddBanner(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-banner',$data);
    }

    public function editBanner(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $banner = Banner::find($id);

        return view('pages.edit-home-banner',compact('banner'),$data);
    }

    public function updateBanner(Request $request, $id)
    {
        $banner = Banner::find($id);
        if($request->hasFile('banner_image'))
        {
            $path = 'uploads/home/'.$banner->banner_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('banner_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/home/',$filename);
            $banner->banner_image = $filename;
        }

        
        $banner->update();
        return redirect('/add-banner')->with('status',"Banner Updated Successfully");
    }

    public function destroyBanner($id)
    {
        $home=Banner::find($id);
        $home->delete();
        return redirect('/add-banner')->with('status',"Home Banner Deleted Successfully");
    }

    public function editCauses(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $causes = Causes::find($id);

        return view('pages.edit-home-causes',compact('causes'),$data);
    }

    public function updateCauses(Request $request, $id)
    {
        $causes = Causes::find($id);
        if($request->hasFile('donation_image'))
        {
            $path = 'uploads/donation-image/'.$banner->donation_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('donation_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/donation-image/',$filename);
            $causes->donation_image = $filename;
        }

        $causes->description = $request->input('description');
        $causes->donation_image = $request->input('donation_image');
        $causes->image_title = $request->input('image_title');
        $causes->image_description = $request->input('image_description');
        
        $causes->update();
        return redirect('/add-causes')->with('status',"Home Causes Updated Successfully");
    }

    public function destroyCauses($id)
    {
        $home=Causes::find($id);
        $home->delete();
        return redirect('/add-home-causes')->with('status',"Home Causes Deleted Successfully");
    }

    public function editPurpose(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $purpose = Purpose::find($id);

        return view('pages.edit-home-purpose',compact('purpose'),$data);
    }

    public function updatePurpose(Request $request, $id)
    {
        $purpose = Purpose::find($id);

        $purpose->purpose_description = $request->input('purpose_description');
        
        $purpose->update();
        return redirect('/add-home-purpose')->with('status',"Home Purpose Updated Successfully");
    }

    public function destroyPurpose($id)
    {
        $home=Purpose::find($id);
        $home->delete();
        return redirect('/add-home-purpose')->with('status',"Home Purpose Deleted Successfully");
    }

    public function editGallery(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $gallery = Gallery::find($id);

        return view('pages.edit-home-gallery',compact('gallery'),$data);
    }

    public function updateGallery(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        if($request->hasFile('gallery_image'))
        {
            $path = 'uploads/gallery-image/'.$gallery->gallery_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('gallery_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/gallery-image/',$filename);
            $gallery->gallery_image = $filename;
        }

        $gallery->gallery_description = $request->input('gallery_description');
        
        $gallery->update();
        return redirect('/add-home-gallery')->with('status',"Gallery Updated Successfully");
    }

    public function destroyGallery($id)
    {
        $home=Gallery::find($id);
        $home->delete();
        return redirect('/add-home-gallery')->with('status',"Home Gallery Deleted Successfully");
    }

    public function editHelp(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $help = Help::find($id);

        return view('pages.edit-home-help',compact('help'),$data);
    }

    public function updateHelp(Request $request, $id)
    {
        $help = Help::find($id);

        $help->help_description = $request->input('help_description');
        $help->help_heading = $request->input('help_heading');
        $help->heading_description = $request->input('heading_description');
        
        $help->update();
        return redirect('/add-home-help')->with('status',"Home Help Us Updated Successfully");
    }

    public function destroyHelp($id)
    {
        $home=Help::find($id);
        $home->delete();
        return redirect('/add-home-help')->with('status',"Help Deleted Successfully");
    }

    public function editUpcomingevent(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $upcomingevent = Upcomingevent::find($id);

        return view('pages.edit-home-upcomingevent',compact('upcomingevent'),$data);
    }

    public function updateUpcomingevent(Request $request, $id)
    {
        $upcomingevent = Upcomingevent::find($id);

        $upcomingevent->event_name = $request->input('event_name');
        $upcomingevent->event_description = $request->input('event_description');
        
        $upcomingevent->update();
        return redirect('/add-home-events')->with('status',"Upcoming Event Updated Successfully");
    }

    public function destroyHomeevent($id)
    {
        $home=Upcomingevent::find($id);
        $home->delete();
        return redirect('/add-home-events')->with('status',"Upcoming Event Deleted Successfully");
    }

    public function editPeople(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $people = Peoplecomment::find($id);

        return view('pages.edit-home-people',compact('people'),$data);
    }

    public function updatePeople(Request $request, $id)
    {
        $people = Peoplecomment::find($id);
        if($request->hasFile('person_image'))
        {
            $path = 'uploads/person-image/'.$people->person_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('person_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/person-image/',$filename);
            $people->person_image = $filename;
        }

        $people->person_name = $request->input('person_name');
        $people->person_position = $request->input('person_position');
        $people->person_comment = $request->input('person_comment');
        
        $people->update();
        return redirect('/add-home-people')->with('status',"People Comment Updated Successfully");
    }

    public function destroyPeople($id)
    {
        $home=Peoplecomment::find($id);
        $home->delete();
        return redirect('/add-home-people')->with('status',"People Comment Deleted Successfully");
    }

    public function editSponsor(Request $request,$id)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $homesponsor = Homesponsor::find($id);

        return view('pages.edit-home-sponsor',compact('homesponsor'),$data);
    }

    public function updateHomesponsor(Request $request, $id)
    {
        $homesponsor = Homesponsor::find($id);
        if($request->hasFile('sponsor_image'))
        {
            $path = 'uploads/sponsor-image/'.$homesponsor->sponsor_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('sponsor_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/sponsor-image/',$filename);
            $homesponsor->sponsor_image = $filename;
        }
        
        $homesponsor->update();
        return redirect('/add-home-sponsor')->with('status',"Home Causes Updated Successfully");
    }

    public function destroyHomeSponsor($id)
    {
        $home=Homesponsor::find($id);
        $home->delete();
        return redirect('/add-home-sponsor')->with('status',"Home Sponsor Deleted Successfully");
    }

    public function SearchBanner(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home_banner')
        ->where('banner_image', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home_banner')
        ->where('banner_image', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-banner/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-banner/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'banner_image'=>'<a href="'.url('/').'/uploads/home/'.$searchrecord[$a]->banner_image.'" data-lightbox="image-1" data-title="My caption"><img src="'.url('/').'/uploads/home/'.$searchrecord[$a]->banner_image.'" alt="" width="100px" height="100px"></a>',
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchCauses(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home_causes')
        ->where('description', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home_causes')
        ->where('description', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();
        $searchrecord = DB::table('home_causes')
        ->where('donation_image', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();
        $searchrecord = DB::table('home_causes')
        ->where('image_title', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-causes/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-causes/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'donation_image'=>'<a href="'.url('/').'/uploads/donation-image/'.$searchrecord[$a]->donation_image.'" data-lightbox="image-1" data-title="My caption"><img src="'.url('/').'/uploads/donation-image/'.$searchrecord[$a]->donation_image.'" alt="" width="100px" height="100px"></a>',
                'image_title'=>$searchrecord[$a]->image_title,
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchPurpose(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home_purpose')
        ->where('purpose_description', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home_purpose')
        ->where('purpose_description', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-purpose/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-purpose/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'purpose_description'=>$searchrecord[$a]->purpose_description,
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchGallery(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home_gallery')
        ->where('gallery_image', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home_gallery')
        ->where('gallery_image', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-gallery/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-gallery/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'gallery_image'=>'<a href="'.url('/').'/uploads/gallery-image/'.$searchrecord[$a]->gallery_image.'" data-lightbox="image-1" data-title="My caption"><img src="'.url('/').'/uploads/gallery-image/'.$searchrecord[$a]->gallery_image.'" alt="" width="100px" height="100px"></a>',
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchHelp(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home_help')
        ->where('help_heading', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home_help')
        ->where('help_heading', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        $searchrecord = DB::table('home_help')
        ->where('heading_description', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-help/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-help/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'help_heading'=>$searchrecord[$a]->help_heading,
                'heading_description'=>$searchrecord[$a]->heading_description,
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchhomeEvent(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('upcoming_event')
        ->where('event_name', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('upcoming_event')
        ->where('event_name', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        $searchrecord = DB::table('upcoming_event')
        ->where('event_description', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-upcoming-event/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-upcoming-event/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'event_name'=>$searchrecord[$a]->event_name,
                'event_description'=>$searchrecord[$a]->event_description,
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchPeople(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('people_comment')
        ->where('person_name', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('people_comment')
        ->where('person_name', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        $searchrecord = DB::table('people_comment')
        ->where('person_image', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();
        $searchrecord = DB::table('people_comment')
        ->where('person_position', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();
       

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-people/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-people/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'person_name'=>$searchrecord[$a]->person_name,
                'person_image'=>'<a href="'.url('/').'/uploads/person-image/'.$searchrecord[$a]->person_image.'" data-lightbox="image-1" data-title="My caption"><img src="'.url('/').'/uploads/person-image/'.$searchrecord[$a]->person_image.'" alt="" width="100px" height="100px"></a>',
                'person_position'=>$searchrecord[$a]->person_position,
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function SearchhomeSponsor(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home_sponsor')
        ->where('sponsor_image', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home_sponsor')
        ->where('sponsor_image', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){
   
            $edtBtn='<a href="'.url('/').'/edit-home-sponsor/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-home-sponsor/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'sponsor_image'=>'<a href="'.url('/').'/uploads/sponsor-image/'.$searchrecord[$a]->sponsor_image.'" data-lightbox="image-1" data-title="My caption"><img src="'.url('/').'/uploads/sponsor-image/'.$searchrecord[$a]->sponsor_image.'" alt="" width="100px" height="80px"></a>',
                'edit_btn'=>$edtBtn.$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

    public function insertSubmenu(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('sub_menu')->where('id',$request->id)->first();

        $home_details=new Submenu();
        $isPresent= Submenu::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Submenu::find($isPresent['id']);
        }

        $home_details->sub_menu =$request->sub_menu;
        $home_details->save();
        return redirect('/dashboard');
    }

    public function insertBanner(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home_banner')->where('id',$request->id)->first();
        $galleryimage= DB::table('home_banner')->first();

        $home_details=new Banner();
        //\DB::enableQueryLog(); 
        $isPresent= Banner::where(['id'=>$request->id])->first();
        //dd(\DB::getQueryLog());
        
        if($isPresent && $isPresent['id']){
            $home_details = Banner::find($isPresent['id']);
        }

        if($request->hasFile('banner_image'))
        {
            $path = 'uploads/home/'.$galleryimage->banner_image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('banner_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/home/',$filename);
            $galleryimage->banner_image = $filename;
        }

        $home_details->banner_image =$galleryimage->banner_image;

        $home_details->save();
        return redirect('/add-banner');
    }

    public function insertCauses(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home_causes')->where('id',$request->id)->first();
        $galleryimage= DB::table('home_causes')->first();

        $home_details=new Causes();
        $isPresent= Causes::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Causes::find($isPresent['id']);
        }

        if($request->hasFile('donation_image'))
        {
            $path = 'uploads/donation-image/'.$request->donation_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('donation_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/donation-image/',$filename);
            $request->donation_image = $filename;
        }

        $home_details->description =$request->description;
        $home_details->donation_image =$request->donation_image;
        $home_details->image_title =$request->image_title;
        $home_details->image_description =$request->image_description;

        $home_details->save();
        return redirect('/add-home-causes');
    }

    public function insertGallerycategory(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('gallery_category')->where('id',$request->id)->first();

        $home_details=new Gallerycategory();
        $isPresent= Gallerycategory::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Gallerycategory::find($isPresent['id']);
        }

        $home_details->category_name =$request->category_name;
        $home_details->save();
        return redirect('/add-home');
    }

    public function insertGallery(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home_gallery')->where('id',$request->id)->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        $galleryimage= DB::table('home_gallery')->first();

        $home_details=new Gallery();
        $isPresent= Gallery::where(['id'=>$request->id])->first();

        if($isPresent && $isPresent['id']){
            $home_details = Gallery::find($isPresent['id']);
        }

        if($request->hasFile('gallery_image'))
        {
            $path = 'uploads/gallery-image/'.$request->gallery_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('gallery_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/gallery-image/',$filename);
            $request->gallery_image = $filename;
        }
        $home_details->category =$request->category;
        $home_details->gallery_description =$request->gallery_description;
        $home_details->gallery_image =$request->gallery_image;

        $home_details->save();
        return redirect('/add-home');
    }

    public function insertPurpose(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home_purpose')->where('id',$request->id)->first();


        $home_details=new Purpose();
        //\DB::enableQueryLog(); 
        $isPresent= Purpose::where(['id'=>$request->id])->first();
        //dd(\DB::getQueryLog());
        
        if($isPresent && $isPresent['id']){
            $home_details = Purpose::find($isPresent['id']);
        }

        $home_details->purpose_description =$request->purpose_description;

        $home_details->save();
        return redirect('/add-home');
    } 

    public function insertHelp(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home_help')->where('id',$request->id)->first();


        $home_details=new Help();
        $isPresent= Help::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Help::find($isPresent['id']);
        }

        $home_details->help_description =$request->help_description;
        $home_details->help_heading =$request->help_heading;
        $home_details->heading_description =$request->heading_description;

        $home_details->save();
        return redirect('/add-home');
    }

    public function insertEvent(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('upcoming_event')->where('id',$request->id)->first();

        $home_details=new Upcomingevent();
        $isPresent= Upcomingevent::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Upcomingevent::find($isPresent['id']);
        }

        $home_details->event_name =$request->event_name;
        $home_details->event_description =$request->event_description;
        $home_details->save();
        return redirect('/add-home');
    }

    public function insertPeople(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('people_comment')->where('id',$request->id)->first();
        $galleryimage= DB::table('people_comment')->first();

        $home_details=new Peoplecomment();
        $isPresent= Peoplecomment::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Peoplecomment::find($isPresent['id']);
        }

        $path = 'uploads/person-image/'.$request->person_image;
        if($request->hasFile('person_image'))
        {
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('person_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/person-image/',$filename);
            $request->person_image = $filename;
        }

        $home_details->person_image =$request->person_image;
        $home_details->person_name =$request->person_name;
        $home_details->person_position =$request->person_position;
        $home_details->person_comment =$request->person_comment;
        $home_details->save();
        return redirect('/add-home');
    }

    public function insertSponsor(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home_sponsor')->where('id',$request->id)->first();
        $galleryimage = DB::table('home_sponsor')->first();

        $home_details=new Homesponsor();
        $isPresent= Homesponsor::where(['id'=>$request->id])->first();
        
        if($isPresent && $isPresent['id']){
            $home_details = Homesponsor::find($isPresent['id']);
        }

        if($request->hasFile('sponsor_image'))
        {
            $path = 'uploads/sponsor-image/'.$request->sponsor_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('sponsor_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/sponsor-image/',$filename);
            $request->sponsor_image = $filename;
        }

        $home_details->sponsor_image =$request->sponsor_image;
        $home_details->save();
        return redirect('/add-home');
    }

    public function AddCauses(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-causes',$data);
    }

    public function AddPurpose(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-purpose',$data);
    }

    public function AddGallery(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-gallery',$data);
    }

    public function AddHelpus(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-help',$data);
    }

    public function AddEvent(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-upcomingevents',$data);
    }

    public function AddPeople(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-people',$data);
    }

    public function AddSponsor(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home-sponsor',$data);
    }

    // public function insertHome(Request $request)
    // {
    //     $data['getproducts'] = DB::table('home')->first();

    //     if($request->isMethod('post')){ 

    //         $ParamArray = [
    //             'causes_description'=>$request->causes_description,
    //             'purpose_description'=>$request->purpose_description,
    //             'upcomingevent_name'=>$request->upcomingevent_name,
    //             'upcomingevent_description'=>$request->upcomingevent_description,
    //         ];
    
    //       $insert = DB::table('home')->insertGetId($ParamArray);

    //       if($insert>0){
    //         for($j=1;$j<=3;$j++){
    //           $home_id = $insert;
    //           $image_title = $request->post('image_title'.$j);       
    //           $image_description = $request->post('image_description'.$j);     
    //           //print_r($image_description); die();
         
    //        if($request->hasFile('donation_image'.$j))
    //        {
    //             $file = $request->file('donation_image'.$j);
    //             $donation_image =  $file->getClientOriginalName();
    //             $destinationPath = public_path('uploads/donation-image/');
    //             $file->move($destinationPath, $donation_image);
    //        }
      
    //         $paramArrayP = array(
    //           'home_id'=>$home_id,
    //           'image_title'=>$image_title,
    //           'image_description'=>$image_description,
    //           'donation_image'=>$donation_image 
    //           );
              
    //          DB::table('our_causes')->insert($paramArrayP);                  
    //       }
    //     }

    //     if($insert>0){
    //         for($j=1;$j<=3;$j++){
    //           $home_id = $insert;
    //           $help_description = $request->post('help_description'.$j);     
    //           $help_heading = $request->post('help_heading'.$j);   
    //           $heading_description = $request->post('heading_description'.$j);     
              
    //         $paramArrayP = array(
    //           'home_id'=>$home_id,
    //           'help_description'=>$help_description,
    //           'help_heading'=>$help_heading,
    //           'heading_description'=>$heading_description 
    //           );
              
    //          DB::table('help')->insert($paramArrayP);                  
    //       }
    //     }

    //     if($insert>0){
    //         for($j=1;$j<=3;$j++){
    //         $home_id = $insert;   
            
    //         if($request->hasFile('head_image'.$j))
    //         {
    //             $file = $request->file('head_image'.$j);
    //             $head_image =  $file->getClientOriginalName();
    //             $destinationPath = public_path('uploads/home/');
    //             $file->move($destinationPath, $head_image);
    //         }
      
    //         $paramArrays = array(
    //           'home_id'=>$home_id,
    //           'head_image'=>$head_image,
    //           'created_at'=> date('Y-m-d H:i:s'),
    //           );
              
    //          DB::table('head_image')->insert($paramArrays);                  
    //       }
    //     }

    //     if($insert>0){
    //         for($j=1;$j<=3;$j++){
    //         $home_id = $insert;   

    //         if($request->hasFile('gallery_image'.$j))
    //         {
    //             $file = $request->file('gallery_image'.$j);
    //             $gallery_image =  $file->getClientOriginalName();
    //             $destinationPath = public_path('uploads/gallery-image/');
    //             $file->move($destinationPath, $gallery_image);
    //         }
      
    //         $paramArrayq = array(
    //           'home_id'=>$home_id,
    //           'gallery_image'=>$gallery_image 
    //           );
              
    //          DB::table('our_gallery')->insert($paramArrayq);                  
    //       }
    //     }

    //     if($insert>0){
    //         for($j=1;$j<=3;$j++){
    //         $home_id = $insert;   
    //         $people_name = $request->post('people_name'.$j);       
    //         $people_position = $request->post('people_position'.$j);  
    //         $people_comment = $request->post('people_comment'.$j); 

    //         if($request->hasFile('people_image'.$j))
    //         {
    //             $file = $request->file('people_image'.$j);
    //             $people_image =  $file->getClientOriginalName();
    //             $destinationPath = public_path('uploads/people-image/');
    //             $file->move($destinationPath, $people_image);
    //         }
      
    //         $paramArrayr = array(
    //           'home_id'=>$home_id,
    //           'people_name'=>$people_name, 
    //           'people_position'=>$people_position, 
    //           'people_comment'=>$people_comment, 
    //           'people_image'=>$people_image 
    //           );
              
    //          DB::table('people_comment')->insert($paramArrayr);                  
    //       }
    //     }
    //   }

    //     if($insert>0){
    //         for($j=1;$j<=3;$j++){
    //         $home_id = $insert;

    //         if($request->hasFile('sponsor_image'.$j))
    //         {
    //             $file = $request->file('sponsor_image'.$j);
    //             $sponsor_image =  $file->getClientOriginalName();
    //             $destinationPath = public_path('uploads/sponsor-image/');
    //             $file->move($destinationPath, $sponsor_image);
    //         }

    //         $paramArrayr = array(
    //         'home_id'=>$home_id,
    //         'sponsor_image'=>$sponsor_image, 
    //         'created_at'=>date('Y-m-d H:i:s'),
    //         );
            
    //         DB::table('sponsor')->insert($paramArrayr);                  
    //     }
    // }
  
    //    return redirect('/index')->with('status',"Home details Added Successfully");
    // }

    public function AddSample(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['investorprofile'] = DB::table('home')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('add.add-home',$data);
    }

    // public function insertSample(Request $request)
    // {
    //     $data['getproducts'] = DB::table('home')->first();

    //     if($request->isMethod('post')){ 

    //     if($request->hasFile('donation_image'))
    //     {
    //         $file = $request->file('donation_image');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //         $file->move('uploads/home/',$filename);
    //         $request->donation_image = $filename;
    //     }

    //     if($request->hasFile('gallery_image'))
    //     {
    //         $file = $request->file('gallery_image');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //         $file->move('uploads/gallery-image/',$filename);
    //         $request->gallery_image = $filename;
    //     }

    //     if($request->hasFile('people_image'))
    //     {
    //         $file = $request->file('people_image');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //         $file->move('uploads/people-image/',$filename);
    //         $request->people_image = $filename;
    //     }

    //     if($request->hasFile('sponsor_image'))
    //     {
    //         $file = $request->file('sponsor_image');
    //         $ext = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$ext;
    //         $file->move('uploads/sponsor-image/',$filename);
    //         $request->sponsor_image = $filename;
    //     }

    //     $ParamArray = [
    //         'causes_description'=>$request->causes_description,
    //         'purpose_description'=>$request->purpose_description,
    //         'gallery_description'=>$request->gallery_description,
    //         'upcomingevent_name'=>$request->upcomingevent_name,
    //         'upcomingevent_description'=>$request->upcomingevent_description,
    //         'image_title'=>$request->image_title,
    //         'image_description'=>$request->image_description,
    //         'donation_image'=>$request->donation_image,
    //         'gallery_image'=>$request->gallery_image,
    //         'help_description'=>$request->help_description,
    //         'help_heading'=>$request->help_heading,
    //         'heading_description'=>$request->heading_description,
    //         'people_image'=>$request->people_image,
    //         'people_name'=>$request->people_name,
    //         'people_position'=>$request->people_position,
    //         'people_comment'=>$request->people_comment,
    //         'sponsor_image'=>$request->sponsor_image,
    //     ];
    
    //     $insert = DB::table('home')->insert($ParamArray);

    // }
  
    //    return redirect('/index')->with('status',"Home details Added Successfully");
    // }

  public function insertSample2(Request $request)
  {
    $data['investorprofile'] ="";     
    $data['investorprofile'] = DB::table('home')->where('id',$request->id)->first();


    $home_details=new Home();
    //\DB::enableQueryLog(); 
    $isPresent= Home::where(['id'=>$request->id])->first();
    //dd(\DB::getQueryLog());
    
    if($isPresent && $isPresent['id']){
        $home_details = Home::find($isPresent['id']);
    }

    if($request->hasFile('donation_image'))
    {
        $file = $request->file('donation_image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/donation-image/',$filename);
        $request->donation_image = $filename;
    }

    if($request->hasFile('gallery_image'))
    {
        $file = $request->file('gallery_image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/gallery-image/',$filename);
        $request->gallery_image = $filename;
    }

    if($request->hasFile('people_image'))
    {
        $file = $request->file('people_image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/people-image/',$filename);
        $request->people_image = $filename;
    }

    if($request->hasFile('sponsor_image'))
    {
        $file = $request->file('sponsor_image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/sponsor-image/',$filename);
        $request->sponsor_image = $filename;
    }

    $home_details->head_image =$request->head_image;
    $home_details->gallery_image =$request->gallery_image;
    $home_details->people_image =$request->people_image;
    $home_details->sponsor_image =$request->sponsor_image;
    $home_details->causes_description =$request->causes_description;
    $home_details->purpose_description =$request->purpose_description;
    $home_details->gallery_description =$request->gallery_description;
    $home_details->upcomingevent_name =$request->upcomingevent_name;
    $home_details->upcomingevent_description =$request->upcomingevent_description;
    $home_details->image_title =$request->image_title;
    $home_details->image_description =$request->image_description;
    $home_details->help_description =$request->help_description;
    $home_details->help_heading =$request->help_heading;
    $home_details->heading_description =$request->heading_description;
    $home_details->people_name =$request->people_name;
    $home_details->people_position =$request->people_position;
    $home_details->people_comment =$request->people_comment;

    $home_details->save();
    return redirect('/add-home');
}

    public function editSample(Request $request)
    {
        $data['investorprofile'] ="";     
        $data['investorprofile'] = DB::table('home')->where('id',$request->id)->first();   
        $data['investorbanner'] = DB::table('home_banner')->first();
        $data['investorprofiles'] = DB::table('home_causes')->first();
        $data['investorcategory'] = DB::table('gallery_category')->first();
        $data['investorgallery'] = DB::table('home_gallery')->first();
        $data['investorhelp'] = DB::table('home_help')->first();
        $data['investorpurpose'] = DB::table('home_purpose')->first();
        $data['investorsponsor'] = DB::table('home_sponsor')->first();
        $data['investorperson'] = DB::table('people_comment')->first();
        $data['investorevent'] = DB::table('upcoming_event')->first();
        $data['investoraboutus'] = DB::table('about_us')->first();
        $data['investorowner'] = DB::table('about_owner')->first();
        $data['investorvolunteer'] = DB::table('about_volunteer')->first();
        $data['investortotal'] = DB::table('about_total')->first();
        $data['gallerycategory'] = DB::table('gallery_category')
        ->join('home_gallery','gallery_category.id','=', 'home_gallery.category')
        ->select('gallery_category.*','home_gallery.*')
        ->get();
        return view('pages.edit-home',$data);
    }

    public function destroy($id)
    {
        $home=Home::find($id);
        $home->delete();
        return redirect('/add-home')->with('status',"Home Details Deleted Successfully");
    }

    public function SearchHome(Request $request)
    {
        $search_all=$request->post('search');
        $search=$search_all['value'];

        $strt = $request->post('start');
        $length=$request->post('length');
        $draw=$request->post('draw');

        //DB::enableQueryLog();

        $searchrecordTot = DB::table('home')
        ->where('people_name', 'like', '%' . $search . '%')
        ->get();

        $searchrecord = DB::table('home')
        ->where('people_name', 'like', '%' . $search . '%')
        ->limit($length)->offset($strt)
        ->get();

        //dd($searchrecord);

        $output_1=array();
        for($a=0;$a<sizeof($searchrecord);$a++){

            $edtBtn='<a href="'.url('/').'/edit-home/'.$searchrecord[$a]->id.'" class="btn btn-primary btn-sm">Edit</a>';
            $delBtn='<a href="'.url('/').'/delete-home/'.$searchrecord[$a]->id.'" style="background-color:#ff5252;" class="btn btn-danger btn-sm">Delete</a>';

            $temp_arr=array(
                'id'=>$searchrecord[$a]->id,
                'head_image'=>$searchrecord[$a]->head_image,
                'people_image'=>$searchrecord[$a]->people_image,
                'people_name'=>$searchrecord[$a]->people_name,
                'people_position'=>$searchrecord[$a]->people_position,
                'edit_btn'=>$edtBtn.$delBtn,
                // 'del_btn'=>$delBtn,
            );

            array_push($output_1,$temp_arr);
        }

        $output=array(
			"draw"=> intval($draw),
			"recordsTotal"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			"recordsFiltered"=> sizeof($searchrecordTot)?sizeof($searchrecordTot):'0',
			'data'=>isset($output_1)?$output_1:''
		);

        echo json_encode($output);

        //dd(DB::getQueryLog());
        //->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
    }

}
