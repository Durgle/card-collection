<?php

namespace App\Models\Yugioh;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardImage extends Model
{

    /** @use HasFactory<\Database\Factories\Yugioh\CardImageFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'yugioh_card_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'yugioh_card_id',
        'filename',
        'filename_small',
        'filename_cropped',
        'primary'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_primary' => 'boolean'
    ];

    /**
     * Get the card this image belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
