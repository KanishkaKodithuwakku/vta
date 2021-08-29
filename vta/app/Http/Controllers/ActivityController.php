<?php

namespace App\Http\Controllers;
use App\Http\Requests\ActivityCreateRequest;
use App\Http\Requests\ActivityUpdateRequest;
use Illuminate\Http\Request;
use App\Activity;
use App\Project;
use App\Category;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd('fuv');
        $activities = Activity::paginate(15);
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       $id = $request['category_id'];
       $projects = Project::all();
       $categories = Category::all();
        return view('activity.create',compact('id','projects','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityCreateRequest $request)
    {
       // dd($request->all());
        if(Activity::create($request->all())){
            return redirect('/activity')->with('success', 'Activity is successfully saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        // dd($activity);

        if (!is_null($activity)) {
            return view('activity.view', compact('activity'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        if (!is_null($activity)) {
            return view('activity.edit', compact('activity'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);
        if($activity->update($request->all())){
            return redirect('/activity')->with('success', 'Activity is successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        if (!is_null($activity)) {
            $activity->delete();
        }

        return redirect('/activity')->with('success', 'Activity is successfully deleted');
    }
}
