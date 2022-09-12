@section('page-title')
    Translates
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Translates</h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.translates.update', $translate->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    {{--                    End Of Menu--}}
                    <div class="divider divider-info divider-start">
                        <div class="divider-text"> Head Teacher Speech</div>
                    </div>
                <div class="col-md-12">

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">About Us</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="about_us" value="{{ $translate->about_us }}">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="head_teacher_designation" value="{{ $translate->key }}" >
                        </div>
                    </div>
                </div>
{{--                    End Of Menu--}}
                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
