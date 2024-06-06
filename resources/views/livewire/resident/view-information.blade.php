<div>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Resident's Information</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <small class="fw-bolder text-muted">Search Resident's</small>
                            <input type="text" wire:model="searchInput" wire:keydown="selectAddress" class="form-control form-control-sm border border-primary" placeholder="Search Pattern: Last Name, First Name">
                        </div>
                    </div>
                </div>
                <div class="content">
                    @forelse ($residentList as $item)
                    <a href="{{ route('resident.view', base64_encode($item->id)) }}">
                        <div class="card m-1 p-1">
                            <div class="card-body m-2 p-2 rounded">
                                <div class="d-flex align-center">
                                    <span class="round me-3">{{ $item->first_name[0] }}</span>
                                    <div class="align-middle">
                                        <h6>{{ $item->last_name . ', ' . $item->first_name . ' ' . $item->middle_name }}
                                        </h6><small class="text-muted">{{ $item->civil_status }}</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>

                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="card  border border-soft-info">
                    <div class="card-header bg-white">
                        <span class="text-info fw-bolder h3"><b>BASIC INFORMATION</b></span>
                        <button class="btn btn-primary float-end" wire:click="updateInfo">Update Information</button>
                    </div>
                    <div class="card-body">
                        @if (session('information_message'))
                        <div class="alert alert-success mb-3">
                            <b> {{ session('information_message') }}</b>
                        </div>
                        @endif
                        <form wire:submit.prevent="updateInformation" method="post" class="mt-2">

                            @error('formError')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-12">
                                    <small class="text-secondary ">LAST NAME <span class="text-danger">*</span></small>
                                    <input wire:model="residents.last_name" type="text" class="form-control border border-info" {{ $input }}>
                                    @error('residents.last_name')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <small class="text-secondary ">FIRST NAME <span class="text-danger">*</span></small>
                                    <input wire:model="residents.first_name" type="text" class="form-control border border-info" {{ $input }}>
                                    @error('residents.first_name')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <small class="text-secondary ">MIDDLE NAME</small>
                                    <input wire:model="residents.middle_name" type="text" class="form-control border border-info" {{ $input }}>
                                    @error('residents.middle_name')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-3 col-md-12">
                                    <small class="text-secondary ">EXTENSION NAME </small>
                                    <input wire:model="residents.extension_name" type="text" class="form-control border border-info" {{ $input }}>
                                    @error('residents.extension_name')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-12">
                                    <small class="text-secondary ">SEX <span class="text-danger">*</span></small>
                                    <select wire:model="residents.sex" class="form-select border border-info">
                                        <option selected>Select Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('residents.sex')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-12">
                                    <small class="text-secondary ">CIVIL STATUS <span class="text-danger">*</span></small>
                                    <select wire:model="residents.civil_status" class="form-select border border-info">
                                        <option selected>Select Civil Status</option>
                                        <option value="single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                    @error('residents.civil_status')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-12">
                                    <small class="text-secondary ">BIRTH DATE <span class="text-danger">*</span></small>
                                    <input wire:model="residents.birth_date" type="date" class="form-control border border-info" {{ $input }}>
                                    @error('residents.birth_date')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12">
                                    <small class="text-secondary ">BIRTH PLACE <span class="text-danger">*</span></small>
                                    <input wire:model="residents.birth_place" type="text" class="form-control border border-info" {{ $input }}>
                                    @error('residents.birth_place')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-md-12">
                                    <small class="text-secondary ">CONTACT NUMBER</small>
                                    <input wire:model="residents.contact_number" type="text" class="form-control border border-info" {{ $input }}>
                                    @error('residents.contact_number')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            @if ($updateForm)
                            <button type="submit" class="btn btn-info text-white w-100">SUBMIT</button>
                            @endif

                        </form>
                    </div>
                </div>
                <div class="card  border border-soft-info">
                    <div class="card-header bg-white">
                        <span class="text-info fw-bolder h3"><b>LIST OF ADDRESS</b></span>
                        <button class="btn btn-primary float-end" wire:click="addAddress">Add Address</button>
                    </div>
                    <div class="card-body">
                        @if (session('address_message'))
                        <div class="alert alert-success mb-3">
                            <b> {{ session('address_message') }}</b>
                        </div>
                        @endif
                        @if ($addressForm)
                        <div class="form mb-5">
                            <span class="text-info">Add Address</span>
                            <form wire:submit.prevent="storeAddress" method="post" class="mt-2">
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-secondary ">REGION <span class="text-danger">*</span></small>
                                        <select wire:change="selectAddress" wire:model="address.region" class="form-select border border-info">
                                            <option selected>Select Region</option>
                                            @foreach ($regionList as $region)
                                            <option value="{{ $region->id }}">
                                                {{ $region->abbreviation . ' - ' . $region->region_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('address.region')
                                        <small class="badge bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-secondary ">PROVINCE <span class="text-danger">*</span></small>
                                        <select wire:model="address.province" wire:change="selectAddress" class="form-select border border-info">
                                            <option selected>Select Province</option>
                                            @forelse ($provinceList as $item)
                                            <option value="{{ $item->id }}">{{ $item->province_name }}
                                            </option>
                                            @empty
                                            @endforelse

                                        </select>
                                        @error('address.province')
                                        <small class="badge bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-secondary ">MUNICIPALITY / CITY <span class="text-danger">*</span></small>
                                        <select wire:model="address.municipality" wire:change="selectAddress" class="form-select border border-info">
                                            <option selected>Select Municipality / City</option>
                                            @forelse ($municipalityList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->municipality_name }}
                                            </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('address.municipality')
                                        <small class="badge bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-secondary ">BARANGAY<span class="text-danger">*</span></small>
                                        <select wire:model="address.barangay" wire:change="selectAddress" class="form-select border border-info">
                                            <option selected>Select Barangay</option>
                                            @forelse ($barangayList as $item)
                                            <option value="{{ $item->id }}">{{ $item->barangay_name }}
                                            </option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('address.barangay')
                                        <small class="badge bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-8 col-md-12">
                                        <small class="text-secondary ">STREET NUMBER / BDLG NO.</small>
                                        <input wire:model="address.street" type="text" class="form-control border border-info">
                                        @error('address.street')
                                        <small class="badge bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info text-white float-end ">ADD</button>
                            </form>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table stylish-table no-wrap">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th class="border-top-0">Region</th>
                                        <th class="border-top-0">Province</th>
                                        <th class="border-top-0">Municipality</th>
                                        <th>Barangay</th>
                                        <th>Street</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($resident->address_list as $address)
                                    <tr>
                                        <td></td>
                                        <td>{{ $address->region->abbreviation . ' - ' . $address->region->region_name }}
                                        </td>
                                        <td>{{ $address->province->province_name }}</td>
                                        <td>{{ $address->municipality->municipality_name }}</td>
                                        <td>{{ $address->barangay->barangay_name }}</td>
                                        <td>{{ $address->street }}</td>
                                        <td></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="7">No Data</th>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>