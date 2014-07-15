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
    
        protected $hidden = array('password', 'remember_token');

        public static $rules = array(
            'name'  => 'required|max:50',
            'breed'  => 'required',
            'age'     => 'required',
            'sex'      => 'required'
        );

    // public function posts() {
    //     return $this->hasMany('Post');
    // }

    protected $imgDir = 'img-upload';

    public function addUploadedImage($image) {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }
}


