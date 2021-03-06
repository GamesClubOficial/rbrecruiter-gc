@extends('adminlte::page')

@section('title',  config('app.name') . ' | ' . __('Open vacancies'))

@section('content_header')

    @if (Auth::user()->hasAnyRole('admin', 'hiringManager'))
      <h4>{{__('Administration')}} / {{__('Open vacancies')}}</h4>
    @else
      <h4>{{__('Application access denied')}}</h4>
    @endif

@stop

@section('js')

    @if (session()->has('success'))

        <script>
            toastr.success("{{session('success')}}")
        </script>

    @elseif(session()->has('error'))
            <script>
                toastr.error("{{session('error')}}")
            </script>
    @endif

    @if($errors->any())

        @foreach ($errors->all() as $error)
            <script>toastr.error('{{$error}}', '{{__('Validation error!')}}')</script>
        @endforeach

    @endif
@stop

@section('content')
 @if (Auth::user()->hasAnyRole('admin', 'hiringManager'))
    <!-- todo: switch to modal component -->
    <div class="modal fade" tabindex="-1" id="newVacancyForm" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">{{__('New vacancy')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if(!$forms->isEmpty())

                        <form id="savePositionForm" action="{{route('savePosition')}}" method="POST">
                            @csrf
                            <label for="vacancyName">{{__('Vacancy name')}}</label>
                            <input type="text" id="vacancyName" name="vacancyName" class="form-control">

                            <label for="vacancyDescription">{{__('Vacancy description')}}</label>
                            <input type="text" id="vacancyDescription" name="vacancyDescription" class="form-control">

                            <label for="vacancyFullDescription">{{__('Vacancy details')}}</label>
                            <textarea name="vacancyFullDescription" class="form-control" rel="txtTooltip" title="{{__('Add things like admission requirements, rank resposibilities and roles, and anything else you feel is necessary')}}" data-toggle="tooltip" data-placement="bottom"></textarea>
                            <span class="right text-muted"><i class="fab fa-markdown"></i> {{__('Markdown supported')}}</span>
                            <div class="row mt-3">

                                <div class="col">
                                    <label for="pgroup">{{__('Permission group')}}</label>
                                    <input rel="txtTooltip" title="{{__("The permission group from your server/network's permissions manager. Compatible with Luckperms and PEX (This feature is deprecated and will be removed on a future version).")}}" data-toggle="tooltip" data-placement="bottom" type="text" id="pgroup" name="permissionGroup" class="form-control">
                                </div>

                                <div class="col">
                                    <label for="discordrole">{{__('Discord Role ID')}} (*)</label>
                                    <input rel="txtTooltip" title="{{__("Discord Desktop: Go to your Account Settings > Appearance -> Advanced and toggle Developer Mode. On your server's roles tab, right click any role to copy it's ID.")}}" data-toggle="tooltip" data-placement="bottom" type="text" id="discordrole" name="discordRole" class="form-control">
                                </div>

                            </div>

                            <div class="form-group mt-4">

                                <label for="associatedForm">{{__('Application form')}}</label>
                                <select class="custom-select" name="vacancyFormID" id="associatedForm">

                                    <option disabled>{{__('Select a form...')}}</option>
                                    @foreach($forms as $form)

                                        <option value="{{$form->id}}">{{$form->formName}}</option>

                                    @endforeach

                                </select>

                                <label for="vacancyCount">{{__('Free slots')}}</label>
                                <input rel="txtTooltip" title="{{__('The number of free slots decreases each time an applicant is approved for this vacancy.')}}" data-toggle="tooltip" data-placement="bottom" type="text" id="vacancyCount" name="vacancyCount" class="form-control">


                            </div>
                        </form>

                    @else

                        <div class="alert alert-danger">

                            <p>
                                {{__('You cannot create a vacancy without any forms with which people would apply.')}}
                                {{ __('Create a form first, then, create a vacancy.') }}
                                {{ __("A single form is allowed to have multiple vacancies, so you can attach future vacancies to the same form if you'd like.") }}
                            </p>
                        </div>

                    @endif

                </div>
                <div class="modal-footer">

                    @if(!$forms->isEmpty())
                        <button type="button" class="btn btn-primary" onclick="document.getElementById('savePositionForm').submit()">{{__('Add vacancy')}}</button>
                    @endif

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4 offset-md-4 text-center">

            <div class="card">

                <div class="card-body">

                    <button type="button" class="btn btn-primary" onclick="$('#newVacancyForm').modal('show')">{{__('NEW VACANCY')}}</button>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col">

            <div class="card bg-gray-dark">

                <div class="card-header bg-indigo">
                    <div class="card-title"><h4 class="text-bold">{{__('Open vacancies')}}</h4></div>
                </div>

                <div class="card-body">

                    @if(!$vacancies->isEmpty())

                        <table class="table table-active table-borderless" style="white-space: nowrap">

                            <thead>

                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                                <th>{{__('Free slots')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Created at')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>

                            </thead>

                            <tbody>

                            @foreach($vacancies as $vacancy)

                                <tr>
                                    <td>{{$vacancy->vacancyName}}</td>
                                    <td>{{substr($vacancy->vacancyDescription, 0, 20)}}...</td>
                                    <td>{{$vacancy->vacancyCount}}</td>
                                    @if($vacancy->vacancyStatus == 'OPEN')
                                        <td><span class="badge badge-success">{{__('Open')}}</span></td>
                                    @else
                                        <td><span class="badge badge-danger">{{__('Closed')}}</span></td>
                                    @endif
                                    <td>{{$vacancy->created_at}}</td>
                                    <td>

                                        <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='{{ route('editPosition', ['vacancy' => $vacancy->id]) }}'"><i class="fas fa-edit"></i></button>

                                        @if ($vacancy->vacancyStatus == 'OPEN')

                                            <form action="{{route('updatePositionAvailability', ['status' => 'close', 'vacancy' => $vacancy->id])}}" method="POST" id="closePosition" style="display: inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-lock"></i></button>
                                            </form>

                                        @else

                                            <form action="{{route('updatePositionAvailability', ['status' => 'open', 'vacancy' => $vacancy->id])}}" method="POST" id="openPosition" style="display: inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-unlock"></i></button>
                                            </form>

                                        @endif

                                        <form action="{{route('deletePosition', ['vacancy' => $vacancy->id])}}" method="POST" id="{{ 'deleteVacancy' . $vacancy->id  }}" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="$('#deleteVacancyModal').modal('show')"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>
                        <p class="mt-3 text-bold"><i class="fas fa-info-circle"></i> {{ __('Note: If you delete a vacancy, all its applications are also deleted') }}</p>

                    @else

                        <div class="alert alert-warning">
                            <p>{{__('Nothing to see here! Open some vacancies first. This will get applicants pouring in! (hopefully)')}}</p>
                        </div>

                    @endif
                </div>

                <div class="card-footer">

                    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='{{route('showForms')}}'">{{__('MANAGE APPLICATION FORMS')}}</button>

                </div>

            </div>

        </div>

    </div>
 @else
   <x-no-permission type="danger"></x-no-permission>
 @endif
@stop

@section('footer')
    @include('breadcrumbs.dashboard.footer')
@stop
