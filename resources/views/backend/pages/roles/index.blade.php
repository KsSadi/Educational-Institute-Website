@section('page-title')
    Roles Control
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
                                <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">Add New Role</span>
                            </a>
                            <p class="mb-0">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- Role cards -->
        <div class="row">
            @foreach ($roles as $role)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span>Total 4 users</span>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Vinnie Mostowy">
                                        <img class="rounded-circle" src="../../../app-assets/images/avatars/2.png" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Allen Rieske">
                                        <img class="rounded-circle" src="../../../app-assets/images/avatars/12.png" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Julee Rossignol">
                                        <img class="rounded-circle" src="../../../app-assets/images/avatars/6.png" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Kaith D'souza">
                                        <img class="rounded-circle" src="../../../app-assets/images/avatars/11.png" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mt-1 pt-25">

                                <div class="role-heading">
                                    <h4 class="fw-bolder">{{ $role->name }}</h4>

{{--                                    <a href="javascript:;" class="role-edit-modal" data-id="{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#addRoleModal">--}}
{{--                                        <small class="fw-bolder">Edit Role</small>--}}
{{--                                    </a> --}}
                                    <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="role-edit-modal" data-id="{{ $role->id }}">
                                        <small class="fw-bolder">Edit Role</small>
                                    </a>
                                </div>

                                <a class="flex items-center text-theme-6" href="{{ route('dashboard.roles.destroy', $role->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                </a>
                                <form id="delete-form-{{$role->id}}" action="{{ route('dashboard.roles.destroy', $role->id) }}" method="POST" style="display: none">
                                    @method('DELETE')
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            @endforeach


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
                            <h3 class="role-title">Add New Role</h3>
                            <p>Set role permissions</p>
                        </div>
                        <!-- Add role form -->

                        <form action="{{ route('dashboard.roles.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label class="form-label" for="modalRoleName"><strong>Role Name</strong></label>
                                <input type="text" id="modalRoleName" class="form-control" placeholder="Enter role name" tabindex="-1" data-msg="Please enter role name" name="name">
                            </div>

                            <div class="flex flex-col sm:flex-row items-center" style="display: none">
                                <label class="w-full sm:w-20 sm:text-right sm:mr-5">Guard Name</label>
                                <div class="mt-2">

                                    <input type="text" class="form-control" value="admin"  placeholder="Admin" name="guard"/>

                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="mt-2 pt-50">Role Permissions</h4>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-bolder">
                                                Administrator Access
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Allows a full access to the system">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                      </span>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="select-all">
                                                    <label class="form-check-label" name="select-all" for="select-all" id="select-all"> Select All </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($permissions as $item)
                                            <tr>
                                                <td class="text-nowrap fw-bolder">{{ $item->name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="form-check me-3 me-lg-5">
                                                            <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="permissions[]" id="permission-{{ $loop->index }}">
                                                            <label class="form-check-label" for="permission-{{ $loop->index }}"> Select </label>
                                                        </div>


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
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

    <script>

        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>

@endsection
