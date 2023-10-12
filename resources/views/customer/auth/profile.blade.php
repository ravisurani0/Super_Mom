@extends('layouts.front.main')
@section('css_include')
    <link rel="stylesheet" href="{{ asset('front/css/settings-tab.css') }}">
@endsection
@section('content')
    <section class="settings-tab-section">
        <div class="container p-0">
            @if (Session::has('message'))
                <p class="alert alert-info">{{ Session::get('success') }}</p>
            @endif
            @if (Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            <h1 class="h3 mb-3">Profile</h1>
            <div class="row">
                <div class="col-md-5 col-xl-4">
                    <div class="card">
                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account"
                                role="tab">
                                Account
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#saved-address"
                                role="tab">
                                Saved address
                            </a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#saved-payment"
                                style="display: none" role="tab">
                                Saved payment options
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xl-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('update.profile') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $userDetails->id }}" name="id">
                                        <div class="row">
                                            <div class="col-12 py-2">
                                                <div class="text-center">
                                                    @if ($userDetails->profile_image)
                                                        <img alt="Andrew Jones"
                                                            src="{{ URL::to('storage/user_image/' . $userDetails->profile_image) }}"
                                                            class="rounded-circle img-responsive mt-2" id="image_profile"
                                                            width="128" height="128">
                                                    @else
                                                        <img alt="Andrew Jones"
                                                            src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                            class="rounded-circle img-responsive mt-2" id="image_profile"
                                                            width="128" height="128">
                                                    @endif
                                                    <div class="mt-2">
                                                        <label class="btn btn-primary-link">Update profile<input
                                                                type="file" name="profile_image" id="profile_image" />
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="fname" name="fname"
                                                        placeholder="First name"
                                                        value="{{ isset($userDetails->full_name[0]) ? $userDetails->full_name[0] : '' }}">
                                                    @error('fname')
                                                        <div class="validation-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="lname" name="lname"
                                                        placeholder="Last name"
                                                        value="{{ isset($userDetails->full_name[1]) ? $userDetails->full_name[1] : '' }}">
                                                    @error('lname')
                                                        <div class="validation-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="mobnumber"
                                                        name="mobnumber" value="{{ $userDetails->phone_no }}"
                                                        placeholder="Phone number">
                                                    @error('mobnumber')
                                                        <div class="validation-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="email" name="email"
                                                        placeholder="Email" value="{{ $userDetails->email }}">
                                                    @error('email')
                                                        <div class="validation-error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label class="filter-radiobox mr-2 mt-2"> Male
                                                        <input type="radio" name="gender"
                                                            {{ $userDetails->gender == 1 ? 'checked' : '' }}
                                                            value="1">
                                                        <span class="mark"></span>
                                                    </label>
                                                    <label class="filter-radiobox mr-2 mt-2"> Female
                                                        <input type="radio" name="gender"
                                                            {{ $userDetails->gender == 0 ? 'checked' : '' }}
                                                            value="0">
                                                        <span class="mark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary">Update Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="saved-address" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('add.useraddress') }}" method="post">
                                        @csrf
                                        <div class="row saved-address-block pt-4">
                                            @if (!empty($userDetails->useraddresses) || $userDetails->useraddresses->count() > 0)
                                                @foreach ($userDetails->useraddresses as $key => $address)
                                                    <div class="col-lg-6 col-sm-6 col-12 pb-3">
                                                        <div class="saved-address active">
                                                            <div class="address-type">
                                                                <span class="badge saved-badge">
                                                                    @if (Str::lower($address->label) == 'home')
                                                                        <i class="fa-solid fa-house"></i>
                                                                        {{ $address->label }}
                                                                    @endif
                                                                    @if (Str::lower($address->label) == 'office')
                                                                        <i class="fa-solid fa-building"></i>
                                                                        {{ $address->label }}
                                                                    @endif
                                                                    @if (Str::lower($address->label) == 'other')
                                                                        <i class="fa-solid fa-user-group"></i>
                                                                        {{ $address->label }}
                                                                    @endif
                                                                </span>
                                                                <div class="dropdown show">
                                                                    <a href="#" data-bs-toggle="dropdown"
                                                                        data-display="static">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="3" height="15"
                                                                            viewBox="0 0 3 15" fill="none">
                                                                            <circle cx="1.5" cy="1.5"
                                                                                r="1.5" fill="#C1C1C1" />
                                                                            <circle cx="1.5" cy="7.5"
                                                                                r="1.5" fill="#C1C1C1" />
                                                                            <circle cx="1.5" cy="13.5"
                                                                                r="1.5" fill="#C1C1C1" />
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                                            id="editaddress"
                                                                            onclick="updateAddress({{ $address->id }})">Edit</a>
                                                                        <a class="dropdown-item"
                                                                            onclick="trash_record('{{ route('user.address.delete', ['id' => $address->id]) }}')">Delete</a>
                                                                        {{-- <a class="dropdown-item"
                                                                        onclick="trash_record('{{ route('user.address.delete', ['id' => $address->id]) }}')">Something else here</a> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">
                                                                {{ $address->address_1 }},{{ $address->address_2 }}.{{ $address->city }},{{ $address->postcode }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="row">
                                            <input type="hidden" name="id" value="" id="address_id">
                                            <div class="col-12 py-4 d-flex align-items-center">
                                                <h4 class="mb-0 text-nowrap">Add New Shipping Address</h4>
                                                <div class="divider"></div>
                                            </div>
                                            <div class="col-lg-6 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="addressfloor"
                                                        id="addressfloor" placeholder="House/Flat/Floor">
                                                    @error('addressfloor')
                                                        <span class="validation-error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="apartment"
                                                        id="apartment" placeholder="Apartment/Road/Area">
                                                    @error('apartment')
                                                        <span class="validation-error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="landmark"
                                                        name="Landmark" placeholder="Landmark">
                                                    @error('Landmark')
                                                        <span class="validation-error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 py-2">
                                                <select name="country" id="country" placeholder="Select Country"
                                                    class="form-control">
                                                    <option value="" selected="true" disabled="disabled">Select
                                                        Country</option>
                                                    @foreach ($worldCountries as $country)
                                                        <option value="{{ $country->name }}"
                                                            data-id="{{ $country->id }}"
                                                            {{ old('country') == $country->name ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <span class="validation-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 col-12 py-2">
                                                <select name="state" id="state" placeholder="Select State"
                                                    class="form-control">
                                                    <option value="" selected="true" disabled="disabled">Select
                                                        State</option>
                                                        @if (old('country') && old('City'))
                                                        @php
                                                            $countryId = \App\Model\WorldCountry::where(['name' => old('country')])
                                                                ->pluck('id')
                                                                ->first();
                                                            $states = \App\Model\WorldState::where(['country_id' => $countryId])
                                                                ->select('id', 'name')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->name }}"
                                                                data-id="{{ $state->id }}"
                                                                {{ $state->name == old('state') ? 'selected' : '' }}>
                                                                {{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('state')
                                                    <span class="validation-error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 col-12 py-2">
                                                <select name="City" id="City" placeholder="Select City"
                                                    class="form-control">
                                                    <option value="" selected="true" disabled="disabled">Select
                                                        City</option>
                                                    @if (old('state') && old('City'))
                                                        @php
                                                            $statesId = \App\Model\WorldState::where(['name' => old('state')])
                                                                ->pluck('id')
                                                                ->first();
                                                            $cities = \App\Model\WorldCity::where(['state_id' => $statesId])
                                                                ->select('id', 'name')
                                                                ->get();
                                                        @endphp
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->name }}"
                                                                data-id="{{ $city->id }}"
                                                                {{ $city->name == old('City') ? 'selected' : '' }}>
                                                                {{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('City')
                                                    <span class="validation-error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-lg-4 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="pincode"
                                                        name="pincode" placeholder="Pincode">
                                                    @error('pincode')
                                                        <span class="validation-error">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 py-2">
                                                <label for="">Save as</label>
                                            </div>
                                            <div class="row py-2">
                                                <div class="col-12 pb-3">
                                                    <div class="address-types" id="address-labels">
                                                        <a href="javascript:void(0)" class="active" id="home_label"
                                                            onclick="changeLabel('home')">
                                                            <span class="badge address-badge">
                                                                <i class="fa-solid fa-house"></i> Home
                                                            </span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="" id="office_label"
                                                            onclick="changeLabel('office')">
                                                            <span class="badge address-badge">
                                                                <i class="fa-solid fa-building"></i> Office
                                                            </span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="" id="other_label"
                                                            onclick="changeLabel('other')">
                                                            <span class="badge address-badge">
                                                                <i class="fa-solid fa-user-group"></i> Other
                                                            </span>
                                                        </a>
                                                        <input type="hidden" name="address_label" id="address_label"
                                                            value="home">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </form> --}}
                                        </div>
                                        <button type="submit" class="btn btn-secondary my-2" id="save">Save new
                                            address</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="saved-payment" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-12 py-4 d-flex align-items-center">
                                                <h4 class="mb-0 text-nowrap">Add new card</h4>
                                                <div class="divider"></div>
                                            </div>
                                            <div class="col-lg-8 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="cnumber"
                                                        placeholder="Card number">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="expdate"
                                                        placeholder="Expiry date">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="cname"
                                                        placeholder="Name on card">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 py-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="cvv"
                                                        placeholder="CVV">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary my-2">Save new card</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style>
    input[type="file"] {
        display: none;
    }
</style>
@section('inline-footer-js')
    <script>
        $(document).ready(() => {
            $('#profile_image').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('#image').attr('src', event.target.result);
                        $('#image_profile').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });

        function updateAddress(id) {
            var addressId = id;
            $.get("{{ route('edit.user.address') }}", {
                    addressId: addressId,
                })
                .done(function(response) {
                    let record = response.data;
                    $("#address_id").val(record.id);
                    $("#addressfloor").val(record.address_1);
                    $("#apartment").val(record.address_2);
                    $("#landmark").val(record.landmark);
                    // $("#country").val(record.city);
                    // $("#state").val(record.city);
                    $("#city").val(record.city);
                    $("#pincode").val(record.postcode);
                    // $("#address_label").val(record.label);
                    changeLabel(record.label);

                })
                .fail(function(error) {
                    console.log("Request Failed: " + error);
                });

            $("#save").text('Update address');
        }

        function changeLabel(label) {

            $("#address_label").val(label);
            switch (label) {
                case 'home':
                    $('#office_label').removeClass('active');
                    $('#home_label').addClass('active');
                    $('#other_label').removeClass('active');
                    break;
                case 'office':
                    $('#office_label').addClass('active');
                    $('#home_label').removeClass('active');
                    $('#other_label').removeClass('active');
                    break;
                case 'other':
                    $('#office_label').removeClass('active');
                    $('#home_label').removeClass('active');
                    $('#other_label').addClass('active');
                    break;
                default:
            }
        }

        function trash_record(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "You want delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "get",
                        success: function(msg) {
                            if (msg.message == "success") {
                                Swal.fire(
                                    "Deleted!",
                                    "Record deleted.",
                                    "success"
                                );
                                location.reload();
                            } else {
                                Swal.fire("Something Wrong", "", "error");
                            }
                        },
                        error: function(request, error) {
                            // show_error(request, error);
                        },
                    });
                }
            });
        }

        $('#country').change(function() {
            var country_id = $(this).find(':selected').data("id");
            $.ajax({
                type: 'GET',
                url: "{{ route('get.states') }}",
                data: {
                    id: country_id
                },
                success: function(response) {
                    $('#state').find('option').remove().end();
                    $.each(response.data, function(i, item) {
                        $('#state').append($('<option>', {
                            value: item.name,
                            text: item.name,
                            'data-id': item.id,
                        }));
                    });
                }
            });
        });
        $('#state').change(function() {
            var state_id = $(this).find(':selected').data("id");
            $.ajax({
                type: 'GET',
                url: "{{ route('get.profile.cities') }}",
                data: {
                    id: state_id
                },
                success: function(response) {
                    $('#City').find('option').remove().end();
                    $.each(response.data, function(i, item) {
                        $('#City').append($('<option>', {
                            value: item.name,
                            text: item.name,
                            'data-id': item.id,
                        }));
                    });
                }
            });
        });
    </script>
@endsection
