<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>trang chu</title>
@endsection
@section('css')
    <link href= "{{asset('admins/role/add/add.css')}}" rel="stylesheet" />
@section('js')
    <script src = "{{asset('admins/role/add/add.js')}}"></script>
@endsection
@section('content')

    <div class="content-wrapper">

        @include('partials.content-header',['name'=>'Roles', 'key'=> 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-12">

                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       class="form-control "
                                       name="name"
                                       placeholder="nhập tên vai trò "
                                       value="{{old('name')}}">

                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea
                                    class="form-control "
                                    name="display_name" rows="4">{{old('display_name')}}</textarea>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        checkall
                                    </label>
                                </div>
                                @foreach($permissionsParent as $permissionsParentItem)
                                    <div class="card border-primary mb-3  col-md-12">
                                        <div class="card-header">
                                            <label >
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            Module {{$permissionsParentItem->name}}
                                        </div>
                                        <div class="row">
                                            @foreach($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label for="">
                                                            <input type="checkbox" name="permission_id[]"
                                                                   class="checkox_childrent"
                                                                    value="{{$permissionsChildrentItem->id}}">
                                                        </label>
                                                        {{$permissionsChildrentItem->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection


