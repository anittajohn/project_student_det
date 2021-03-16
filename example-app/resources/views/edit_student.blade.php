@extends('layout.app')

@section('content')
<style>
    
</style>
    <div class="container">
        <div class="cls_btn_stud_create">
            <a href="{{ route('student.index') }}"><button class="btn"><i class="fa fa-backward" aria-hidden="true"></i> Back</button></a>
        </div>
        <h2 style="margin-top: 40px;">Student Mangement System</h2> 
        <h3 style="margin-top: 70px;margin-bottom: 40px;">Update Student Details</h3>  
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif                
        <form action="{{ route('student.update', $student->id) }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlInput1">Name <span class="imp_css">*</span></label>
                <input type="text" class="form-control" value="{{ $student->student_name }}" name="student_name" id="student_name" placeholder="student name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Age <span class="imp_css">*</span></label>
                <input type="number" class="form-control" value="{{ $student->student_age }}"  id="student_age" name="student_age" placeholder="student age">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Gender <span class="imp_css">*</span></label>
                <div class="form-check">
                    <input class="form-check-input" value="male" type="radio" name="gender" id="flexRadioDefault1" <?php echo ($student->gender == 'male')?'checked':''; ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                       Male
                    </label>
                    <input class="form-check-input" value="female" type="radio" name="gender" id="flexRadioDefault2" <?php echo ($student->gender == 'female')?'checked':''; ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                    </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Reporting Teacher <span class="imp_css">*</span></label>
                <select class="form-control" id="reporting_teacher" name="reporting_teacher">
                <option value="">(--Select--)</option>
                <option <?php echo ($student->reporting_teacher == 'Katie')?'selected="selected"':''; ?> value="Katie">Katie</option>
                <option <?php echo ($student->reporting_teacher == 'Max')?'selected="selected"':''; ?> value="Max">Max</option>
                <option <?php echo ($student->reporting_teacher == 'John')?'selected="selected"':''; ?> value="John">John</option>
                <option <?php echo ($student->reporting_teacher == 'Sam')?'selected="selected"':''; ?> value="Sam">Sam</option>
                </select>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
