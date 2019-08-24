<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = ['logo','alt_logo','banner','alt_banner','title','phone','hotline','fanpage','follow_us_at','limit_product','copy_right','caption_gallery_box','url_gallery_box'];
}
