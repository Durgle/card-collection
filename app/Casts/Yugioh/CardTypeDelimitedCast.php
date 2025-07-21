<?php

namespace App\Casts\Yugioh;

use App\Enums\Yugioh\CardType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class CardTypeDelimitedCast implements CastsAttributes
{
    protected string $separator;

    public function __construct(string $separator = '|')
    {
        $this->separator = $separator;
    }

    public function get(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (empty($value)) return [];

        $cleaned = trim($value, $this->separator);
        $types = explode($this->separator, $cleaned);

        return CardType::fromArray($types);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {

        if (empty($value)) return null;

        if (is_array($value)) {
            $values = array_map(fn($v) => $v instanceof CardType ? $v->value : $v, $value);

            return $this->separator . implode($this->separator, $values) . $this->separator;
        }

        return (string) $value;
    }
}
