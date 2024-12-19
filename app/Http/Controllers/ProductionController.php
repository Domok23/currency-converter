<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Project;
use Carbon\Carbon;


class ProductionController extends Controller
{
    public function calculateETA($projectId)
    {
        $project = Project::with('tasks')->findOrFail($projectId);
        $totalStandardTime = $project->tasks->sum('standard_time');
        $workHoursPerDay = 8;
        $efficiency = 0.8; // 80%
        $manpower = 15; // Example value

        $dailyCapacity = $manpower * $workHoursPerDay * $efficiency;
        $daysRequired = ceil($totalStandardTime / $dailyCapacity);

        $startDate = Carbon::parse($project->start_date);
        $endDate = $startDate->addDays($daysRequired);

        return response()->json([
            'total_days' => $daysRequired,
            'end_date' => $endDate->toDateString(),
        ]);
    }

    public function getGanttData()
    {
        $projects = Project::with('tasks')->get();

        $tasks = [];
        foreach ($projects as $project) {
            foreach ($project->tasks as $task) {
                $tasks[] = [
                    'id' => $task->id,
                    'text' => $task->name,
                    'start_date' => $task->start_date,
                    'duration' => $task->standard_time,
                ];
            }
        }

        return response()->json(['data' => $tasks]);
    }
}