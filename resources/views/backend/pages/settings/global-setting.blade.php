@section('page-title')
   Global Settings
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Global Setting</h4>

        </div>
        <p><hr/></p>

        <div class="card-body">
            <form action="{{ route('dashboard.settings.update', $global->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Institute Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="full_name" value="{{ $global->full_name }}">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">প্রতিষ্ঠানের পুরো নাম</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="full_name" value="{{ $global->bn_name }}">
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Institute Short Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="short_name" value="{{ $global->short_name }}" required>
                        </div>
                    </div>

                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control"  name="email" value="{{ $global->email }}">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Phone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control"name="phone" value="{{ $global->phone }}" >
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"name="address" value="{{ $global->address }}" >
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Icon</label>
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
                                                            src="/storage/{{$global->icon}}"
                                                            class="rounded"
                                                            width="60"
                                                            height="50"
                                                            alt="Avatar"
                                                        />
                                                    </div>
                                                    <div class="my-auto">
                                                        <input type="file" class="form-control"name="icon" value="{{ $global->icon }}" >
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mb-1 row" style="margin-top:-50px; ">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Logo</label>
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
                                                            src="/storage/{{$global->logo}}"
                                                            class="rounded"
                                                            width="60"
                                                            height="50"
                                                            alt="Avatar"
                                                        />
                                                    </div>
                                                    <div class="my-auto">
                                                        <input type="file" class="form-control"name="logo" value="{{ $global->logo }}" >
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="divider divider-info divider-start" style="margin-top: -50px">
                        <div class="divider-text"> Social Media </div>
                    </div>

                    <div class="mb-1 row" style="margin-top: -20px;">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"name="facebook" value="{{ $global->facebook }}" >
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-sm-2 col-form-label" style="font-size: medium">Youtube</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"name="youtube" value="{{ $global->youtube }}" >
                        </div>
                    </div>

                    <div class="divider divider-info divider-start" style="margin-top: 0px">
                        <div class="divider-text"> Front End Theme </div>
                    </div>

                    <div class="demo-inline-spacing">
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"

                                type="radio"
                                name="theme"
                                id="inlineRadio1"
                                value="1"
                                @if($global->theme == 1) checked @endif

                            />
                            <label class="form-check-label" for="inlineRadio1">Theme 1</label><br> <br>
                            <div class="avatar me-75" style="margin-left: -19px;">
                                <img
                                    src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/portrait/small/avatar-s-9.jpg"
                                    class="rounded"
                                    width="150"
                                    height="150"
                                    alt="Avatar"
                                />
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                @if($global->theme == 2) checked @endif
                                type="radio"
                                name="theme"
                                id="inlineRadio2"
                                value="2"
                            />
                            <label class="form-check-label" for="inlineRadio2">Theme 2</label><br> <br>
                            <div class="avatar me-75" style="margin-left: -19px;">
                                <img
                                    src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/portrait/small/avatar-s-9.jpg"
                                    class="rounded"
                                    width="150"
                                    height="150"
                                    alt="Avatar"
                                />
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                @if($global->theme == 3) checked @endif
                                type="radio"
                                name="theme"
                                id="inlineRadio3"
                                value="3"
                            />
                            <label class="form-check-label" for="inlineRadio3">Theme 3</label><br><br>
                            <div class="avatar me-75" style="margin-left: -19px;">
                                <img
                                    src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/portrait/small/avatar-s-9.jpg"
                                    class="rounded"
                                    width="150"
                                    height="150"
                                    alt="Avatar"
                                />
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                @if($global->theme == 4) checked @endif
                                type="radio"
                                name="theme"
                                id="inlineRadio4"
                                value="4"
                            />
                            <label class="form-check-label" for="inlineRadio4">Theme 4</label><br><br>
                            <div class="avatar me-75" style="margin-left: -19px;">
                                <img
                                    src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/portrait/small/avatar-s-9.jpg"
                                    class="rounded"
                                    width="150"
                                    height="150"
                                    alt="Avatar"
                                />
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
