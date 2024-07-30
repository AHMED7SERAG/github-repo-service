<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RepositoriesExport;
use Illuminate\Support\Facades\Mail;
use App\Mail\RepositoriesReportMail;

class GitHubController extends Controller
{
    protected $githubService;

    public function __construct(GitHubService $githubService)
    {
        $this->githubService = $githubService;
    }

    public function index(Request $request)
    {
        $date = $request->input('date', '2019-01-10');
        $language = $request->input('language');
        $limit = $request->input('limit', 10);

        $repositories = $this->githubService->getPopularRepositories($date, $language, $limit);

        return response()->json($repositories);
    }

    public function sendReport(Request $request)
    {
        $date = $request->input('date', '2019-01-10');
        $language = $request->input('language');
        $limit = $request->input('limit', 10);
        $email = $request->input('email',"f.mostafa@exab.sa");

        $repositories = $this->githubService->getPopularRepositories($date, $language, $limit);

        // Generate the Excel file
        $fileName = 'repositories.xlsx';
        Excel::store(new RepositoriesExport($repositories), $fileName);

        // Send the email
        Mail::to($email)->send(new RepositoriesReportMail($fileName,$repositories['items']));

        return response()->json(['message' => 'Report sent successfully.']);
    }
}
