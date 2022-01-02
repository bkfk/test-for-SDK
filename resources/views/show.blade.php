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
            @if($identificationNumber->error)
            <p class="invalid-feedback">
              Статус не определен, сервис вернул ошибку
            </p>
            @endif
            @if($identificationNumber->inn_status)
            <p class="valid-feedback">
              Счастливый обладатель этого ИНН является самозанятым
            </p>
            @endif
            @if(!$identificationNumber->inn_status && $identificationNumber->service_response)
            <p>
              Обладатель этого ИНН не является самозанятым
            </p>
            @endif
          </div>
          @if($identificationNumber->error || $identificationNumber->service_response)
          <p>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDetails">
              Подробности
            </button>
          </p>
          <div class="collapse" id="collapseDetails">
            <div class="card card-body">
              <p>
                Данные получены: {{ $identificationNumber->updated_at->format('d.m.Y, H:i') }}
              </p>
              {{ $identificationNumber->error }}
              @if($identificationNumber->service_response)
              @forelse($identificationNumber->service_response as $key => $value)
              <p>
                {{ $key }}: {{ $value }}
              </p>
              @endforeach
              @endif
            </div>
          </div>
          @else
          <p>Ответ от сервиса ФНС еще не получен, проверка может занимать несколько минут - попробуйте обновить страницу позже</p>
          @endif
      </div>
    </div>
  </section>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
