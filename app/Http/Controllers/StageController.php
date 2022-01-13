<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Lawyer;
use App\Model\LawyerCase;
use App\Model\Ssesiot;
use App\Model\Stage;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('stages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */



    function str_random($length = 4)
    {
        return Str::random($length);
    }

    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'notes' => 'required',

        ], [], ['name' => 'الاسم', 'date' => 'التاريخ']);

      $stage=Stage::create($request->except(['_token','images']));

        if($request->file('images')) {


            $imagess = $request->file('images');


            foreach ($imagess as $images) {
                $img = "";
                $img = $this->str_random(4) . $images->getClientOriginalName();
                $originname = time() . '.' . $images->getClientOriginalName();
                $filename = $this->str_slug(pathinfo($originname, PATHINFO_FILENAME), "-");
                $filename = $images->hashName();
                $extention = pathinfo($originname, PATHINFO_EXTENSION);
                $img = $filename;


                $destintion = 'uploads';
                $images->move($destintion, $img);
                $image = new \App\Model\Image();
                $image->image = $img;
                $image->imageable_id = $stage->id;
                $image->imageable_type ='App\Stage';
                $image->save();

            }
        }

        $this->actionSuccess();
        return redirect()->route('stages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = Stage::find($id);

        return view('stages.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Stage::find($id);


        return view('stages.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $client = Stage::find($id);

        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'notes' => 'required',

        ], [], ['name' => 'الاسم', 'date' => 'التاريخ']);
        $client->update($request->except(['images']));


        if($request->file('images')) {


            $imagess = $request->file('images');

        \App\Model\Image::where('imageable_id', $client->id)->delete();

            foreach ($imagess as $images) {
                $img = "";
                $img = $this->str_random(4) . $images->getClientOriginalName();
                $originname = time() . '.' . $images->getClientOriginalName();
                $filename = $this->str_slug(pathinfo($originname, PATHINFO_FILENAME), "-");
                $filename = $images->hashName();
                $extention = pathinfo($originname, PATHINFO_EXTENSION);
                $img = $filename;


                $destintion = 'uploads';
                $images->move($destintion, $img);
                $image = new \App\Model\Image();
                $image->image = $img;
                $image->imageable_id = $client->id;
                $image->imageable_type ='App\Stage';
                $image->save();

            }
        }



        $this->actionSuccess();
        return redirect()->route('stages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = Stage::find($id);

        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
