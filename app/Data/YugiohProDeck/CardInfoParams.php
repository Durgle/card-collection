<?php

namespace App\Data\YugiohProDeck;

use Countable;
use JsonSerializable;
use InvalidArgumentException;

/**
 * Parameters class for YGOPRODeck API's cardinfo request
 */
class CardInfoParams implements Countable, JsonSerializable
{

    /**
     * Paramaters for card info call
     */
    private array $params = [];

    /**
     * Builds a comma-separated string from an array of string criteria
     *
     * @param  string[] $criterias
     * @param  string $separator
     * @return string
     */
    private function makeMultipleCriteria(array $criterias, string $separator = ','): string
    {
        foreach ($criterias as $criteria) {
            if (!is_string($criteria) && !is_integer($criteria)) {
                throw new InvalidArgumentException("All elements must be strings or integers.");
            }
        }
        return implode($separator, $criterias);
    }

    /**
     * Filter using the exact name
     *
     * @param  string|array<string> $name
     * @return self
     */
    public function name(string|array $name): self
    {
        $value = is_array($name) ? $this->makeMultipleCriteria($name, '|') : $name;
        $this->params['name'] = $value;
        return $this;
    }

    /**
     * Filter using approximate name
     * 
     * @param  string $name
     * @return self
     */
    public function fuzzyName(string $fname): self
    {
        $this->params['fname'] = $fname;
        return $this;
    }


    /**
     * Filter by id
     *
     * @param  int|array<int> $id
     * @return self
     */
    public function id(int|array $id): self
    {
        $value = is_array($id) ? $this->makeMultipleCriteria($id) : $id;
        $this->params['id'] = $value;
        return $this;
    }


    /**
     * Filter by card type
     *
     * @param  string|array<string> $type
     * @return self
     */
    public function type(string|array $type): self
    {
        $value = is_array($type) ? $this->makeMultipleCriteria($type) : $type;
        $this->params['type'] = $value;
        return $this;
    }


    /**
     * Filter by card attack
     *
     * @param  int $atk
     * @return self
     */
    public function atk(int $atk): self
    {
        $this->params['atk'] = $atk;
        return $this;
    }

    /**
     * Filter by card defence
     *
     * @param  int $def
     * @return self
     */
    public function def(int $def): self
    {
        $this->params['def'] = $def;
        return $this;
    }

    /**
     * Filter by card level/rank
     *
     * @param  int $level
     * @return self
     */
    public function level(int $level): self
    {
        $this->params['level'] = $level;
        return $this;
    }

    /**
     * Filter by card race (Spellcaster, Warrior, Insect, etc)
     *
     * @param  string|array<string> $level
     * @return self
     */
    public function race(string|array $race): self
    {
        $value = is_array($race) ? $this->makeMultipleCriteria($race) : $race;
        $this->params['race'] = $value;
        return $this;
    }

    /**
     * Filter by card attribute
     *
     * @param  string|array<string> $attribute
     * @return self
     */
    public function attribute(string|array $attribute): self
    {
        $value = is_array($attribute) ? $this->makeMultipleCriteria($attribute) : $attribute;
        $this->params['attribute'] = $value;
        return $this;
    }

    /**
     * Filter by link value
     *
     * @param  int $link
     * @return self
     */
    public function link(int $link): self
    {
        $this->params['link'] = $link;
        return $this;
    }

    /**
     * Filter by link marker (Top, Bottom, Left, Right, Bottom-Left, Bottom-Right, Top-Left, Top-Right)
     *
     * @param  string|array<string> $linkMarker
     * @return self
     */
    public function linkMarker(string|array $linkMarker): self
    {
        $value = is_array($linkMarker) ? $this->makeMultipleCriteria($linkMarker) : $linkMarker;
        $this->params['linkmarker'] = $value;
        return $this;
    }

    /**
     * Filter by pendulum scale value
     *
     * @param  int $scale 
     * @return self
     */
    public function scale(int $scale): self
    {
        $this->params['scale'] = $scale;
        return $this;
    }


    /**
     * Filter by card set
     *
     * @param  string $cardset 
     * @return self
     */
    public function cardset(string $cardset): self
    {
        $this->params['cardset'] = $cardset;
        return $this;
    }

    /**
     * Filter by card archetype 
     *
     * @param  string $archetype 
     * @return self
     */
    public function archetype(string $archetype): self
    {
        $this->params['archetype'] = $archetype;
        return $this;
    }

    /**
     * Filter by card banlist (TCG, OCG, Goat)
     *
     * @param  string $banlist 
     * @return self
     */
    public function banlist(string $banlist): self
    {
        $this->params['banlist'] = $banlist;
        return $this;
    }

    /**
     * Filter by the format of the cards (tcg, goat, ocg goat, speed duel, master duel, rush duel, duel links)
     *
     * @param  string $format 
     * @return self
     */
    public function format(string $format): self
    {
        $this->params['format'] = $format;
        return $this;
    }

    /**
     * Filter by only staple
     *
     * @return self
     */
    public function onlyStaple(): self
    {
        $this->params['staple'] = 'yes';
        return $this;
    }

    /**
     * Add maximum number of results
     * 
     * @param  int $num 
     * @return self
     */
    public function num(int $num): self
    {
        $this->params['num'] = $num;
        return $this;
    }

    /**
     * Add starting point for pagination.
     * 
     * @param  int $offset 
     * @return self
     */
    public function offset(int $offset = 0): self
    {
        $this->params['offset'] = $offset;
        return $this;
    }

    /**
     * Change card language
     * 
     * @param  string $language 
     * @return self
     */
    public function language(string $language): self
    {
        $this->params['language'] = $language;
        return $this;
    }

    /**
     * Change card language to french
     *
     * @return self
     */
    public function inFrench(): self
    {
        return $this->language('fr');
    }

    /**
     * Change card language to german
     *
     * @return self
     */
    public function inGerman(): self
    {
        return $this->language('de');
    }

    /**
     * Change card language to italian
     *
     * @return self
     */
    public function inItalian(): self
    {
        return $this->language('it');
    }

    /**
     * Change card language to portuguese
     *
     * @return self
     */
    public function inPortuguese(): self
    {
        return $this->language('pt');
    }

    /**
     * Clear all parameters
     *
     * @return self
     */
    public function clear(): self
    {
        $this->params = [];
        return $this;
    }

    /**
     * Converts the parameters to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter($this->params, fn($value) => $value !== null && $value !== '');
    }

    /**
     * Gets the count of defined parameters
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->toArray());
    }

    /**
     * Checks if any parameters are defined
     * 
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->toArray());
    }

    /**
     * Fusionne avec d'autres paramètres
     */
    public function merge(self $other): self
    {
        $this->params = array_merge($this->params, $other->params);
        return $this;
    }

    /**
     * Converts the parameters to a URL-encoded query string
     *
     * @return string
     */
    public function __toString(): string
    {
        return http_build_query($this->toArray());
    }

    /**
     * Converts the parameters to an array for JSON serialization
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Creates a new instance of the class
     *
     * @return static
     */
    public static function create(): self
    {
        return new self();
    }
}
