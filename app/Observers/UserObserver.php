<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Region;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {   
        $user->region_id = Country::findOrFail($user->country_id)->regions()->first()->id;
        
        $address = $user->address;

        $user->address_short = substr($address, 0, 25);
        
        $user->phone = "+" .Country::find($user->country_id)->phonecode . " " . rand(10000000, 99999999);
        
        $user->city_id = Region::find($user->region_id)
            ->cities()
            ->first()->id;

    }
    
}
