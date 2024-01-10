<div>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Create Incident Record Report</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form wire:submit.prevent="submitForm" method="post" class="mt-2">
            <div class="card  border border-soft-info">
                <div class="card-header bg-white">
                    <span class="text-info fw-bolder h3"><b>A. IMPORMASYON NG NAGREREKLAMO

                        </b></span>
                    <br>
                    <small>(REPORTING PERSON DATA)</small>
                </div>
                <div class="card-body">
                    @error('formError')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="row">
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">LAST NAME <span class="text-danger">*</span></small>
                            <input wire:model="residents.last_name" type="text"
                                class="form-control border border-info">
                            @error('residents.last_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">FIRST NAME <span class="text-danger">*</span></small>
                            <input wire:model="residents.first_name" type="text"
                                class="form-control border border-info">
                            @error('residents.first_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">MIDDLE NAME</small>
                            <input wire:model="residents.middle_name" type="text"
                                class="form-control border border-info">
                            @error('residents.middle_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">EXTENSION NAME </small>
                            <input wire:model="residents.extension_name" type="text"
                                class="form-control border border-info">
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
                            <input wire:model="residents.birth_date" type="date"
                                class="form-control border border-info">
                            @error('residents.birth_date')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <small class="text-secondary ">BIRTH PLACE <span class="text-danger">*</span></small>
                            <input wire:model="residents.birth_place" type="text"
                                class="form-control border border-info">
                            @error('residents.birth_place')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <small class="text-secondary ">CONTACT NUMBER</small>
                            <input wire:model="residents.contact_number" type="text"
                                class="form-control border border-info">
                            @error('residents.contact_number')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <label class="h5 text-muted">PERMANENT ADDRESS</label>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-8 col-md-12">
                            <small class="text-secondary ">STREET NUMBER / BDLG NO.</small>
                            <input wire:model="residents.street" type="text"
                                class="form-control border border-info">
                            @error('residents.street')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
            </div>
            <div class="card  border border-soft-info">
                <div class="card-header bg-white">
                    <span class="text-info fw-bolder h3">
                        <b>B. IMPORMASYON NG SUSPEK</b>
                    </span>
                    <br>
                    <small>(SUSPECT DATA)</small>
                </div>
                <div class="card-body">
                    @error('formError')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="row">
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">LAST NAME <span class="text-danger">*</span></small>
                            <input wire:model="residents.last_name" type="text"
                                class="form-control border border-info">
                            @error('residents.last_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">FIRST NAME <span class="text-danger">*</span></small>
                            <input wire:model="residents.first_name" type="text"
                                class="form-control border border-info">
                            @error('residents.first_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">MIDDLE NAME</small>
                            <input wire:model="residents.middle_name" type="text"
                                class="form-control border border-info">
                            @error('residents.middle_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">EXTENSION NAME </small>
                            <input wire:model="residents.extension_name" type="text"
                                class="form-control border border-info">
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
                            <input wire:model="residents.birth_date" type="date"
                                class="form-control border border-info">
                            @error('residents.birth_date')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <small class="text-secondary ">BIRTH PLACE <span class="text-danger">*</span></small>
                            <input wire:model="residents.birth_place" type="text"
                                class="form-control border border-info">
                            @error('residents.birth_place')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <small class="text-secondary ">CONTACT NUMBER</small>
                            <input wire:model="residents.contact_number" type="text"
                                class="form-control border border-info">
                            @error('residents.contact_number')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <label class="h5 text-muted">PERMANENT ADDRESS</label>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-8 col-md-12">
                            <small class="text-secondary ">STREET NUMBER / BDLG NO.</small>
                            <input wire:model="residents.street" type="text"
                                class="form-control border border-info">
                            @error('residents.street')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
            </div>
            <div class="card  border border-soft-info">
                <div class="card-header bg-white">
                    <span class="text-info fw-bolder h3">
                        <b> C. IMPORMASYON NG BIKTIMA</b>
                    </span>
                    <br>
                    <small>(VICTIM DATA)</small>
                </div>
                <div class="card-body">
                    @error('formError')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="row">
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">LAST NAME <span class="text-danger">*</span></small>
                            <input wire:model="residents.last_name" type="text"
                                class="form-control border border-info">
                            @error('residents.last_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">FIRST NAME <span class="text-danger">*</span></small>
                            <input wire:model="residents.first_name" type="text"
                                class="form-control border border-info">
                            @error('residents.first_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">MIDDLE NAME</small>
                            <input wire:model="residents.middle_name" type="text"
                                class="form-control border border-info">
                            @error('residents.middle_name')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-12">
                            <small class="text-secondary ">EXTENSION NAME </small>
                            <input wire:model="residents.extension_name" type="text"
                                class="form-control border border-info">
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
                            <input wire:model="residents.birth_date" type="date"
                                class="form-control border border-info">
                            @error('residents.birth_date')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <small class="text-secondary ">BIRTH PLACE <span class="text-danger">*</span></small>
                            <input wire:model="residents.birth_place" type="text"
                                class="form-control border border-info">
                            @error('residents.birth_place')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <small class="text-secondary ">CONTACT NUMBER</small>
                            <input wire:model="residents.contact_number" type="text"
                                class="form-control border border-info">
                            @error('residents.contact_number')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <label class="h5 text-muted">PERMANENT ADDRESS</label>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-4 col-md-12">
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
                        <div class="form-group col-lg-8 col-md-12">
                            <small class="text-secondary ">STREET NUMBER / BDLG NO.</small>
                            <input wire:model="residents.street" type="text"
                                class="form-control border border-info">
                            @error('residents.street')
                                <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                </div>
            </div>
            <button type="submit" class="btn btn-info text-white w-100">SUBMIT</button>
        </form>
    </div>

</div>
