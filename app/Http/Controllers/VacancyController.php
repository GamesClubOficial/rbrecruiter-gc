<?php

namespace App\Http\Controllers;

use App\Form;
use App\Http\Requests\VacancyRequest;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
    public function index()
    {
        return view('dashboard.administration.positions')
            ->with([
                'forms' => Form::all(),
                'vacancies' => Vacancy::all()
            ]);
    }

    public function store(VacancyRequest $request)
    {
        $form = Form::find($request->vacancyFormID);

        if (!is_null($form))
        {
            Vacancy::create([

                'vacancyName' => $request->vacancyName,
                'vacancyDescription' => $request->vacancyDescription,
                'vacancySlug' => Str::slug($request->vacancyName),
                'permissionGroupName' => $request->permissionGroup,
                'discordRoleID' => $request->discordRole,
                'vacancyFormID' => $request->vacancyFormID,
                'vacancyCount' => $request->vacancyCount

            ]);

            $request->session()->flash('success', 'Vacancy successfully opened. It will now show in the home page.');
        }
        else
        {
            $request->session()->flash('error', 'You cannot create a vacancy without a valid form.');
        }

        return redirect()->back();

    }

    public function updatePositionAvailability(Request $request, $status, $id)
    {
        $vacancy = Vacancy::find($id);

        if (!is_null($vacancy))
        {
            $type = 'success';

            switch ($status)
            {
                case 'open':
                    $vacancy->open();
                    $message = "Position successfully opened!";

                    break;

                case 'close':
                    $vacancy->close();
                    $message = "Position successfully closed!";

                    break;

                default:
                    $message = "Please do not tamper with the button's URLs. To report a bug, please contact an administrator.";
                    $type = 'error';

            }
        }
        else
        {
            $message = "The position you're trying to update doesn't exist!";
            $type = "error";
        }

        $request->session()->flash($type, $message);
        return redirect()->back();
    }

}