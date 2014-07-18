<?php

class DogImage extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dog_images';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function dog() {
        return $this->belongsTo('Dog');
    }
}


