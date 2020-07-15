<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use ContextAwareValidator;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::all();
        $this->authorize('viewAny', Form::class);

        return view('dashboard.administration.forms')
            ->with('forms', $forms);
    }

    public function showFormBuilder()
    {
        $this->authorize('viewFormbuilder', Form::class);
        return view('dashboard.administration.formbuilder');
    }

    public function saveForm(Request $request)
    {

        $this->authorize('create', Form::class);
        $fields = $request->all();

        $contextValidation = ContextAwareValidator::getValidator($fields, true, true);

        if (!$contextValidation->get('validator')->fails())
        {
            $storableFormStructure = $contextValidation->get('structure');

            Form::create(
                [
                    'formName' => $fields['formName'],
                    'formStructure' => $storableFormStructure,
                    'formStatus' => 'ACTIVE'
                ]
            );

            $request->session()->flash('success', 'Form created! You can now link this form to a vacancy.');
            return redirect()->to(route('showForms'));
        }

        $request->session()->flash('errors', $contextValidation->get('validator')->errors()->getMessages());
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {

        $form = Form::find($id);
        $this->authorize('delete', $form);
        $deletable = true;


        if (!is_null($form) && !is_null($form->vacancies) && $form->vacancies->count() !== 0 || !is_null($form->responses))
        {
           $deletable = false;
        }

        if ($deletable)
        {
          $form->delete();

          $request->session()->flash('success', 'Form deleted successfully.');
        }
        else
        {
          $request->session()->flash('error', 'You cannot delete this form because it\'s tied to one or more applications and ranks, or because it doesn\'t exist.');
        }

        return redirect()->back();

    }

    public function preview(Request $request, Form $form)
    {
        return view('dashboard.administration.formpreview')
          ->with('form', json_decode($form->formStructure, true))
          ->with('title', $form->formName)
          ->with('formID', $form->id);
    }

    public function edit(Request $request, Form $form)
    {
       return view('dashboard.administration.editform')
        ->with('formStructure', json_decode($form->formStructure, true))
        ->with('title', $form->formName)
        ->with('formID', $form->id);
    }

    public function update(Request $request, Form $form)
    {
      $contextValidation = ContextAwareValidator::getValidator($request->all(), true);
      $this->authorize('update', $form);


      if (!$contextValidation->get('validator')->fails())
      {
          // Add the new structure into the form. New, subsquent fields will be identified by the "new" prefix
          // This prefix doesn't actually change the app's behavior when it receives applications.
          // Additionally, old applications won't of course display new and updated fields, because we can't travel into the past and get data for them
          $form->formStructure = $contextValidation->get('structure');
          $form->save();

          $request->session()->flash('success', 'Hooray! Your form was updated. New applications for it\'s vacancy will use it.');
      }
      else
      {
        $request->session()->flash('errors', $contextValidation->get('validator')->errors()->getMessages());
      }

      return redirect()->to(route('previewForm', ['form' => $form->id]));

    }

}
