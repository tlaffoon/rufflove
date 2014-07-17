<?php

class DogImage extends Eloquent {

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
    
        // protected $hidden = array('password', 'remember_token');

        public static $rules = array(
            
            'dog_id'  => 'required',            
            'img_path' => 'required',            
        );

    // public function user() {
    //     return $this->has('User');
    // }

    protected $imgDir = 'img-upload';

    public function addUploadedImage($image) {
        $systemPath = public_path() . '/' . $this->imgDir . '/';
        $imageName = $this->id . '-' . $image->getClientOriginalName();
        $image->move($systemPath, $imageName);
        $this->img_path = '/' . $this->imgDir . '/' . $imageName;
    }
}


