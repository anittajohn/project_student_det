@extends('layout.app')

@section('content')
    <div class="container">
    @if(Session::has('success_msg'))
        <div class="alert alert-success" style="margin-top: 20px;">{{ Session::get('success_msg') }}</div>
        @endif 
        <div class="cls_btn_stud_create" style="margin-left: 5px;">
            <a href="{{ route('student.marklist') }}"><button class="btn"><i class="fa fa-plus"></i> Students Mark List</button></a>
        </div>
        <div class="cls_btn_stud_create">
            <a href="{{ route('student.add') }}"><button class="btn"><i class="fa fa-plus"></i> Create Student</button></a>
        </div> 
        
        <h2 style="margin-top: 40px;">Student Mangement System</h2> 
        <h3 style="margin-top: 70px;">Student Details</h3>   
        <table class="table" style="margin-top: 50px;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Reporting Teacher</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($student) && count($student) > 0){ $i = 1; ?>
                @foreach($student as $stud)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$stud->student_name}}</td>
                        <td>{{$stud->student_age}}</td>
                        <td><?php echo ($stud->gender == 'male')?'M':'F'; ?></td>
                        <td>{{$stud->reporting_teacher}}</td>
                        <td><a href="{{ route('student.edit', $stud->id) }}" type="button" class="btn btn-primary">Edit</a> <a href="{{ route('student.delete', $stud->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
                    </tr>
                @endforeach
            <?php } else{ ?>
                <tr>
                <td colspan="7" style="text-align: center;font-size: 16px;">
                No details found
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    @endsection
