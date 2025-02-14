<?php

namespace App\Interfaces\Department;

interface SaveDepartmentInterface
{
    /**
     * @return void
     */
    public function saveDepartments(): void;

    /**
     * @param array $departments
     * @return self
     */
    public function setDepartments(array $departments): self;
}
