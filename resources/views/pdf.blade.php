<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<h3>Class: {{$class}}</h3>
<h3>Date: {{$from_date}} - {{$end_date}} </h3>

<table class="table table-bordered">
    <thead>
      <tr>
          <th>Roll No.</th>
          <th>Attendance</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>
                {{$student->roll_no}}
            </td>
            <td>
                {{$student->count}} Days
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>