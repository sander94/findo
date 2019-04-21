<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Image;

class Events extends Model
{
    protected $fillable = ['title', 'description', 'image', 'slider_image', 'mobile_slider_image', 'video', 'additional_info', 'date', 'time', 'location', 'ticket_price', 'google_address', 'organizator', 'is_promoted', 'is_active', 'tags', 'region'];




public function setImageAttribute($value)
	{

     if (request()->hasFile('image')) {
     
        // get posted images attributes
        $image = request()->file('image');
        // generate random string for file name
        $renamed = time().'_'.substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10).'.'.$image->getClientOriginalExtension(); 

        // give destinations names
        $imgdest = public_path('images/events');
        $thumbdest = public_path('images/events/thumb');
       
        // read image from temporary file
        $img = Image::make($_FILES['image']['tmp_name']);

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imgdest.'/'.$renamed);

        // make small image
        $img->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // save image
        $img->save($thumbdest.'/'.$renamed);

        $this->attributes['image'] = $renamed;

        }


    }










public function setSliderImageAttribute($value)
    {


     if (request()->hasFile('slider_image')) {
     
        // get posted images attributes
        $image = request()->file('slider_image');
        // generate random string for file name
        $renamed = time().'_'.substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10).'.'.$image->getClientOriginalExtension(); 

        // give destinations names
        $imgdest = public_path('images/events/sliders');
        $thumbdest = public_path('images/events/sliders/thumb');
       
        // read image from temporary file
        $img = Image::make($_FILES['slider_image']['tmp_name']);

        $img->resize(1800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imgdest.'/'.$renamed);

        // make small image
        $img->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // save image
        $img->save($thumbdest.'/'.$renamed);

        $this->attributes['slider_image'] = $renamed;

        }

    }


public function setMobileSliderImageAttribute($value)
    {


     if (request()->hasFile('mobile_slider_image')) {
     
        // get posted images attributes
        $image = request()->file('mobile_slider_image');
        // generate random string for file name
        $renamed = time().'_'.substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10).'.'.$image->getClientOriginalExtension(); 

        // give destinations names
        $imgdest = public_path('images/events/sliders');
        $thumbdest = public_path('images/events/sliders/thumb');
       
        // read image from temporary file
        $img = Image::make($_FILES['mobile_slider_image']['tmp_name']);

        $img->resize(1800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imgdest.'/'.$renamed);

        // make small image
        $img->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // save image
        $img->save($thumbdest.'/'.$renamed);

        $this->attributes['mobile_slider_image'] = $renamed;

        }

    }








public function setDateAttribute($value) {
	$this->attributes['date'] = implode(array_reverse(explode(".", $value)), "-");
}

public function getDateAttribute($value) {
	return $date = implode(array_reverse(explode("-", $value)), ".");
}




}