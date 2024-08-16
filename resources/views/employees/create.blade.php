@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Создать сотрудника</h1>
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow-sm rounded" style="background-color: #f8f9fa;">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contact_info" class="form-label">Контактная информация:</label>
                <textarea name="contact_info" id="contact_info" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Фото:</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Навыки:</label>
                <textarea name="skills" id="skills" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон:</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Создать сотрудника</button>
            </div>
        </form>
    </div>
@endsection
