@section('page-title')
    Speeches
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Speeches</h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.speeches.update', $speech->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="divider divider-info divider-start">
                        <div class="divider-text"> Head Teacher Speech</div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="head_teacher_name" value="{{ $speech->head_teacher_name }}">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="head_teacher_designation" value="{{ $speech->head_teacher_designation }}" required>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Messege</label>
                        <div class="col-sm-10">
                            <textarea
                                class="form-control"
                                placeholder="Head Teacher Speech"
                                id="floatingTextarea2"
                                name="head_teacher_massage"
                                style="height: 100px"
                            >{{ $speech->head_teacher_massage }}</textarea>

                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Picture</label>
                    <div class="col-sm-10">
                        <div class="row match-height">
                            <!-- Employee Task Card -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card card-employee-task">
                                    <div class="card-body">
                                        <div class="employee-task d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row">
                                                <div class="avatar me-75" style="margin-left: -19px;">
                                                    <img
                                                        src="/storage/{{$speech->head_teacher_image }}"
                                                        class="rounded"
                                                        width="60"
                                                        height="50"
                                                        alt="Avatar"
                                                    />
                                                </div>
                                                <div class="my-auto">
                                                    <input type="file" class="form-control"name="head_teacher_image" value="{{ $speech->head_teacher_massage }}" >
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="divider divider-info divider-start" style="margin-top: -10px">
                        <div class="divider-text"> President Speech </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="president_name" value="{{ $speech->president_name }}">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="president_designation" value="{{ $speech->president_designation }}" required>
                        </div>
                    </div>


                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Messege</label>
                        <div class="col-sm-10">
                             <textarea
                                 class="form-control"
                                 placeholder="President Speech"
                                 id="floatingTextarea2"
                                 name="president_massage"
                                 style="height: 100px"
                             >{{ $speech->president_massage }}</textarea>
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Picture</label>
                    <div class="col-sm-10">
                        <div class="row match-height">
                            <!-- Employee Task Card -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card card-employee-task">
                                    <div class="card-body">
                                        <div class="employee-task d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row">
                                                <div class="avatar me-75" style="margin-left: -19px;">
                                                    <img
                                                        src="/storage/{{$speech->president_image }}"
                                                        class="rounded"
                                                        width="60"
                                                        height="50"
                                                        alt="Avatar"
                                                    />
                                                </div>
                                                <div class="my-auto">
                                                    <input type="file" class="form-control"name="president_image" value="{{ $speech->president_image }}" >
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <input type="submit" class="btn btn-gradient-primary" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
