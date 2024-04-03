<?php

namespace App\Jobs;

use App\Contracts\EmailInterface;
use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $application;
    /**
     * Create a new job instance.
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     */
    public function handle(EmailInterface $emailService): void
    {
        try {
            $emailService->sendExchangeRequest($this->application);
            Log::info('Email успешно отправлен для');
        } catch (\Exception $e) {
            Log::error('Ошибка при отправке почты' . '. Ошибка: ' . $e->getMessage());
        }
    }
}
