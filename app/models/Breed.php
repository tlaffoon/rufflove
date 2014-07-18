<?php

class Breed extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'breeds';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
        public static $rules = array(
            'name'  => 'required',
        );

    public function dog() {
        return $this->hasMany('Dog');
    }
}
