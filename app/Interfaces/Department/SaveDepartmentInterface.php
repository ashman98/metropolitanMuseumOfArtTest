<?php

namespace App\Interfaces\Department;

interface SaveDepartmentInterface
{
    public function saveDepartments(): void;
    public function setDepartments(array $departments): self;
}
