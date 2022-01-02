<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\FnsApiService;
use App\IdentificationNumber;

class CheckInnJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $inn;
    public $identificationNumber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($inn, IdentificationNumber $identificationNumber)
    {
        $this->inn = $inn;
        $this->identificationNumber = $identificationNumber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FnsApiService $service)
    {
        $service->check_inn($this->inn, $this->identificationNumber);
    }
}
