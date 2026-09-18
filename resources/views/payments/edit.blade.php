@extends('layouts.app')

@section('title', 'Редактирование платежа')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Редактирование платежа #{{ $payment->id }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/payments/' . $payment->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Квартира</label>
                                <input type="text" class="form-control"
                                       value="Кв. {{ $payment->flat->number }} — {{ $payment->flat->house->name ?? 'N/A' }}"
                                       disabled>
                                <small class="text-muted">Квартиру изменить нельзя</small>
                            </div>

                            <div class="mb-3">
                                <label for="id_period" class="form-label">Период *</label>
                                <select class="form-select" id="id_period" name="id_period" required>
                                    @foreach($periods as $period)
                                        <option value="{{ $period->id }}"
                                            {{ $payment->id_period == $period->id ? 'selected' : '' }}>
                                            {{ $period->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="sum" class="form-label">Сумма *</label>
                                <input type="number" step="0.01" class="form-control"
                                       id="sum" name="sum" value="{{ old('sum', $payment->sum) }}" required>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                                <a href="{{ url('/payments') }}" class="btn btn-secondary">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection