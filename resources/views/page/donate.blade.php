@extends('layouts.app')

@section('content')
    <x-container>
        <x-donation></x-donation>
    </x-container>
    <x-container>
        <div class="box">
            <form name="payment" id="payment-form">
                <!-- Form fields -->
                <div class="row">
                    <div class="col-md-6">
                        <label class="mb-0">Никнейм</label>
                        <input type="text" class="form-control mb-3 required" name="username"
                               value="{{ old('username') }}" placeholder="Ваш ник в игре">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-0">Почтовый адрес</label>
                        <input type="text" class="form-control mb-3" name="email"
                               value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="col-md-12">
                        <label class="mb-0">Сумма поддержки (USD)</label>
                        <input type="number" class="form-control form-control-lg mb-1 required"
                               name="amount" value="{{ old('amount') }}"
                               placeholder="Сумма поддержки (USD)" min="1">
                    </div>
                </div>

                <div class="row card-footer">
                    <button class="btn btn-accent" type="submit">
                        Подтвердить
                    </button>
                </div>
            </form>

        </div>
    </x-container>

    @push('foot')
        <script src="{{ Vite::asset('resources/js/donate.js') }}"></script>
    @endpush
@endsection
