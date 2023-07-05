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