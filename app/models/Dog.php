<?php

class Dog extends Eloquent {

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

    // public function image() {
    //     return $this->hasMany('DogImage');
    // }

    protected $imgDir = 'img-upload';

    public function addUploadedImage($image) {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }

    public function scopeSearchBreed($query, $breed)
    {
      $query->whereHas('breed', function ($q) use ($breed) {
        $q->where('name', 'like', "%{$breed}%");
      });
    }

    // public function scopeWithingRadius($query, $radius)
    // {
    //   $query->where(...); // do math here
    // }
    // public function image() {
    //     return $this->hasMany('DogImage');
    // }
}


