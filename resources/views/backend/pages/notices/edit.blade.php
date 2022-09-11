@section('page-title')
    Edit Notice
@endsection


@extends('backend.layouts.main')

@section('admin-section')
@include('backend.layouts.partials.alerts')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Notice </h4>

    </div>
    <p><hr/></p>

    <div class="card-body">
        <form action="{{ route('dashboard.notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="" name="name" value=" {{ $notice->title }}">
                    </div>
                </div>
                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Description</label>
                    <div class="col-sm-10">

                                    <textarea
                                        class="form-control"
                                        placeholder="President Speech"
                                        id="floatingTextarea2"
                                        name="description"
                                        style="height: 100px"
                                    >{{$notice->description}}</textarea>
                    </div>
                </div>

                 <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Document File</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" placeholder="" name="notice_file" value="{{ $notice->notice_file }}">
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
