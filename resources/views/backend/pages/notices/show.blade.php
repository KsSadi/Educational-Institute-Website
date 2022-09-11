@section('page-title')
   Notice - {{ $notice->title }}
@endsection


@extends('backend.layouts.main')

@section('admin-section')

    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Notice Details </h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">

                    <tbody>

                    <tr>
                        <td>Notice Title</td>

                        <th>{{ $notice->title }}</th>
                    </tr>
                    <tr>
                        <td> Description</td>

                        <td>{{ $notice->description }}</td>
                    </tr>
                    <tr>
                        <td> File</td>

                        <td><a href="/storage/{{$notice->notice_file }}">Download</a> </td>
                    </tr>

                    <tr>
                        <td> Date </td>

                        <th>{{ $notice->date }}</th>
                    </tr>

                    </tbody>
                </table>
            </div>


    </div>
    </div>

@endsection
