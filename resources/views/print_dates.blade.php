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

                        @role('guardian')

                            <table>
                                <thead>
                                <tr>
                                    <th>Attended Dates</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dates as $date)
                                    <tr>
                                        <td> {{$date->date}} </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @else
                            I am not a teacher...
                            @endrole

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
