<?php

class Zip extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'zipcodes';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
        public static $rules = array(
            'zip'  => 'required',
            'lat'  => 'required',
            'lon'  => 'required',
            'city'  => 'required',
            'state'  => 'required',
            'state_abbrev'  => 'required',
            );

    // public function dogs() {
    //     return $this->hasMany('Dog');
    // }
}
