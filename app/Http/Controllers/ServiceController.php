<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Point;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Log;

class ServiceController extends Controller
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
            return Datatables::of(Service::query())->addIndexColumn()
                ->addColumn('action', 'service.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'service_name' =>  'required',
            'service_desc' =>  'nullable',
        ]);

        try{
            DB::beginTransaction();
            $service = Service::create($request->all());

            DB::commit();

            return redirect()->route('services.index')->with('success', 'Service Added successfully.');

        }catch(\Exception $e){
            DB::rollback();

            Log::error("storage error: ".$e->getMessage());
            return redirect()->route('services.index')->with('error', 'Service not added successfully.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'service_name' =>  'required',
            'service_desc' =>  'nullable',
        ]);

        try{
            DB::beginTransaction();
            $service->service_name = $request->post('service_name');
            $service->service_desc = $request->post('service_desc');

            $service->save();

            DB::commit();

            return redirect()->route('services.index')->with('success', 'Service edited successfully.');

        }catch(\Exception $e){
            DB::rollback();
            Log::error("update error: ".$e->getMessage());
            return redirect()->route('services.index')->with('error', 'Service not edited successfully.');

        }
    }

    /**
     * Show the form for association of services to the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function associate(Service $service)
    {
        $points = Point::whereIn('id',$service->point()->pluck('point_id')->toArray())->pluck('id','point_name')->toArray();
        $prices = $service->price()->get();
        //dd($points,$prices);
        return view('service.associate',compact('service','points','prices'));

    }

    /**
     * Update the specified associations for the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function updateAssociation(Request $request, Service $service)
    {
        $request->validate([
            'point_*' =>  'required',
            'price_*' => 'required'
        ]);

        try{
            DB::beginTransaction();

            $points = $service->point()->get();
            foreach($points as $point){
                $price_for_point = $request->post('price_'.$point->point_id);
                if(is_null($price_for_point))
                    continue;
                $association = $service->price()->where('point_id',$point->point_id)->where('service_id',$service->id)->first();
                $association->price = $price_for_point;
                $association->save();
            }

            DB::commit();

            return redirect()->route('services.index')->with('success', 'Services edited successfully.');

        }catch(\Exception $e){
            DB::rollback();
            Log::error("update error: ".$e->getMessage());
            return redirect()->route('services.index')->with('error', 'Services not edited successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
