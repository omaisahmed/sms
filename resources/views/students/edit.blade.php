<x-app-layout>

    <!-- Start right Content here -->
    
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
    
                    @include('partials.navigation')

                    <div class="page-content-wrapper ">

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/students">Students</a></li>
                        <li class="breadcrumb-item active">Edit Students</li>
                    </ol>
                </div>
                
                  <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
                </div>
                <h4 class="page-title mt-3">Edit Student</h4>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                   <form method="POST" action="{{ route('students.update',$student->id) }}">
                   @method("PUT")
                   @csrf
                   {{ method_field("PUT") }}
                        <div class="form-group mb-0">
                            <label class="mb-2 pb-1">Name</label>
                            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required placeholder="Name"/>
                        </div>

                       

                        <div class="form-group mb-0">
                            <label class="my-2 py-1">E-Mail</label>
                            <div>
                                <input type="email" class="form-control" name="email" value="{{ $student->email }}"  required
                                        parsley-type="email" placeholder="Enter a valid e-mail"/>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="my-2 py-1">Role</label>
                            <div>
                            <select name="role" class="select2 form-control mb-3 custom-select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option selected value="{{ $student->role }}">{{ $student->role }}</option>
                                                <option name="admin">Admin</option>
                                                <option name="student">Student</option>
                                                <option name="teacher">Teacher</option>                   
                            </select>
                            </div>
                        </div>
                       
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset"  class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->

        
    </div> <!-- end row -->                              

</div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->


                @include('partials.footer')

            </div>
            <!-- End Right content here -->
          
</x-app-layout>