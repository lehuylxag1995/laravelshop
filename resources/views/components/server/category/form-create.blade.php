<form action="{{ $action }}" method="POST">
    {{ $methodToken ?? '' }}
    @csrf
    <div class="form-group">
        <label for="name">Tên Menu:</label>
        <input value="{{ $nameCategory ?? old('name') }}" type="text"
            class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            placeholder="Nhập tên danh mục menu">
        @error('name')
            <div class="invalid-feedback">{{ $message }} </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="parent_id">Chọn menu cha:</label>
        <select class="custom-select" id="parent_id" name="parent_id">
            <option value="0">- Mặc định là menu root -</option>
            {{ $optionsOfSelect }}
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Chấp nhận</button>
        <a href="{{ route('server.category.index') }}" class="btn btn-primary">Quay lại</a>
    </div>
</form>
