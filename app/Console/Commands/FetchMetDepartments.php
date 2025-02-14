<?php

namespace App\Console\Commands;

use App\Jobs\GetDepartmentsExternalData;
use App\Services\Department\SaveDepartmentService;
use App\Services\ExternalData\MuseumExternalData\DepartmentExternalData\GetDepartmentsExternalService;
use Illuminate\Console\Command;

class FetchMetDepartments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-met-departments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dispatch(new GetDepartmentsExternalData(
            new GetDepartmentsExternalService('departments'),
            new SaveDepartmentService())
        );
    }
}
