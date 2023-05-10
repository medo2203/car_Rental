@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    <form id="user-form" action="{{ route('Orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-center">
            <h3>Booking details</h3>
        </div>
        <strong>
            Pick-up location
        </strong>
        <select name="pick_up_location" class="form-select mb-2 @error('pick_up_location') is-invalid @enderror">
            <option value="">Select a city</option>
            @foreach(['Agadir', 'Casablanca', 'Chefchaouen', 'Dakhla', 'Essaouira', 'Fes', 'Ifrane', 'Kenitra', 'Marrakech', 'Meknes', 'Nador', 'Ouarzazate', 'Oujda', 'Rabat', 'Safi', 'Sale', 'Tangier', 'Taroudant', 'Taza', 'Temara', 'Tetouan', 'Tiznit', 'Zagora'] as $city)
                <option value="{{ $city }}" {{ $order->pick_up_location == $city ? 'selected' : '' }}>{{ $city }}</option>
            @endforeach
        </select>
        @error('pick_up_location')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label>
            <strong>
                Pick-up Date
            </strong>
        </label>
        <div class="d-flex justify-content-center">
            <div class="form-floating mb-2 col-6 m-1">
                <input type="date" class="form-control @error('pick_up_date') is-invalid @enderror"
                    value="{{ old('pick_up_date', $order->pick_up_date) }}" id="myDateInput" name="pick_up_date">
                <label for="myDateInput">Date</label>
                @error('pick_up_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating col-6 m-1">
                <input type="time" class="form-control @error('pick_up_time') is-invalid @enderror"
                    value="{{ old('pick_up_time', $order->pick_up_time) }}" id="myTimeInput" name="pick_up_time">
                <label for="myTimeInput">Time</label>
                @error('pick_up_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <label for="dropPlace"></label>
        <strong>
            Drop-off location
        </strong>
        <select name="drop_off_location" class="form-select mb-2 @error('pick_up_location') is-invalid @enderror">
            <option value="">Select a city</option>
            @foreach(['Agadir', 'Casablanca', 'Chefchaouen', 'Dakhla', 'Essaouira', 'Fes', 'Ifrane', 'Kenitra', 'Marrakech', 'Meknes', 'Nador', 'Ouarzazate', 'Oujda', 'Rabat', 'Safi', 'Sale', 'Tangier', 'Taroudant', 'Taza', 'Temara', 'Tetouan', 'Tiznit', 'Zagora'] as $city)
                <option value="{{ $city }}" {{ $order->drop_off_location == $city ? 'selected' : '' }}>{{ $city }}</option>
            @endforeach
        </select>
        @error('drop_off_location')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label>
            <strong>
                Drop-off Date
            </strong>
        </label>
        <div class="d-flex justify-content-center">
            <div class="form-floating col-6 m-1">
                <input type="date" class="form-control @error('drop_off_date') is-invalid @enderror"
                    value="{{ old('drop_off_date', $order->drop_off_date) }}"id="dropDate" name="drop_off_date">
                <label for="myDateInput">Date</label>
                @error('drop_off_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating col-6 m-1">
                <input type="time" class="form-control @error('drop_off_time') is-invalid @enderror"
                    value="{{ old('drop_off_time', $order->drop_off_time) }}"id="dropTime" name="drop_off_time">
                <label for="myTimeInput">Time</label>
                @error('drop_off_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-primary" id="submit-btn">Edit order</button>
        </div>
        </div>
    </form>
</div>
    <script>
        // Get the current date in the format yyyy-mm-dd
        const today = new Date().toISOString().substr(0, 10);
        // Set the input value to today's date
        document.getElementById("myDateInput").value = today;
        document.getElementById("myTimeInput").value = "10:00";
        document.getElementById("dropTime").value = "10:00";

        // Get tomorrow's date in the format yyyy-mm-dd
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        const tomorrowString = tomorrow.toISOString().substr(0, 10);

        // Set the input value to tomorrow's date
        document.getElementById("dropDate").value = tomorrowString;

        // document.getElementById('submit-btn').addEventListener('click', function(event) {
        //     event.preventDefault();
        //     document.getElementById('user-form').submit();
        //     document.getElementById('order-form').submit();
        // });
    </script>
@endsection
