<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    // memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['atrikel' , 'content', 'cover'];
    // memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['atrikel' , 'content', 'cover'];
    // mencatat waktu pembuatan dan update data otomatis
    public $timestamps = true;

    // membuat relasi one to many
    public function judul()
    {
        // data model "judul" bisa memiliki banyak data
        // dari model "artikel" melalui fk "judul_id"
        return $this->belongsTo('App\Models\judul', 'judul_id');
    }

    public function image(){
        if ($this->cover && file_exists('image/artikel/' . $this->cover)){
            return asset('image/artikel/' . $this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }
    public function deleteImage(){
        if ($this->cover && file_exists(public_path('image/artikel/' . $this->cover))) {
            return unlink(public_path('image/artikel/' . $this->cover));
        }
    }
}