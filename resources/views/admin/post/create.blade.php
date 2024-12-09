@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container my-5">
    <h2 class="mb-4">Добавить новость колледжа</h2>
    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Краткое описание</label>
            <textarea class="form-control" id="summary" name="summary" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Содержание</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Категория</label>
            <select class="form-select" id="category" name="category_id" required>
                <option value="">Выберите категорию</option>
                <option value="1">События</option>
                <option value="2">Академические достижения</option>
                <option value="3">Спорт</option>
                <option value="4">Сообщения администрации</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Дата публикации</label>
            <input type="datetime-local" class="form-control" id="published_at" name="published_at">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Место проведения</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image_url">
        </div>


        <div class="mb-3">
            <label for="status" class="form-label">Статус</label>
            <select class="form-select" id="status" name="status">
                <option value="draft">Черновик</option>
                <option value="published">Опубликовано</option>
                <option value="archived">Архив</option>
            </select>
        </div>

        <!-- Закрепить новость -->
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured">
            <label class="form-check-label" for="is_featured">Закрепить новость</label>
        </div>

        <!-- Теги -->
        <div class="mb-3">
            <label for="tags" class="form-label">Теги (через запятую)</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="например, события, спорт, достижения">
        </div>

        <!-- Кнопка отправки -->
        <button type="submit" class="btn btn-primary">Добавить новость</button>
    </form>
</div>


