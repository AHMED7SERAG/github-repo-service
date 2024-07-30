<?php

namespace Tests\Feature;

use App\Services\GitHubService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GitHubServiceTest extends TestCase
{
    public function test_get_popular_repositories()
    {
        Http::fake([
            'api.github.com/search/repositories*' => Http::response([
                'items' => [
                    ['name' => 'repo1', 'stargazers_count' => 100],
                    ['name' => 'repo2', 'stargazers_count' => 200],
                ]
            ], 200)
        ]);

        $service = new GitHubService();
        $repositories = $service->getPopularRepositories('2022-01-01', 'php', 10);

        $this->assertIsArray($repositories);
        $this->assertCount(2, $repositories['items']);
        $this->assertEquals('repo1', $repositories['items'][0]['name']);
        $this->assertEquals(100, $repositories['items'][0]['stargazers_count']);
    }
}
