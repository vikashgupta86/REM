<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use App\Models\Prop\UserRequest;
use App\Models\Prop\SaveProps;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{

    public function index()
    {
        $properties = Property::select()->orderByDESC('created_at')->get();
        return view('home', compact('properties'));
    }

    public function single($id)
    {
        $singleprop = Property::find($id);
        $propimages = PropImage::where('property_id', $id)->get();
        $relatedprops = Property::where('id', '!=', $id)
            ->where('home_type', $singleprop->home_type)
            ->take(3)->orderBy('created_at', 'desc')->get();

        if (Auth::check()) {
            $validateFormCount = UserRequest::where('property_id', $id)
                ->where('user_id', Auth::id())
                ->count();
            $validatesaveproperty = SaveProps::where('property_id', $id)
                ->where('user_id', Auth::id())
                ->count();
        }
        // dd($relatedprops);
        return view('props.single', compact('singleprop', 'validatesaveproperty', 'propimages', 'relatedprops', 'validateFormCount'));
    }

    public function insertRequest(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $properties = UserRequest::create([
            'property_id' => $request->property_id,
            'agent_name' => $request->agent_name,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Your request has been sent successfully!');
    }

    public function saveProperty(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',

            'phone' => 'required',
        ]);


        $properties = SaveProps::create([
            'property_id' => $request->property_id,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'image' => $request->image,
            'location' => $request->location,
            'price' => $request->price,
        ]);


        if ($properties) {
            return redirect()->back()->with('save', 'Property has been saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to save the property. Please try again.');
        }
    }


    public function contact()
    {
        return view('contact.index');
    }


    public function propsBuy($type = 'Buy')
    {

        $properties_buy = Property::select()->where('home_type', $type)->get();
        $singleprop = Property::find(1);
        $relatedprops = Property::where('home_type', $type)->take(3)->orderBy('created_at', 'desc')->get();
        return view('props.popsbuy', compact('properties_buy', 'singleprop', 'relatedprops'));
    }

    public function propsrent($type = 'Buy')
    {

        $properties_buy = Property::select()->where('home_type', $type)->get();
        $singleprop = Property::find(1);
        $relatedprops = Property::where('home_type', $type)->take(3)->orderBy('created_at', 'desc')->get();
        return view('props.popsrent', compact('properties_buy', 'singleprop', 'relatedprops'));
    }

    public function DisplayByHometype($home_type)
    {
        $propsByHomeType = Property::select()->where('home_type', $home_type)->get();
        $singleprop = Property::find(1);
        $relatedprops = Property::where('home_type', $home_type)->take(3)->orderBy('created_at', 'desc')->get();

        return view('props.propsbytype', compact('propsByHomeType', 'home_type', 'singleprop', 'relatedprops'));
    }
  
    public function PriceAsc()
    {
        $home_type = 'Buy'; // Set a default value for $home_type
        $propsByPriceAsc = Property::select()->orderBy('price', 'asc')->get();
        $propsByHomeType = Property::select()->where('home_type', $home_type)->get();
        $singleprop = Property::find(1);
        return view('props.priceasc', compact('propsByPriceAsc', 'propsByHomeType', 'singleprop'));
    }


    public function PriceDesc()
    {
        $home_type = 'Buy'; // Set a default value for $home_type
        $propsByPriceDesc = Property::select()->orderBy('price', 'desc')->get();
        $propsByHomeType = Property::select()->where('home_type', $home_type)->get();
        $singleprop = Property::find(1);
        return view('props.pricedesc', compact('propsByPriceDesc', 'propsByHomeType', 'singleprop'));
    }


    public function search(Request $request){
       $list_type=$request->input('list_types');
       $offer_type=$request->input('offer_types');
       $city_type=$request->input('city_types');
         $results=Property::select()->where('home_type','like','%'.$list_type.'%')
         ->where('offer_type','like','%'.$offer_type.'%')
         ->where('city','like','%'.$city_type.'%')
         ->get();
         return view('props.searchresults', compact('results'));


    }
}
