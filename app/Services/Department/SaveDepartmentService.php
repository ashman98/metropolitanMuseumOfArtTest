<?php

namespace App\Services\Department;

use App\Interfaces\Department\SaveDepartmentInterface;
use App\Models\Department;

class SaveDepartmentService implements SaveDepartmentInterface
{
    public array $departments = [];
    public function __construct()
    {
    }

    /**
     * @param array $departments
     * @return SaveDepartmentService
     */
    public function setDepartments(array $departments): SaveDepartmentService
    {
        $this->departments = $departments;
        return $this;
    }

    /**
     * @return void
     */
    public function saveDepartments(): void
    {
        foreach ($this->departments as $department) {
            Department::updateOrCreate(
                ['external_id' => $department['departmentId']],
                ['name' => $department['displayName'], 'external_id' => $department['departmentId']]
            );
        }
    }
}
