<?php

namespace App\Models\Yugioh;

use App\Enums\Yugioh\CardIcon;
use App\Enums\Yugioh\CardType;
use App\Enums\Yugioh\FrameType;
use App\Enums\Yugioh\MonsterType;
use App\Enums\Yugioh\CardAttribute;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Yugioh\LinkMarkerArrayCast;
use App\Casts\Yugioh\CardTypeDelimitedCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{

    /** @use HasFactory<\Database\Factories\Yugioh\CardFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'yugioh_cards';

    /**
     * The attributes that should be appended to the model's array form.
     * 
     *  @var array
     */
    protected $appends = ['tags'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'frame_type',
        'monster_type',
        'icon',
        'atk',
        'def',
        'attribute',
        'level',
        'pendulumn_scale',
        'link_level',
        'type',
        'link_marker',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'frame_type' => FrameType::class,
        'monster_type' => MonsterType::class,
        'icon' => CardIcon::class,
        'atk' => 'integer',
        'def' => 'integer',
        'attribute' => CardAttribute::class,
        'level' => 'integer',
        'pendulumn_scale' => 'integer',
        'link_level' => 'integer',
        'type' => CardTypeDelimitedCast::class,
        'link_marker' => LinkMarkerArrayCast::class,
    ];

    /**
     * Get the tags for the card.
     * 
     * @return string|null
     */
    public function getTagsAttribute(): ?string
    {

        $tags = collect($this->type ?? [])
            ->filter(fn($type) => $type instanceof CardType)
            ->map(fn($type) => $type->label())
            ->toArray();

        if ($this->monster_type instanceof MonsterType) {
            $tags[] = $this->monster_type->label();
        }

        return $tags ? '[' . implode('\\', $tags) . ']' : null;
    }

    /**
     * Get all images for the card.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<CardImage>
     */
    public function images()
    {
        return $this->hasMany(CardImage::class, 'card_id');
    }

    /**
     * Get all translations for the card.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<CardTranslation>
     */
    public function translations()
    {
        return $this->hasMany(CardTranslation::class, 'card_id');
    }

    /**
     * Get the translation relationship for the card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<CardTranslation>
     */
    public function translation()
    {
        return $this->hasOne(CardTranslation::class, 'card_id');
    }

    /**
     * Scope to eager-load the translation in a specific language.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $languageCode
     * @return void
     */
    public function scopeWithTranslationForLanguage($query, string $languageCode)
    {
        $query->with(['translation' => function ($query) use ($languageCode) {
            $query->whereHas('language', fn($q) => $q->where('code', $languageCode));
        }]);
    }

    /**
     * Scope to filter cards that are translated in the given language.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $languageCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTranslated($query, string $languageCode)
    {
        return $query->whereHas('translations.language', function ($q) use ($languageCode) {
            $q->where('code', $languageCode);
        });
    }

    /**
     * Scope to filter cards that are NOT translated in the given language.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $languageCode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotTranslated($query, string $languageCode)
    {
        return $query->whereDoesntHave('translations.language', function ($q) use ($languageCode) {
            $q->where('code', $languageCode);
        });
    }

    /**
     * Get the translated name for the card (based on the loaded translation).
     *
     * @return string|null
     */
    public function getNameAttribute(): ?string
    {
        return $this->translation?->name;
    }

    /**
     * Get the translated description for the card (based on the loaded translation).
     *
     * @return string|null
     */
    public function getDescriptionAttribute(): ?string
    {
        return $this->translation?->description;
    }

    /**
     * Get the translated pendulum effect for the card (based on the loaded translation).
     *
     * @return string|null
     */
    public function getPendulumEffectAttribute(): ?string
    {
        return $this->translation?->pendulum_effect;
    }
}
