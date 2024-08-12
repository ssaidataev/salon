@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employees</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Name</th>
                <th>Contact Info</th>
                <th>Photo</th>
                <th>Skills</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->contact_info }}</td>
                    <td>
                        @if ($employee->photo)
                            <img src="{{ $employee->photo }}" alt="Photo" style="width: 50px; height: 50px;">
                        @else
                            No Photo
                        @endif
                    </td>
                    <td>{{ $employee->skills }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
