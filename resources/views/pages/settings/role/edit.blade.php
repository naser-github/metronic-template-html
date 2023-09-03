@extends('layouts.master')

@section('roles.index')
    active
@stop

@section('breadcrumb_navigation_title')
    Edit Role
@endsection

@section('breadcrumb_navigation_path')
    @include('partials.breadcrumb-navigation', [
        'breadcrumbs'=>[
            ['name'=> 'Role Management', 'url' => 'roles.index'],
            ['name'=> 'Edit', 'url' => 'roles.edit', 'param' => $role->id],
        ]
    ])
@endsection

@section('page_content')
    <div class="card">
        <!--begin::Card header-->
        @include('components.back_button')
        <!--begin::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <form role="form" method="POST" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('Patch')

                <div class="row mt-4">

                    <input type="hidden" name="id" value="{{ $role->id }}">

                    {{--Name--}}
                    <div class="col-sm-12 mb-6">
                        <label for="name" class="required form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                               placeholder="Name" required
                               value="{{ $role->name }}"
                        />
                        @error('name')
                        <span class="text-danger m-0 p-0" role="alert">
                            {{$errors->first('name')}}
                        </span>
                        @enderror
                    </div>

                    <div class="col-sm-12 mt-4">
                        <label for="permissions" class="required form-label mb-6">Permissions</label>

                        <div class="row">
                            @foreach($permissions as $permission)
                                <div class="col-sm-2 col-md-4 col-xl-3 mb-6">
                                    <div class="form-check form-check-custom">
                                        <input id="{{$permission->id}}" name="permissions[]" type="checkbox"
                                               class="form-check-input" value="{{$permission->id}}"
                                               @foreach($role->permissions as $assignedPermission)
                                                   @if($assignedPermission->id===$permission->id)checked @endif
                                            @endforeach
                                        />
                                        <label class="form-check-label" for="{{$permission->id}}">
                                            <span class="text-dark">{{$permission->name}}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-end">
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
        <!--end::Card body-->
    </div>
@endsection
