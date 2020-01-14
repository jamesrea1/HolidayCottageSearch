<?php
        //$results = DB::select('SELECT * FROM locations');
        //dd($results);
    
        //$locations = Location::All(); 
        //dd($locations);
        
        //$location = $request->input('location');
        //dd($location);


        // if($request->has('location'))    
        // {
        //     $query = $request->query();
        //     dd($query);
        // }
        
        // // INPUT
        // array:6 [▼
        //   "location" => "1"
        //   "nearBeach" => "on"
        //   "allowPets" => "on"
        //   "numGuests" => "2"
        //   "startDate" => null
        //   "endDate" => null
        // ]


//         if($request['acceptsPets'] == 'on')
//         {
//             $request['acceptsPets'] = 1;
//         }
//         if($request['nearBeach'] == 'on')
//         {
//             $request['nearBeach'] = 1;
//         }
        
        
        
        
//         $results = Property::Where('_fk_location', $request['locationID'])
//                     ->where(function ($query) use ($xx) {
//                         $query->where('near_beach', 1)
//                             ->orwhere('near_beach', 1); //orwhereraw("$xx IS NULL");
//                     })
//                     ->get();



        // $results = DB::select(
        //     '
        //     SELECT	    *
        //     FROM		properties p		
        //     WHERE		p._fk_location = :locationID
        //                 AND (p.near_beach = :nearBeach OR :nearBeachNullCheck IS NULL)
        //                 AND (p.accepts_pets = :acceptsPets OR :acceptsPetsNullCheck IS NULL)
        //                 AND p.sleeps >= :numGuests
        //                 AND NOT EXISTS
        //                 (
        //                     SELECT	*
        //                     FROM		bookings b
        //                     WHERE		(:endDate >= b.start_date)
        //                                 AND (:startDate <= b.end_date)
        //                                 AND b._fk_property = p.__pk
        //                 )                        
        //     ;'
        //     ,['locationID' => $request['locationID']
        //     , 'acceptsPets' => $request['acceptsPets']
        //     , 'acceptsPetsNullCheck' => $request['acceptsPetsNullCheck']
        //     , 'nearBeach' => $request['nearBeach']
        //     , 'nearBeachNullCheck' => $request['nearBeach']
        //     , 'numGuests' => $request['numGuests']
        //     , 'startDate' => $request['startDate']
        //     , 'endDate' => $request['endDate']
            
        //     ]);


        // if($request->has('locationID'))    
        // {
        //     // $input = $request->query();
        //     // dd($results); 
            
        // }

        // // results
        // {#246 ▼
        //     +"__pk": 1
        //     +"_fk_location": 1
        //     +"property_name": "Sea View"
        //     +"near_beach": 1
        //     +"accepts_pets": 1
        //     +"sleeps": 4
        //     +"beds": 2
        //   }
