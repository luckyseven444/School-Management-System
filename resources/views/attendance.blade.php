@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @role('teacher')
                            <form action="{{url('attendance/submit')}}" method="get">
                            Date: <input type="date" name="date">
                            <table>
                                <thead>
                                   <tr>
                                       <th>Name</th>
                                       <th>Roll No.</th>
                                       <th>Class</th>
                                       <th>Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                  @foreach($students as $student)
                                      <tr>
                                          <td> {{$student->name}} </td>
                                          <td>{{$student->roll_no}}</td>
                                          <td>{{$student->class}}</td>
                                          <td>
                                              <input type="checkbox" name="user_id[]" value="{{$student->id}}">
                                              <input type="hidden" name="class[]" value={{$student->class}}>
                                              <input type="hidden" name="roll_no[]" value={{$student->roll_no}}>
                                              <input type="hidden" name="name[]" value={{$student->name}}>
                                          </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                                <input type="submit">
                            </form>
                            @else
                                I am not a teacher...
                                @endrole

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
