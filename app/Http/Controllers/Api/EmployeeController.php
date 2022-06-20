<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return EmployeeResource::collection(Employee::query()->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     *
     * @return EmployeeResource
     */
    public function store(EmployeeRequest $request): EmployeeResource
    {
        $employee = Employee::query()->create($request->validated());
        if ($request->hasFile('cv') ) $employee->update(['cv'=> $request->file('cv')->storePublicly('cv-collections')]);
        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     *
     * @return EmployeeResource
     */
    public function show(Employee $employee): EmployeeResource
    {
        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee        $employee
     *
     * @return EmployeeResource
     */
    public function update(EmployeeRequest $request, Employee $employee): EmployeeResource
    {
        $employee->update($request->validated());
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     *
     * @return Response
     */
    public function destroy(Employee $employee): Response
    {
        $employee->delete();
        return \response()->noContent();
    }
}
