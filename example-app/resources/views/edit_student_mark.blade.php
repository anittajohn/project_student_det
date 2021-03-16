@extends('layout.app')

@section('content')
<style>
    
</style>
    <div class="container">
        <div class="cls_btn_stud_create">
            <a href="{{ route('student.marklist') }}"><button class="btn"><i class="fa fa-backward" aria-hidden="true"></i> Back</button></a>
        </div>
        <h2 style="margin-top: 40px;">Student Mangement System</h2> 
        <h3 style="margin-top: 70px;margin-bottom: 40px;">Edit Student Marklist</h3>  
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif                
        <form action="{{ route('student.marklist.update', $student_marks->id) }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleFormControlSelect2">Select Student <span class="imp_css">*</span></label>
                <select class="form-control" id="student_name" name="student_name">
                <option value="">(--Select--)</option>
                <?php if(!empty($student)){ ?>
                    @foreach($student as $stud)
                         <option <?php echo ($stud->id == $student_marks->student_name)?'selected="selected"':''; ?>  value="{{$stud->id}}">{{$stud->student_name}}</option>
                    @endforeach
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Term <span class="imp_css">*</span></label>
                <select class="form-control" id="term" name="term">
                <option value="">(--Select--)</option>
                <option <?php echo ($student_marks->term == 1)?'selected="selected"':''; ?>  value="1">One</option>
                <option <?php echo ($student_marks->term == 2)?'selected="selected"':''; ?> value="2">Two</option>
                <option <?php echo ($student_marks->term == 3)?'selected="selected"':''; ?> value="3">Three</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Subject <span class="imp_css">*</span></label>
                <div class="form-group row">
                <div class="col-xs-3">
                    <label for="ex1">Maths</label>
                    <input class="form-control" id="maths" name="maths" type="text" value="<?php echo $student_marks->maths; ?>">
                </div>
                <div class="col-xs-3">
                    <label for="ex2">Science</label>
                    <input class="form-control" id="science"  name="science" type="text"  value="<?php echo $student_marks->science; ?>">
                </div>
                <div class="col-xs-3">
                    <label for="ex3">History</label>
                    <input class="form-control" id="history" name="history" type="text" value="<?php echo $student_marks->history; ?>">
                </div>
                </div>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </form>
    </div>
