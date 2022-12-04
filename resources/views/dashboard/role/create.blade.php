@extends('dashboard.master')

@section('title','الادوار')





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
                        <h3 class="card-title">انشاء دور</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                       <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="role_name">الاسم الوظيفي </label>
                                    <input type="text" name="name" class="form-control"
                                        id="role_name" placeholder="أدخل الاسم الوظيفي  ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="user_name">اسم المستخدم </label>
                                    <input type="text" name="user_name" class="form-control"
                                        id="user_name" placeholder="أدخل اسم المستخدم  ">
                                </div>

                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performStore()"
                                    class="btn btn-lg btn-success">حفظ</button>

                                    <a href="{{route('roles.index')}}" type="submit"
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
        function performStore(){
            let formData = new FormData();
            formData.append('role_name',document.getElementById('role_name').value);
            formData.append('user_name',document.getElementById('user_name').value);
            store('/cms/admin/roles' ,formData );

        }
        </script>
@endsection