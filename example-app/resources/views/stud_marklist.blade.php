@extends('layout.app')

@section('content')
    <div class="container">
    
    @if(Session::has('success_msg'))
        <div class="alert alert-success" style="margin-top: 20px;">{{ Session::get('success_msg') }}</div>
        @endif 
        <?php if(count($student) > 0){ ?>
        <div class="cls_btn_stud_create">
            <a href="{{ route('student.addMarkList') }}"><button class="btn"><i class="fa fa-plus"></i> Create MarkList</button></a>
        </div> 
        <?php } ?>
        <div class="cls_btn_stud_create" style="margin-right:9px">
            <a href="{{ route('student.index') }}"><button class="btn"><i class="fa fa-backward" aria-hidden="true"></i> Back to student list</button></a>
        </div>
        <h2 style="margin-top: 40px;">Student Mangement System</h2> 
        <?php if(count($student) == 0){ ?>
        <span class="imp_css"> Note  : Student details not found ..please create student details first</span>
        <?php } ?>
        <h3 style="margin-top: 70px;">Student Marklist</h3>      
        <table class="table" style="margin-top: 40px;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Maths</th>
                <th>Science</th>
                <th>History</th>
                <th>Term</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($student_marks) && count($student_marks) > 0){ $i = 1; ?>
                @foreach($student_marks as $stud)
                <?php $total = $stud->maths +$stud->science +$stud->history; ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$stud->stud}}</td>
                        <td>{{$stud->maths}}</td>
                        <td>{{$stud->science}}</td>
                        <td>{{$stud->history}}</td>
                        <td><?php if($stud->term == 1){ echo 'One';}elseif($stud->term == 2){ echo 'Two';}else{ echo 'Three';} ?></td>
                        <td>{{$total}}</td>
                        <td><a href="{{ route('student.marklist.edit', $stud->id) }}" type="button" class="btn btn-primary">Edit</a> <a href="{{ route('student.marklist.delete', $stud->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
                    </tr>
                @endforeach
            <?php } else{ ?>
                <tr>
                <td colspan="7" style="text-align: center;font-size: 16px;">
                No mark details found
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    @endsection
