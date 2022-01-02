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
        <form class="form" action="https://statusnpd.nalog.ru/api/v1/tracker/taxpayer_status" method="post">
          <div class="form-group">
            <label>ИНН</label>
            <input type="text" class="form-control" name="inn" value="" required>
          </div>
          <div class="form-group">
            <label>date</label>
            <input type="date" class="form-control" name="requestDate" value="" required>
          </div>
          <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
      </div>
    </div>
  </section>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
