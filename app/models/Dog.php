<?php

class Dog extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dogs';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
        public static $rules = array(
            'name'  => 'required',
            'breed'  => 'required',
            'age'     => 'required',
            'sex'      => 'required'
        );

    public function user() {
        return $this->belongsTo('User');
    }

    public function breed() {
        return $this->belongsTo('Breed');
    }

    public function image() {
        return $this->hasMany('DogImage');
    }
}


