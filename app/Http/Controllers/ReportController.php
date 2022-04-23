<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function get(Report $report) {
        return response()->json(['report' => $report]);
    }

    public function getReports() {
        $reports = Report::all();

        return response()->json(['reports' => $reports]);
    }

    public function create(Request $data) {
        $report = Report::create([
            'name' => $data->name
        ]);

        return response()->json(['success' => true, 'report' => $report]);
    }

    public function delete(Report $report) {

        $report = Report::find($report->id);
        $report->delete();
        return response()->json(['success' => true, 'report' => $report]);
    }

    public function update(Request $request, Report $report) {
        $newReport = Report::find($report->id);
        $newReport->name = $request->name;
        $newReport->save();
    }
}
