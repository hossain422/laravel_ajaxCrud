<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  </head>
  <body>
    <div class="container">
       <h1>Laravel Ajax CRUD</h1>
    <div class="card">
      <div class="card-header">
       
      <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add_student" href="">Insert Student</a>
      <input type="search" id="search" name="search" class="form-control float-end mt-2" placeholder="search...">
      </div>
      <div class="card-body" id="pagination">
         <table class="table bordered table-striped">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Roll</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Class</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        @php $i=1; @endphp
        @foreach($students as $student)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->roll}}</td>
          <td>{{$student->email}}</td>
          <td>{{$student->phone}}</td>
          <td>{{$student->class_type}}</td>
          <td>{{$student->created_at->format('M-d-Y')}}</td>
          <td>
            <a data-bs-toggle="modal" 
              data-id="{{$student->id}}" 
              data-name="{{$student->name}}" 
              data-email="{{$student->email}}" 
              data-phone="{{$student->phone}}" 
              data-roll="{{$student->roll}}" 
              data-class_type="{{$student->class_type}}" 
            data-bs-target="#update_student" class="btn btn-sm btn-warning edit_student" href="">Update</a>
            <a class="btn btn-sm btn-danger delete_student"  data-id="{{$student->id}}"  href="">Delete</a>
          </td>
        </tr>
        @endforeach
      </table>
      {{$students->links()}}
      </div>
    </div>
      
     
    </div>
    


    @include('add_student')
    @include('update_student')
    @include('student_js')

    
    {!! Toastr::message() !!}



  </body>
</html>