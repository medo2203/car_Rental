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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="orderForm">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <h3>Driver's details</h3>
                        </div>
                        <label for="driverAge">
                            <strong>
                                Driver's Full Name
                            </strong>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control mb-4" name="CNI" placeholder="Driver's CIN">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-6 m-1">
                                <label for="driverAge">
                                    <strong>
                                        Driver's age
                                    </strong>
                                </label>
                                <select name="Driver's age" class="form-select mb-2" id="driverAge">
                                    <option value="">How old are you ?</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="+60">+60</option>
                                </select>
                            </div>
                            <div class="col-6 m-1">
                                <label for="driverAge">
                                    <strong>
                                        Driver's CIN
                                    </strong>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control mb-4" name="CNI" placeholder="Driver's CIN">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h3>Booking details</h3>
                        </div>
                        <strong>
                            Pick-up location
                        </strong>
                        <select name="pickPlace" class="form-select mb-2">
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
                        <label>
                            <strong>
                                Pick-up Date
                            </strong>
                        </label>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating mb-2 col-6 m-1">
                                <input type="date" class="form-control" id="myDateInput" name="pickDate">
                                <label for="myDateInput">Date</label>
                            </div>
                            <div class="form-floating col-6 m-1">
                                <input type="time" class="form-control" id="myTimeInput" name="pickTime">
                                <label for="myTimeInput">Time</label>
                            </div>
                        </div>
                        <label for="dropPlace"></label>
                            <strong>
                                Drop-off location
                            </strong>
                        <select name="dropPlace" class="form-select" id="dropPlace">
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
                        <label>
                            <strong>
                                Drop-off Date
                            </strong>
                        </label>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-6 m-1">
                                <input type="date" class="form-control" id="dropDate" name="dropDate">
                                <label for="myDateInput">Date</label>
                            </div>
                            <div class="form-floating col-6 m-1">
                                <input type="time" class="form-control" id="dropTime" name="dropTime">
                                <label for="myTimeInput">Time</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Place order</button>
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
    </script>
@endsection
