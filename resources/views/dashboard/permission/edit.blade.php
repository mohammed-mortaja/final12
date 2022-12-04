@extends('dashboard.master')

@section('title',' الدور')

@section('main-title','تعديل دور')
@section('sub-title','تعديل دور')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">تعديل دور</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                       <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="role_id">تعديل اسم الدور </label>
                                <input type="text" name="role_id" class="form-control"
                                    id="role_id" value="{{$permissions->role_id}}"
                                    placeholder="أدخل اسم الدور  ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="permission_name">تعديل اسم المستخدم </label>
                                <input type="text" name="permission_name" class="form-control"
                                    id="permission_name" value="{{$permissions->permission_name}}"
                                    placeholder="أدخل اسم المستخدم  ">
                            </div>
                         
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="permission_status">تعديل اسم الدور </label>
                                <input type="text" name="permission_status" class="form-control"
                                    id="permission_status" value="{{$permissions->permission_status}}"
                                    placeholder="أدخل اسم الدور  ">
                            </div>
                        </div>

                    

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{$permissions->id}})"
                                    class="btn btn-lg btn-success">تعديل</button>
                              
                                    <a href="{{route('permissions.index')}}" type="submit"
                                    class="btn btn-lg btn-secondary">إلغاء</a>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection

@section('scripts')
    <script>

        function performUpdate(id){
            let formData = new FormData();
            formData.append('role_id',document.getElementById('role_id').value);
            formData.append('permission_name',document.getElementById('permission_name').value);
            formData.append('permission_status',document.getElementById('permission_status').value);
            storeRoute('/cms/admin/permissions_update/'+id , formData);

        }
        </script>
@endsection
