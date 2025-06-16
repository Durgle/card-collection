<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Data\YugiohProDeck\ApiResponseDto;
use App\Data\YugiohProDeck\CardInfoParams;

class YugiohProDeckService
{

    /**
     * Cache lifetime in second
     */
    private const CACHE_TTL = 3600;

    /**
     * Cache prefix
     */
    private const CACHE_PREFIX = 'yugioh_api:';

    /**
     * Yugioh APi url
     */
    private const BASE_URL = 'https://db.ygoprodeck.com/api/v7';

    /**
     * Perform an API call.
     *
     * @param  string $endpoint
     * @param  array $params
     * @return array
     */
    private function makeApiCall(string $endpoint, array $params = []): array
    {
        try {
            $response = Http::timeout(30)->get(self::BASE_URL . $endpoint, $params);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('YugiohProDeckService: An error occurred while calling the API.', [
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'params' => $params
            ]);

            return ['error' => 'Erreur API', 'status' => $response->status()];
        } catch (Exception $e) {
            Log::error('YugiohProDeckService: An exception occurred while calling the API.', [
                'endpoint' => $endpoint,
                'message' => $e->getMessage(),
                'params' => $params
            ]);

            return ['error' => 'Exception: ' . $e->getMessage()];
        }
    }

    /**
     * Fetch all cards
     *
     * @param  CardInfoParams $params
     * @return ApiResponseDto
     */
    public function getCards(?CardInfoParams $params): ?ApiResponseDto
    {
        $arrParams = $params ? $params->toArray() : [];
        $cacheKey = $this->generateCacheKey('cardinfo', $arrParams);

        $response = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($arrParams) {
            return $this->makeApiCall('/cardinfo.php', $arrParams);
        });

        if (isset($response['error'])) {
            return null;
        }

        return ApiResponseDto::fromCardsArray($response);
    }

    /**
     * Fetch all archetypes
     *
     * @return ApiResponseDto
     */
    public function getAchetypes(): ?ApiResponseDto
    {
        $cacheKey = $this->generateCacheKey('archetypes');

        $response = Cache::remember($cacheKey, self::CACHE_TTL * 24, function () {
            return $this->makeApiCall('/archetypes.php');
        });

        if (isset($response['error'])) {
            return null;
        }

        return ApiResponseDto::fromArchetypesArray($response);
    }

    /**
     * Fetches all sets
     *
     * @return ApiResponseDto
     */
    public function getCardSets(): ?ApiResponseDto
    {
        $cacheKey = $this->generateCacheKey('cardsets');

        $response = Cache::remember($cacheKey, self::CACHE_TTL * 24, function () {
            return $this->makeApiCall('/cardsets.php');
        });

        if (isset($response['error'])) {
            return null;
        }

        return ApiResponseDto::fromSetsArray($response);
    }

    /**
     * Flushes the cache for a specific key or all entries.
     *
     * @param  string|null $key
     * @return bool
     */
    public function clearCache(?string $key): bool
    {
        if ($key) {
            return Cache::forget(self::CACHE_PREFIX . $key);
        }

        if (config('cache.default') === 'redis') {
            $redis = Cache::getRedis();
            $keys = $redis->keys(self::CACHE_PREFIX . '*');

            if (!empty($keys)) {
                return $redis->del($keys) > 0;
            }
        }

        return true;
    }


    /**
     * Generate a unique cache identifier based on endpoint and parameters.
     *
     * @param  string $endpoint
     * @param  array $params
     * @return string
     */
    private function generateCacheKey(string $endpoint, array $params = []): string
    {
        $paramString = empty($params) ? '' : ':' . md5(serialize($params));
        return self::CACHE_PREFIX . $endpoint . $paramString;
    }


    /**
     * Checks for the existence of a cache key
     *
     * @param  string $endpoint
     * @param  array $params
     * @return bool
     */
    public function isCached(string $endpoint, array $params = []): bool
    {
        $cacheKey = $this->generateCacheKey($endpoint, $params);
        return Cache::has($cacheKey);
    }
}
