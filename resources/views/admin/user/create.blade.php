@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container mt-5">
<h2 class="mb-4">Створення користувача</h2>
<form action="{{route('admin.user.store')}}" method="POST">
    @method('post')
    @csrf
    <!-- Ім'я користувача -->
    <div class="mb-3">
        <label for="name" class="form-label">Ім'я</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введіть ім'я" required>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Прізвище</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Введіть прізвище" required>
    </div>

    <!-- Роль -->
    <div class="mb-3">
        <label for="role" class="form-label">Роль</label>
        <select class="form-select" id="role" name="role" required>
            <option value="0">Адміністратор</option>
            <option value="1">Студент</option>
            <option value="2">Викладач</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="unique_code" class="form-label">Унікальний код</label>
        <div class="input-group">
            <input type="text" class="form-control" id="unique_code" name="unique_code" placeholder="Згенерований код" readonly>
            <button type="button" class="btn btn-outline-secondary" id="generate_code">Генерувати</button>
        </div>
    </div>

    <!-- Кнопка відправки -->
    <button type="submit" class="btn btn-primary">Створити</button>
</form>
</div>
<script>
    document.getElementById('generate_code').addEventListener('click', function() {
        document.getElementById('unique_code').value = Math.random().toString(36).substring(2, 10).toUpperCase();
    });
</script>
