<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BookCopy extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 'barcode', 'condition', 'status', 'notes'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->barcode)) {
                $model->barcode = 'BC' . Str::random(10);
            }
        });
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
