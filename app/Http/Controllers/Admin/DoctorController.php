<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use App\Models\Role;
use App\Http\Requests\Role\RoleFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\DoctorFormRequest;
class DoctorController extends Controller
{

    public function index()
    {
        // $roles = Role::orderBy('id', 'desc')->paginate(2);
        $contentData = Doctor::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.index', compact('contentData'));
    }

    public function create()
    {
        return view('admin.doctor.create');
    }

    public function store(DoctorFormRequest $request)
    {
  

        Doctor::create([
            'name' => $request->name,
            'specialist' => $request->specialist,
            'mobile_number' => $request->mobile_number,
            'keyword' => $request->keyword,
            'schedule_1' => $request->schedule_1,
            'schedule_2' => $request->schedule_2,
            'serial_limit' => $request->serial_limit,

        ]);
        Alert::success('Doctor Created Successfully.');
        return redirect()->route('admin.doctor.index');
    }

    public function edit($id)
    {
        // dd($id);
        $dataItem= Doctor::findOrFail($id);
        return view('admin.doctor.edit', compact('dataItem'));
    }

    public function update(DoctorFormRequest $request, $id)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255|unique:roles',

        // ]);
        $doctor = Doctor::whereId($id)->first();

        $doctor->update([
            'name' => $request->name,
            'specialist' => $request->specialist,
            'mobile_number' => $request->mobile_number,
            'schedule_1' => $request->schedule_1,
            'schedule_2' => $request->schedule_2,
            'keyword' => $request->keyword,
            'serial_limit' => $request->serial_limit,


        ]);
        Alert::success('Doctor Updated Successfully.');
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('admin.doctor.index');
    }
// public function test()
// {
//     return response('Hello World', 200);
// }

public function filter(Request $request)
{
    // $keyword = $request->input('keyword');
    $keyword = 'moin';

    $filteredRecords = Doctor::where('keyword', 'like', '%' . $keyword . '%')->get();

    return response()->json($filteredRecords);
}

}
