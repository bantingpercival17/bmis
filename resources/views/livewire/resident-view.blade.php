@section('page-title', 'Residents')
<div>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Resident's</h3>
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
                            <input type="text" wire:model="searchInput" wire:keydown="auto"
                                class="form-control form-control-sm border border-primary"
                                placeholder="Search Pattern: Last Name, First Name">
                        </div>
                        <div class="form-group">
                            <small class="text-secondary ">GENDER</small>
                            <select wire:change="selectAddress" wire:model="filter.gender"
                                class="form-select border border-info">
                                <option selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <small class="text-secondary ">CIVIL STATUS</small>
                            <select wire:change="selectAddress" wire:model="filter.civil_status"
                                class="form-select border border-info">
                                <option selected>Select Civil Status</option>
                                <option value="single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <small class="text-secondary ">AGE GROUP NAME</small>
                            <select wire:change="selectAddress" wire:model="filter.age_group_name"
                                class="form-select border border-info">
                                <option selected>Select Group Name</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        @if (Auth::user()->user_role->role_id == 1)
                            <div class="form-group">
                                <small class="text-secondary ">REGION <span class="text-danger">*</span></small>
                                <select wire:change="selectAddress" wire:model="residents.region"
                                    class="form-select border border-info">
                                    <option selected>Select Region</option>
                                    @foreach ($regionList as $region)
                                        <option value="{{ $region->id }}">
                                            {{ $region->abbreviation . ' - ' . $region->region_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('residents.region')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">PROVINCE <span class="text-danger">*</span></small>
                                <select wire:model="residents.province" wire:change="selectAddress"
                                    class="form-select border border-info">
                                    <option selected>Select Province</option>
                                    @forelse ($provinceList as $item)
                                        <option value="{{ $item->id }}">{{ $item->province_name }}</option>
                                    @empty
                                    @endforelse

                                </select>
                                @error('residents.province')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">MUNICIPALITY / CITY <span
                                        class="text-danger">*</span></small>
                                <select wire:model="residents.municipality" wire:change="selectAddress"
                                    class="form-select border border-info">
                                    <option selected>Select Municipality / City</option>
                                    @forelse ($municipalityList as $item)
                                        <option value="{{ $item->id }}">{{ $item->municipality_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('residents.municipality')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">BARANGAY<span class="text-danger">*</span></small>
                                <select wire:model="residents.barangay" wire:change="selectAddress"
                                    class="form-select border border-info">
                                    <option selected>Select Barangay</option>
                                    @forelse ($barangayList as $item)
                                        <option value="{{ $item->id }}">{{ $item->barangay_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('residents.barangay')
                                    <small class="badge bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif



                        {{-- @livewire('resident.add-resident-information') --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <span class="h3 fw-bolder text-primary">Residents List</span>
                        <a href="{{ route('resident.add') }}" class="btn btn-primary float-end">Add Resident's</a>
                        <!--   <button class="btn btn-info float-end" wire:click="generateFakeData">GENERATE FAKE
                            RESIDENT</button> -->
                    </div>
                    <div class="card-body">
                        <div class="form-group text-end">
                            <label for="" class="text-muted fw-bolder">Result: <span
                                    class="text-info fw-bolder">{{ count($residentLists) }}</span></label>
                        </div>
                        <div class="table-responsive">
                            <table class="table stylish-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" colspan="2">Full Name</th>
                                        <th class="border-top-0">Birthday</th>
                                        <th class="border-top-0">Civil Status</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($residentLists as $resident)
                                        <tr>
                                            <td style="width:50px;"><span
                                                    class="round">{{ $resident->first_name[0] }}</span></td>
                                            <td class="align-middle">
                                                <h6>{{ $resident->first_name . ' ' . $resident->last_name }}</h6>
                                                {{-- <small class="text-muted">Newly Elected</small> --}}
                                            </td>
                                            <td class="align-middle">{{ $resident->birth_date }}</td>
                                            <td class="align-middle">{{ $resident->civil_status }}</td>
                                            <td class="align-middle">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <a href="{{ route('resident.view', base64_encode($resident->id)) }}"
                                                            class="btn btn-primary">View</a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="5">No Data</th>
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
