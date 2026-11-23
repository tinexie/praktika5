<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Status;

class ReportController extends Controller
{
   
    
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => 'exists:statuses,id'
        ]);

        if ($validate) {
            $reports = Report::where('status_id', $status)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        } else {
            $reports = Report::orderBy('created_at', $sort)
                ->paginate(8);
        }

        $statuses = Status::all();
        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('reports.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'description' => 'required',
        ]);
        Report::create($request->only('number', 'description'));
        return redirect()->route('reports.index');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required',
            'description' => 'required',
        ]);
        $report = Report::findOrFail($id);
        $report->update($request->only('number', 'description'));
        return redirect()->route('reports.index');
    }

}
