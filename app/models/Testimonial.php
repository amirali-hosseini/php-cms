<?php

namespace app\models;

use app\libraries\Model;

class Testimonial extends Model
{
    public static string $DIR = 'clients';
    protected string $table = 'testimonials';
}