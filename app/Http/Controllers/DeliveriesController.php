<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveries;
class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Deliveries = Deliveries::all();

        return view('deliveries.index', compact('Deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('deliveries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //date_default_timezone_set('America/Los_Angeles');
        $now =  date('Y-m-d  H:i:s', time());
        $todayDate = date('Y-m-d  H:i:s', strtotime($request->get('date')));
        // echo $now.'<br>'.$todayDate;
        // exit;
        $request->validate([
            'title'=>'required|min:5',
            'date'=>'required|after:'.$now 
        ]);
        $deliveries = new Deliveries([
            'title' => $request->get('title'),
            'date' => $todayDate
        ]);
        $deliveries->save();
        return redirect('/deliveries')->with('success', 'Deliveries saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery = Deliveries::find($id);
        return view('deliveries.edit', compact('delivery')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $now =  date('Y-m-d  H:i:s', time());
        $todayDate = date('Y-m-d  H:i:s', strtotime($request->get('date')));
        // echo $now.'<br>'.$todayDate;
        // exit;
        $request->validate([
            'title'=>'required|min:5',
            'date'=>'required|after:'.$now 
        ]);

        $delivery = Deliveries::find($id);
        $delivery->title =  $request->get('title');
        $delivery->date = $todayDate; 
        $delivery->save(); 
        return redirect('/deliveries')->with('success', 'Delivery updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delivery = Deliveries::find($id);
        $delivery->delete();

        return redirect('/deliveries')->with('success', 'delivery deleted!');
    }
}
