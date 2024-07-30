<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RepositoriesReportMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $fileName;
    protected $repositories;

    public function __construct($fileName, $repositories)
    {
        $this->fileName = $fileName;
        $this->repositories = $repositories;
    }

    public function build()
    {
        return $this->markdown('emails.repositories_report')
                    ->attach(Storage::path($this->fileName))
                    ->with('repositories', $this->repositories)
                    ->subject('Popular GitHub Repositories Report');
    }
}
