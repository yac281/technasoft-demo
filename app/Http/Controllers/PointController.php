<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Log;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Point::query())->addIndexColumn()
                ->addColumn('action', 'point.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('point.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('point.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'point_name' =>  'required',
        ]);

        try{
            DB::beginTransaction();
            $point = Point::create($request->all());

            DB::commit();

            return redirect()->route('points.index')->with('success', 'Point Added successfully.');

        }catch(\Exception $e){
            DB::rollback();
            Log::error("storage error: ".$e->getMessage());
            return redirect()->route('points.index')->with('error', 'Point not added successfully.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //to implement blade
        return view('point.show',compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        return view('point.edit',compact('point'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        $request->validate([
            'point_name' =>  'required',
        ]);

        try{
            DB::beginTransaction();
            $point->point_name = $request->post('point_name');

            $point->save();

            DB::commit();

            return redirect()->route('points.index')->with('success', 'Point edited successfully.');

        }catch(\Exception $e){
            DB::rollback();
            Log::error("update error: ".$e->getMessage());
            return redirect()->route('points.index')->with('error', 'Point not edited successfully.');

        }
    }

    /**
     * Show the form for association of services to the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function associate(Point $point)
    {
        $services = Service::whereIn('id',$point->services()->pluck('service_id')->toArray())->pluck('id','service_name')->toArray();
        return view('point.associate',compact('point','services'));

    }

    /**
     * Update the specified associations for the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function updateAssociation(Request $request, Point $point)
    {
        $request->validate([
            'services_id[]' =>  'nullable',
        ]);

        try{
            DB::beginTransaction();
            $services = $request->post('services_id');

            $old_associations = $point->services()->get();
            foreach($old_associations as $old_item)
                $old_item->delete();

            foreach($services as $service){
                $point->services()->create(['point_id' => $point->id, 'service_id' => $service]);
            }

            DB::commit();

            return redirect()->route('points.index')->with('success', 'Point edited successfully.');

        }catch(\Exception $e){
            DB::rollback();
            Log::error("update error: ".$e->getMessage());
            return redirect()->route('points.index')->with('error', 'Point not edited successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        // to implement (decide for phisical delete or soft delete)
    }
}
