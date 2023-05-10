@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card m-3 p-3">
            <div class="card-img">{{ $car->brand }}</div>
            <div class="card-body">
                <h3>{{ $car->model }}</h3>
                <h3>{{ $car->price }}</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Order now
                </button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="orderForm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h3>Driver's details</h3>
                    </div>
                    <form id="user-form" action="{{ route('Orders.store')}}" method="POST">
                        @csrf
                        <label for="driverName">
                            <strong>
                                Driver's Full Name
                            </strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" value="{{ Auth::user()->fullName }}"
                                name="fullName" placeholder="Driver's Full name"
                                @if (isset(Auth::user()->fullName)) disabled @endif>
                            @error('fullName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-6 m-1">
                                <label for="driverAge">
                                    <strong>
                                        Driver's age
                                    </strong>
                                </label>
                                <select name="age" class="form-select mb-2" id="driverAge"
                                    @if (isset(Auth::user()->age)) disabled @endif>
                                    @for ($i = 18; $i <= 99; $i++)
                                        <option value="{{ $i }}"
                                            @if (Auth::user()->age == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-6 m-1">
                                <label for="driverAge">
                                    <strong>
                                        Driver's CIN
                                    </strong>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control mb-4" name="CIN"
                                        placeholder="Driver's CIN" value="{{ Auth::user()->CIN }}"
                                        @if (isset(Auth::user()->CIN)) disabled @endif>
                                </div>
                            </div>
                        </div>
                    {{-- </form>
                    <form id="order-form" action="{{ route('Orders.store') }}" method="POST">
                        @csrf  --}}
                        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="carId" value="{{ $car->id }}">
                        <div class="d-flex justify-content-center">
                            <h3>Booking details</h3>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h3>{{ $car->brand }}</h3>
                            <h3>{{ $car->model }}</h3>
                            <h3>{{ $car->price }}</h3>
                        </div>
                        <strong>
                            Pick-up location
                        </strong>
                        <select name="pick_up_location" class="form-select mb-2 @error('pick_up_location') is-invalid @enderror">
                            <option value="">Select a city</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Chefchaouen">Chefchaouen</option>
                            <option value="Dakhla">Dakhla</option>
                            <option value="Essaouira">Essaouira</option>
                            <option value="Fes">Fes</option>
                            <option value="Ifrane">Ifrane</option>
                            <option value="Kenitra">Kenitra</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Meknes">Meknes</option>
                            <option value="Nador">Nador</option>
                            <option value="Ouarzazate">Ouarzazate</option>
                            <option value="Oujda">Oujda</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Safi">Safi</option>
                            <option value="Sale">Sale</option>
                            <option value="Tangier">Tangier</option>
                            <option value="Taroudant">Taroudant</option>
                            <option value="Taza">Taza</option>
                            <option value="Temara">Temara</option>
                            <option value="Tetouan">Tetouan</option>
                            <option value="Tiznit">Tiznit</option>
                            <option value="Zagora">Zagora</option>
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
                                <input type="date" class="form-control @error('pick_up_date') is-invalid @enderror" id="myDateInput" name="pick_up_date">
                                <label for="myDateInput">Date</label>
                                @error('pick_up_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating col-6 m-1">
                                <input type="time" class="form-control @error('pick_up_time') is-invalid @enderror" id="myTimeInput" name="pick_up_time">
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
                        <select  name="drop_off_location" class="form-select @error('drop_off_location') is-invalid @enderror" id="dropPlace">
                            <option value="">Select a city</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Chefchaouen">Chefchaouen</option>
                            <option value="Dakhla">Dakhla</option>
                            <option value="Essaouira">Essaouira</option>
                            <option value="Fes">Fes</option>
                            <option value="Ifrane">Ifrane</option>
                            <option value="Kenitra">Kenitra</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Meknes">Meknes</option>
                            <option value="Nador">Nador</option>
                            <option value="Ouarzazate">Ouarzazate</option>
                            <option value="Oujda">Oujda</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Safi">Safi</option>
                            <option value="Sale">Sale</option>
                            <option value="Tangier">Tangier</option>
                            <option value="Taroudant">Taroudant</option>
                            <option value="Taza">Taza</option>
                            <option value="Temara">Temara</option>
                            <option value="Tetouan">Tetouan</option>
                            <option value="Tiznit">Tiznit</option>
                            <option value="Zagora">Zagora</option>
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
                                <input type="date" class="form-control @error('drop_off_date') is-invalid @enderror" id="dropDate" name="drop_off_date">
                                <label for="myDateInput">Date</label>
                                @error('drop_off_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating col-6 m-1">
                                <input type="time" class="form-control @error('drop_off_time') is-invalid @enderror" id="dropTime" name="drop_off_time">
                                <label for="myTimeInput">Time</label>
                                @error('drop_off_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">Placeorder</button>
                </div>
                </form>
            </div>
        </div>
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
