<?php

class BaseModel extends Eloquent {

	protected $imgDir = 'img-upload';

	public function addUploadedImage($image) {
	    $systemPath = public_path() . '/' . $this->imgDir . '/';
	    $imageName = $this->id . '-' . $image->getClientOriginalName();
	    $image->move($systemPath, $imageName);
	    $this->img_path = '/' . $this->imgDir . '/' . $imageName;
	}
}