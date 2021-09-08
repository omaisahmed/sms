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
                                                <li class="breadcrumb-item active"><a href="/students">Students</a></li>
                                                
                                            </ol>
                                        </div>
                                        
                                        <div class="pull-left">
                                          <a class="btn btn-primary" href="{{ route('students.create') }}"><i class="fa fa-plus"> Add Student</i></a>
                                         </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
            
                                        @if ($message = Session::get('success'))
                                          <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                          </div>
                                        @endif

                                            <table class="table" id="my-table">
                                                <thead>
                                                    <tr>
                                                    <th class="Bold">No</th>
                                                    <th class="Bold">Name</th>
                                                    <th class="Bold">Email</th>
                                                    <th class="Bold">Role</th>
                                                    <th class="Bold">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->email}}</td>
                                                        <td>{{ $student->role }}</td>
                                                        <td><form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                                          <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            @endforeach
                                                   
                                                </tbody>
                                            </table>

                                            {{ $students->links() }}

                                          
            
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