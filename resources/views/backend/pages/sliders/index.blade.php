@section('page-title')
    Sliders
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <!-- Add Role Modal -->
    <div class="content-body">
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end justify-content-center h-100">
                            <img src="../../../app-assets/images/illustration/faq-illustrations.svg" class="img-fluid mt-2" alt="Image" width="85">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal" class="stretched-link text-nowrap add-new-role">
                                <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">Add New Slider</span>
                            </a>
                            <p class="mb-0">Add Slider, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- Role cards -->
        <div class="card" style="padding-top: 10px;">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-no-wrap" width="10%">SL</th>
                    <th class="whitespace-no-wrap">SLIDER TITLE</th>
                    <th class="whitespace-no-wrap">PICTURE</th>


                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach ($sliders as $slider)
                    <tr class="intro-x">

                        <td>
                            <span href="" class="font-medium whitespace-no-wrap">{{ $i++ }}</span>

                        </td>
                        <td>

                            {{ $slider->title }}
                            {{--                            <img alt="Cover Image" src="/storage/{{$notice->notice_file}}" class="w-10 h-10 rounded-full">--}}


                        </td>
                        <td>
                            <img alt="Cover Image" src="/storage/{{$slider->slider}}" class="w-10 h-10 rounded-full" style="height: 100px;width: 350px">

                        </td>


                        <td style="text-align: center">
                            <div class="flex justify-center items-center" >

                                <a class="flex items-center text-theme-6" href="{{ route('dashboard.sliders.destroy', $slider->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $slider->id }}').submit()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </a>
                                <form id="delete-form-{{$slider->id}}" action="{{ route('dashboard.sliders.destroy', $slider->id) }}" method="POST" style="display: none">
                                    @method('DELETE')
                                    @csrf
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--/ Role cards -->

        <!-- table -->
        <!-- Add Role Modal -->
        <div class="modal fade" id="addRoleModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5 pb-5">
                        <div class="text-center mb-4">
                            <h3 class="role-title">Add New Slider</h3>
                            <p></p>
                        </div>
                        <!-- Add role form -->

                        <form action="{{ route('dashboard.sliders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-1 row">
                                <label class="col-sm-2 col-form-label" style="font-size: medium">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Title" name="title">
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label class="col-sm-2 col-form-label" style="font-size: medium">Picture</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" placeholder="Admin Name" name="slider">
                                </div>
                            </div>

                            <div class="col-12 text-center mt-2">
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal" aria-label="Close">
                                    Discard
                                </button>
                            </div>
                        </form>
                        <!--/ Add role form -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ Add Role Modal -->

    </div>



@endsection
