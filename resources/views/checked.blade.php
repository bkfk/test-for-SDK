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
        <div class="form-group">
          <label>ИНН</label>
          <input type="text" class="form-control {{ $identificationNumber->error ? 'is-invalid' : '' }} {{ $identificationNumber->inn_status ? 'is-valid' : '' }}" value="{{ $identificationNumber->inn }}" readonly="readonly">
        </div>
        <div class="card card-body">
          <h5>Запрос на проверку отправлен в сервис ФНС России «Проверка статуса налогоплательщика налога на профессиональный доход (самозанятого)».</h5>
          <p>Результат проверки можно увидеть по ссылке ниже.</p>
          <a href="{{ route('identification-number.show', $identificationNumber->inn) }}" class="btn btn-link">Посмотреть результат проверки</a>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
