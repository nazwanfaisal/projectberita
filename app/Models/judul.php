<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class judul extends Model
{
    use HasFactory;
     // memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['judul_id'];
    // memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['judul_id'];
    // mencatat waktu pembuatan dan update data otomatis
    public $timestamps = true;

    // membuat relasi one to many
    public function artikel()
    {
        // data model "Author" bisa memiliki banyak data
        // dari model "Book" melalui fk "author_id"
        return $this->hasMany('App\Models\artikel', 'judul_id');
    }
}
