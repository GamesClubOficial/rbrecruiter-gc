@extends('adminlte::page')

@section('title', config('app.name') . ' | ' . __('Applications'))

@section('content_header')

    <h4>{{__('My account')}} / {{__('Applications')}}</h4>

@stop

@section('js')

    <x-global-errors></x-global-errors>

@stop

@section('content')

    <div class="row">

        <div class="col">
            <div class="callout callout-warning">
                <h5>{{__('Application Process')}}</h5>

                <p>{{__('Please allow up to three days for your application to be processed. Your application will be reviewed by every team member, and will move up in stages.')}}</p>
                <p>{{__("If an interview is scheduled, you'll need to open your application here and confirm the time, date, and location assigned for you.")}}</p>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('My Ongoing Applications')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0"> <!-- move to dedi css -->

                    @if (!$applications->isEmpty())

                        <table class="table" style="white-space: nowrap">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{__('Applicant')}}</th>
                                <th>{{__('Application Date')}}</th>
                                <th>{{__('Last updated')}}</th>
                                <th style="width: 40px">{{__('Status')}}</th>
                                <th style="width: 40px">{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($applications as $application)

                                <tr>
                                    <td>{{$application->id}}</td>
                                    <td>{{Auth::user()->name}}</td>
                                    <td>{{$application->created_at}}</td>
                                    <td>{{$application->updated_at}}</td>
                                    <td>
                                        @switch($application->applicationStatus)

                                            @case('STAGE_SUBMITTED')
                                            <span class="badge badge-success"><i class="fas fa-paper-plane"></i> {{__('Submitted')}}</span>
                                            @break

                                            @case('STAGE_PEERAPPROVAL')
                                            <span class="badge badge-warning"><i class="fas fa-users"></i> {{__('Peer Approval')}}</span>
                                            @break

                                            @case('STAGE_INTERVIEW')
                                            <span class="badge badge-info"><i class="fa fa-microphone-alt"></i> {{__('Interview')}}</span>
                                            @break

                                            @case('STAGE_INTERVIEW_SCHEDULED')
                                            <span class="badge badge-warning"><i class="fa fa-clock"></i> {{__('Interview Scheduled')}}</span>
                                            @break

                                            @case('APPROVED')
                                            <span class="badge badge-success"><i class="fa fa-check-double"></i> {{__('Approved')}}</span>
                                            @break

                                            @case('DENIED')
                                            <span class="badge badge-danger"><i class="fa fa-ban"></i> <b>{{__('Denied')}}</b></span>
                                            @break

                                            @default
                                            <span class="badge badge-danger"><i class="fa fa-question"></i> {{__('Unknown')}}</span>
                                        @endswitch
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-success" onclick="window.location.href='{{route('showUserApp', ['application' => $application->id])}}'"><i class="fa fa-eye"></i> {{__('View')}}</button>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    @else

                        <div class="alert alert-warning">
                            <p><i class="fa fa-info-circle"></i> <b>{{__('Nothing to show')}}</b></p>
                            <p>{{__("You currently have no applications to display. If you're eligible, you may apply once every month.")}}</p>
                        </div>

                    @endif
                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                    <button type="button" class="btn btn-default mr-2" onclick="window.location.href='{{route('dashboard')}}'">{{__('Go back')}}</button>

                </div>
            </div>

        </div>

    </div>

@stop
@section('footer')
    @include('breadcrumbs.dashboard.footer')
@stop
