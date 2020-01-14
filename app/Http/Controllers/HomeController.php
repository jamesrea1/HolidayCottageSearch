<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;
use App\Booking;
use App\Property;

class HomeController extends Controller
{
   
    public function search(Request $request)
    {
        // Validate
        //

        $validationData = $request->validate([
            'locationID' => 'numeric',
            'numGuests' => 'numeric',
            'startDate' => 'date',
            'numNights' => 'numeric'
        ]);
        

        // Clean input data for DB query
        //

        $locationID = $request['locationID'];
        $nearBeach = $request['nearBeach'];
        $acceptsPets = $request['acceptsPets'];
        $numGuests = $request['numGuests'] ?? 0;
        $numNights = $request['numNights'] ?? 0;

        $startDate = date( 'Y-m-d', strtotime($request['startDate']));
        $endDate = date( 'Y-m-d',strtotime($startDate. ' + '.$numNights.' days'));

        if($nearBeach == 'on')
        {
            $nearBeach = 1;
        }
        if($acceptsPets == 'on')
        {
            $acceptsPets = 1;
        }
        

        // Get cottages
        //

        $results = Property::where('_fk_location', $locationID)
                    ->whereRaw('(near_beach = ? OR ? IS NULL)', [$nearBeach, $nearBeach])
                    ->whereRaw('(accepts_pets = ? OR ? IS NULL)', [$acceptsPets, $acceptsPets])
                    ->where('sleeps', '>=', $numGuests)                
                    ->whereNotExists(function($query) use($startDate, $endDate)
                        {
                            $query->select(DB::raw(1))
                                ->from('bookings')
                                ->whereRaw('(? > start_date)
                                            AND (? < end_date)
                                            AND _fk_property = properties.__pk', [$endDate, $startDate]);
                        })                
                    ->get();
        
        
        // Send data to view
        //

        $locations = Location::All();
        $oldData = $request->session()->get('_old_input');
 
        return view('search')->with(compact('results'))
                             ->with(compact('locations')) 
                             ->with(compact('oldData')); 

            
    }

}

