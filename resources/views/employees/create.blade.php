@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Employee</h1>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="contact_info">Contact Info:</label>
            <textarea name="contact_info" id="contact_info"></textarea>

            <label for="photo">Photo URL:</label>
            <input type="text" name="photo" id="photo">

            <label for="skills">Skills:</label>
            <textarea name="skills" id="skills"></textarea>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone"> <!-- Обновлено: Добавлено поле phone -->

            <button type="submit">Create Employee</button>
        </form>

    </div>
@endsection
