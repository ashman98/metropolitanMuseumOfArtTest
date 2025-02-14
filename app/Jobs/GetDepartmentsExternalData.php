<?php

namespace App\Jobs;

use App\Interfaces\Department\SaveDepartmentInterface;
use App\Interfaces\ExternalDataApi\GetDepartmentExternalInterface;
use App\Services\ExternalData\DepartmentService\GetDepartmentsExternal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GetDepartmentsExternalData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private GetDepartmentExternalInterface $getDepartmentsService;
    private SaveDepartmentInterface $saveDepartmentsService;

    /**
     * Create a new job instance.
     */
    public function __construct(
        GetDepartmentExternalInterface $getDepartments,
        SaveDepartmentInterface $saveDepartments
    )
    {
        $this->getDepartmentsService = $getDepartments;
        $this->saveDepartmentsService = $saveDepartments;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $externalDepartments =  $this->getDepartmentsService->getDepartmentsExternalData();
       if (!empty($externalDepartments)){
            $this->saveDepartmentsService->setDepartments(
                $externalDepartments->toArray()
            )->saveDepartments();
       }
    }
}
