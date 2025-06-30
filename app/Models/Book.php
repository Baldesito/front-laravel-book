
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'isbn', 'description', 'author',
        'publisher', 'publication_year', 'cover_image', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function copies()
    {
        return $this->hasMany(BookCopy::class);
    }

    public function availableCopies()
    {
        return $this->copies()->where('status', 'disponibile');
    }

    public function getBestAvailableCopy()
    {
        return $this->availableCopies()
                   ->orderBy('condition', 'desc')
                   ->first();
    }
}
