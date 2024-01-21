<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //Mostafa
    protected $fillable = ['productName', 'productPrice', 'productDescription','productProducer'];
    //Mostafa

}
