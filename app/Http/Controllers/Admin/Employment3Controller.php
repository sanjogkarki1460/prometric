<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Employment3;
use App\Admin\Applicant;
use App\Http\Requests\EmploymentValidator;
use File;

class Employment3Controller extends Controller
{
    protected $employment3 = null;
    protected $applicant = null;

    public function __construct(Employment3 $employment3, Applicant $applicant)
    {
        $this->applicant = $applicant;
        $this->employment3 = $employment3;
    }

    public function index()
    {
        $employment = $this->employment3->get();
        return view('Admin.Applicant.Employment.Employment3.Index')->with('employment', $employment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant = $this->applicant->get();
        return view('Admin.Applicant.Employment.Employment3.Add')->with('applicant', $applicant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploymentValidator $request)
    {
        $data = $request->all();
//        dd($data);
        $this->employment3->fill($data);
        $success = $this->employment3->save();
        if ($request->experience_letter) {
            $first_Name=$this->employment3->Applicant_Employment3->first_name;
            $middel_Name=$this->employment3->Applicant_Employment3->middel_name;
            $last_Name=$this->employment3->Applicant_Employment3->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = 'upload/Employment';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-experience_letter3-" . date('Ymdhid') . rand(0, 99) . "." . $request->experience_letter->getClientOriginalExtension();
            $success = $request->experience_letter->move($path, $file_name);

            if ($success) {
                $data['experience_letter'] = $file_name;
            } else {
                $data['experience_letter'] = null;
            }
            $this->employment3->fill($data);
            $success = $this->employment3->save();
        }
        if ($success) {
            return redirect()->route('Employment3.index')->with('success', 'Applicant Employment detail Added Successfully');
        } else {
            return redirect()->route('Employment3.index')->with('Error', 'Sorry! There is an error adding applicant employment detail list');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employment = $this->employment3->find($id);
        $applicant = $this->applicant->get();
        $app = $employment->Applicant_Employment3->first_name;
        return view('Admin.Applicant.Employment.Employment3.Update')->with('applicant', $applicant)->with('employment', $employment)
            ->with('app', $app);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmploymentValidator $request, $id)
    {
        $employment = $this->employment3->find($id);
        $data = $request->all();
        if ($request->experience_letter) {
            $first_Name=$employment->Applicant_Employment3->first_name;
            $middel_Name=$employment->Applicant_Employment3->middel_name;
            $last_Name=$employment->Applicant_Employment3->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $image_path = 'upload/Employment/' . $employment->experience_letter;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            $path = 'upload/Employment';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-experience_letter3-" . date('Ymdhid') . rand(0, 99) . "." . $request->experience_letter->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->experience_letter->move($path, $file_name);

            if ($success) {
                $data['experience_letter'] = $file_name;
            } else {
                $data['experience_letter'] = null;
            }
        }
        $employment->fill($data);
        $success = $employment->save();
        if ($success) {
            return redirect()->route('Employment3.index')->with('success', 'Employment list updateed successfully');
        } else {
            return redirect()->route('Employment3.index')->with('Error', 'Sorry! there is an arror updating Employment list');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employment = $this->employment3->find($id);
//        dd($employment);
        if (!$employment) {
            return redirect()->route()->with('Error', 'Applicant employment list not found');
        }
        $experience_letter = 'upload/Employment/' . $employment->experience_letter;
//        dd($experience_letter);
        if (File::exists($experience_letter)) {
            $delete = File::delete($experience_letter);
        }
        $success = $employment->delete();
        if ($success) {
            return redirect()->route('Employment3.index')->with('success', 'Applicant Employment Deleted Successfully');
        }
        {
            return redirect()->route('Employment3.index')->with('Error', 'Sorry! There is an error deleting applicant employment list');
        }
    }
}