@extends('layouts.main-admin-layout')
@section('title')
@endsection()

@section('content')
<div class="d-flex" id="wrapper">


    <!-- Page Content -->
    <div id="page-content-wrapper" class="w-100">
{{--        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">--}}
{{--            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>--}}
{{--        </nav>--}}

        <div class="container-fluid py-4">
            <h1 class="mb-4">Manage Curators</h1>

            <!-- Create Curator Section -->
            <section id="createCurator" class="mb-5">
                <h2>Create Curator</h2>
                <form action="{{route('admin.curator.store')}}" method="post" >
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="curatorName" class="form-label">Ім'я</label>
                        <input type="text" class="form-control" id="curatorName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="curatorSurname" class="form-label">Прізвище</label>
                        <input type="text" class="form-control" id="curatorSurname" name="surname" required>
                    </div>
                    <div class="mb-3">
                        <label for="curatorPhone" class="form-label">Номер телефону</label>
                        <input type="tel" class="form-control" id="curatorPhone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="curatorEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="curatorEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="curatorStudentGroup" class="form-label">Група</label>
                        <select class="form-select" aria-label="Default select example" name="student_group_id">
                            <option selected>Виберіть групу</option>
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->abbreviated_name}}</option>
                            @endforeach
                        </select>
{{--                        <input type="text" class="form-control" id="curatorStudentGroup" name="student_group_id" required>--}}
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Департамент</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </section>

            <!-- View Curators Section -->
            <section id="viewCurators" class="mb-5">
                <h2>View Curators</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ім'я та Прізвище</th>
                        <th>Група</th>
                        <th>Телефон</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($curators as $curator)
                        <tr>
                            <td>{{$curator->id}}</td>
                            <td>{{$curator->name . ' '. $curator->surname}}</td>
                            <td>{{ \App\Models\StudentGroup::where('id', $curator->student_group_id)->first()?->abbreviated_name }}
                            </td>
                            <td>{{$curator->phone}}</td>
                            <td>
                                <a href="{{route('admin.curator.edit', $curator->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/curators/1" method="post" class="d-inline">
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- More rows as needed -->
                    </tbody>
                </table>
            </section>

        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>

{{--<script>--}}
{{--    const toggleButton = document.getElementById('menu-toggle');--}}
{{--    const wrapper = document.getElementById('wrapper');--}}
{{--    toggleButton.addEventListener('click', () => {--}}
{{--        wrapper.classList.toggle('toggled');--}}
{{--    });--}}
{{--</script>--}}
@endsection
