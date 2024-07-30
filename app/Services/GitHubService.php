<?php 
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    const GITHUB_API_URL = 'https://api.github.com/search/repositories';

    public function getPopularRepositories($date, $language = null, $limit = 10)
    {
        $query = "created:>{$date}";
        if ($language) {
            $query .= " language:{$language}";
        }

        $response = Http::get(self::GITHUB_API_URL, [
            'q' => $query,
            'sort' => 'stars',
            'order' => 'desc',
            'per_page' => $limit,
        ]);

        return $response->json();
    }
}
