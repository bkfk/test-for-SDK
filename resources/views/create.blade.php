<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Проверка ИНН</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <section class="main">
    <div class="d-flex flex-column justify-content-center flex-wrap h-100">
      <div class="container">
        <form class="form" action="{{ route('identification-number.store') }}" method="post">
          @csrf

          <div class="form-group">
            <label>ИНН</label>
            <input type="text" class="form-control {{ $errors->has('inn') ? 'is-invalid' : '' }}" name="inn" value="{{ old('inn') }}" required>
            @if($errors->has('inn'))
            <div class="invalid-feedback">
              {{ $errors->first('inn') }}
            </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
      </div>
    </div>
  </section>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
