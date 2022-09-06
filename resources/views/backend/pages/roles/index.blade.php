@section('page-title')
    Roles Control
@endsection


@extends('backend.layouts.main')

@section('admin-section')
    @include('backend.layouts.partials.alerts')
    <a href="{{ route('dashboard.roles.create') }}" style="max-width: 180px" class="btn btn-primary waves-effect waves-float waves-light"> <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>New Role </a>
    <div style="padding-bottom: 15px;"></div>
    <div class="card" style="padding-top: 10px;">


        <table class="table table-report -mt-2">
            <thead style="background: #3F729B">
            <tr style="">
                <th class="whitespace-no-wrap" width="10%"></th>
                <th class="whitespace-no-wrap">NAME</th>
                <th class="text-center whitespace-no-wrap">PERMISSIONS</th>
                <th class="text-center whitespace-no-wrap">ACTIONS</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($roles as $role)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>

                        </div>
                    </td>
                    <td>

                        <span class="badge badge bg-info">{{ $role->name }}</span>
{{--                        <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $role->guard_name }}</div>--}}
                    </td>

                    <td class="text-center">
                        @foreach ($role->permissions as $one_permission)
                            <span class="badge rounded-pill badge-light-primary">{{$one_permission->name}}</span>
                        @endforeach
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">

                             <a class="flex items-center mr-3" href="{{ route('dashboard.roles.edit', $role->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-2 text-body"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>

                            <a class="flex items-center text-theme-6" href="{{ route('dashboard.roles.destroy', $role->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-medium-2 text-body"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </a>
                            <form id="delete-form-{{$role->id}}" action="{{ route('dashboard.roles.destroy', $role->id) }}" method="POST" style="display: none">
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
@endsection
