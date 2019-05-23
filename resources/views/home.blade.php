@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Welcome to Admin Panel
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @role('super-admin')
            <div class="col-md-8">
                <h2>Download Class-wise Attendance Sheet</h2>
                <form action="download" method="get">
                    <select name="class">
                        <option value="1">One
                        </option>
                        <option value="2">Two
                        </option>
                        <option value="3">Three
                        </option>
                        <option value="4">Four
                        </option>
                        <option value="5">Five
                        </option>
                    </select>
                    <input type="date" name="from_date">
                    <input type="date" name="end_date">
                    <input type="submit" value="Download">
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="box-header">
                    <h2>New Teachers List
                    </h2>
                </div>
                <div class="box-divider m-a-0">
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#
                        </th>
                        <th>Name
                        </th>
                        <th>Actions
                        </th>
                    </tr>
                    </thead>
                    @php
                    ($i=1)
                    @endphp
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{$i++}}
                            </td>
                            <td>{{$teacher->name}}
                            </td>
                            <td>
                                <a href="{{url('teacher/approve/'.$teacher->id)}}"
                                   class="md-btn md-raised m-b-sm w-xs indigo">
                <span>Approve
                </span>
                                </a>
                                <a href="{{url('teacher/delete/'.$teacher->id)}}"
                                   class="md-btn md-raised m-b-sm w-xs indigo"
                                   onclick=" return confirm('are you sure to delete this')">
                <span>Delete
                </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                @endrole
        </div>
        <div class="row mt-5">
            @role('super-admin')
            <div class="col-md-8">
                <div class="box-header">
                    <h2>Approved Teachers List
                    </h2>
                </div>
                <div class="box-divider m-a-0">
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#
                        </th>
                        <th>Name
                        </th>
                        <th>Actions
                        </th>
                    </tr>
                    </thead>
                    @php
                    ($i=1)
                    @endphp
                    <tbody>
                    @foreach($apr_teachers as $teacher)
                        <tr>
                            <td>{{$i++}}
                            </td>
                            <td>{{$teacher->name}}
                            </td>
                            <td>
                                <a href="{{url('teacher/delete/'.$teacher->id)}}"
                                   class="md-btn md-raised m-b-sm w-xs indigo"
                                   onclick=" return confirm('are you sure to delete this')">
                <span>Delete
                </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="box-header">
                    <h2>Assign a Teacher to a Class(Class Teacher)
                    </h2>
                </div>
                <div class="box-divider m-a-0">
                    <form action="{{url('teacher/assignment')}}" method="get">
                        <select name="teacher">
                            @foreach($apr_teachers as $teacher)
                                <option value={{$teacher->id}}>{{$teacher->name}}
                                </option>
                            @endforeach
                        </select>
                        <select name="class">
                            <option value="1">Class 1
                            </option>
                            <option value="2">Class 2
                            </option>
                            <option value="3">Class 3
                            </option>
                            <option value="4">Class 4
                            </option>
                            <option value="5">Class 5
                            </option>
                        </select>
                        <input type="submit">
                    </form>
                </div>
            </div>
            @else
                @endrole
        </div>
        <div class="row mt-5">
            @role('teacher')
            <a href="{{url('attendance')}}"><button type="button" class="btn btn-primary">Students Attendance</button>
            </a>
            @else
                @endrole
        </div>
        <div class="row mt-5">
            @role('guardian')
            Guardian
            <form action="guardian/check" method="get">
                <input type="date" name="from_date">
                <input type="date" name="end_date">
                <input type="submit">
            </form>
            @else
                @endrole
        </div>
    </div>
@endsection
