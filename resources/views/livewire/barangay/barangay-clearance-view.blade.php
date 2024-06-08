@section('page-title', 'Barangay Clearance')
<div>
    <!--  <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Resident's</h3>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <small class="fw-bolder text-muted">SEARCH RESIDENT'S</small>
                            <input type="text" wire:model="findResident" wire:keydown="auto"
                                class="form-control form-control-sm border border-primary"
                                placeholder="Search Pattern: Last Name, First Name">
                        </div>
                        @if ($filter)
                            <div class="form-group">
                                <small class="text-secondary ">GENDER</small>
                                <select wire:change="selectAddress" wire:model="filter.gender"
                                    class="form-select form-select-sm border border-primary">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">CIVIL STATUS</small>
                                <select wire:change="selectAddress" wire:model="filter.civil_status"
                                    class="form-select form-select-sm border border-primary">
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
                                    class="form-select form-select-sm border border-primary">
                                    <option selected>Select Group Name</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        @endif

                        @if (Auth::user()->user_role->role_id == 1)
                            <div class="form-group">
                                <small class="text-secondary ">REGION <span class="text-danger">*</span></small>
                                <select wire:change="selectAddress" wire:model="residents.region"
                                    class="form-select form-select-sm border border-primary">
                                    <option selected>Select Region</option>
                                    @foreach ($regionList as $region)
                                        <option value="{{ $region->id }}">
                                            {{ $region->abbreviation . ' - ' . $region->region_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('residents.region')
                                    <small
                                        class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">PROVINCE <span class="text-danger">*</span></small>
                                <select wire:model="residents.province" wire:change="selectAddress"
                                    class="form-select form-select-sm border border-primary">
                                    <option selected>Select Province</option>
                                    @forelse ($provinceList as $item)
                                        <option value="{{ $item->id }}">{{ $item->province_name }}</option>
                                    @empty
                                    @endforelse

                                </select>
                                @error('residents.province')
                                    <small
                                        class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">MUNICIPALITY / CITY <span
                                        class="text-danger">*</span></small>
                                <select wire:model="residents.municipality" wire:change="selectAddress"
                                    class="form-select form-select-sm border border-primary">
                                    <option selected>Select Municipality / City</option>
                                    @forelse ($municipalityList as $item)
                                        <option value="{{ $item->id }}">{{ $item->municipality_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('residents.municipality')
                                    <small
                                        class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <small class="text-secondary ">BARANGAY<span class="text-danger">*</span></small>
                                <select wire:model="residents.barangay" wire:change="selectAddress"
                                    class="form-select form-select-sm border border-primary">
                                    <option selected>Select Barangay</option>
                                    @forelse ($barangayList as $item)
                                        <option value="{{ $item->id }}">{{ $item->barangay_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('residents.barangay')
                                    <small
                                        class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif



                        {{-- @livewire('resident.add-resident-information') --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">RESULT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($findResident !== null)
                                    @if (count($findResidents) > 0)
                                        @foreach ($findResidents as $resident)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('barangay-clearance.view') . '?resident=' . base64_encode($resident->id) }}">
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $resident->profile() }}"
                                                                    class="avatar avatar-sm rounded-circle me-2"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center ms-1">
                                                                <h6 class="mb-0 text-sm font-weight-semibold">
                                                                    {{ $resident->first_name . ' ' . $resident->last_name }}
                                                                </h6>
                                                                <p class="text-sm text-secondary mb-0">
                                                                    {{ $resident->address->street }}</p>
                                                            </div>
                                                        </div>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th>
                                                <a href="{{ route('resident.add') }}">
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex align-items-center">

                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center ms-1">
                                                            <h6 class="mb-0 text-sm font-weight-semibold">
                                                                ADD RESIDENT
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </th>
                                        </tr>

                                    @endif
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <p class="display-6 fw-bolder text-primary">BARANGAY CLEARANCE</p>

                @if ($profile)
                    <div class="card mb-2">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                @if ($residentProfile)
                                    <img src="{{ $residentProfile->profile() }}" class="card-img" alt="resident-image">
                                @else
                                    <img src="{{ asset('assets/img/avatar.png') }}" class="card-img"
                                        alt="resident-image">
                                @endif

                            </div>
                            <div class="col-md ps-0">
                                <div class="card-body p-3 me-2">
                                    <label for="" class="fw-bolder text-primary h4">
                                        {{ $residentProfile ? strtoupper($residentProfile->complete_name()) : 'RESIDENT NAME' }}
                                    </label>
                                    <p class="mb-0">
                                        <small
                                            class="fw-bolder badge  border border-success text-success bg-success border-radius-sm mt-auto mb-2">
                                            {{ $residentProfile ? $residentProfile->complete_address() : 'ADDRESS' }}

                                        </small>
                                    </p>
                                    <p class="mb-0">
                                        <small
                                            class="fw-bolder badge  border border-success text-success bg-success border-radius-sm mt-auto mb-2">
                                            {{ $residentProfile ? $residentProfile->contact_number : ' CONTACT NUMBER' }}

                                        </small> -
                                        <small
                                            class="fw-bolder badge  border border-success text-success bg-success border-radius-sm mt-auto mb-2">
                                            {{ $residentProfile ? $residentProfile->birth_date : 'BIRTHDAY' }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="submitForm" method="post">
                                <label for="" class="fw-bolder text-info h4">CREATE BARANGAY CLEARANCE</label>
                                @error('formError')
                                    <div class="card bg-danger">
                                        <div class="card-body">
                                            <label for="" class="text-white">{{ $message }}</label>
                                        </div>
                                    </div>
                                @enderror
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-muted fw-bolder">
                                            {{ strtoupper('occupation') }}
                                            <span class="text-danger">*</span>
                                        </small>
                                        <input wire:model="clearance.occupation" type="text"
                                            class="form-control border border-info">
                                        @error('clearance.occupation')
                                            <small
                                                class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-muted fw-bolder">
                                            {{ strtoupper('length of residency') }}
                                            <span class="text-danger">*</span>
                                        </small>
                                        <input wire:model="clearance.length_of_residency" type="number"
                                            class="form-control border border-info">
                                        @error('clearance.length_of_residency')
                                            <small
                                                class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-muted fw-bolder">
                                            PROPOSE
                                            <span class="text-danger">*</span>
                                        </small>
                                        <select wire:model="clearance.propose" class="form-select border border-info">
                                            <option selected>Select Propose</option>
                                            <option value="Employment">Employment</option>
                                            <option value="Business Permit">Business Permit</option>
                                            <option value="Travel">Travel</option>
                                            <option value="School Requirement">School Requirement</option>
                                        </select>
                                        @error('clearance.propose')
                                            <small
                                                class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <label for=""
                                    class="fw-bolder text-info h6">{{ strtoupper('Identification Details') }}</label>
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-muted fw-bolder">
                                            {{ strtoupper('id type') }}
                                            <span class="text-danger">*</span>
                                        </small>
                                        <select wire:model="clearance.identification_id_type"
                                            class="form-select border border-info">
                                            <option selected>Select Id Type</option>
                                            <option value="Driver’s License">Driver’s License</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Voter’s ID">Voter’s ID</option>
                                            <option value="National ID">National ID</option>
                                        </select>
                                        @error('clearance.identification_id_type')
                                            <small
                                                class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-muted fw-bolder">
                                            {{ strtoupper('issuing agency') }}
                                            <span class="text-danger">*</span>
                                        </small>
                                        <input wire:model="clearance.identification_issuing_agency" type="text"
                                            class="form-control border border-info">
                                        @error('clearance.identification_issuing_agency')
                                            <small
                                                class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12">
                                        <small class="text-muted fw-bolder">
                                            {{ strtoupper('id number') }}
                                            <span class="text-danger">*</span>
                                        </small>
                                        <input wire:model="clearance.identification_id_number" type="text"
                                            class="form-control border border-info">
                                        @error('clearance.identification_id_number')
                                            <small
                                                class="badge border border-danger text-danger bg-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info w-100 mt-2">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header m-0">
                            <label for="" class="text-header h6 text-info">
                                HISTORY OF BARANGAY
                                CLEARANCE ISSUED</label>

                            <button class="btn btn-outline-info btn-sm float-end">ADD BARANGAY CLEARANCE</button>
                        </div>
                        <div class="card-body m-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">DATE OF
                                                ISSUE</th>
                                            {{-- <th class="text-secondary text-xs font-weight-semibold opacity-7">ADDRESS</th> --}}
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                PROPOSE
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($residentProfile)
                                            @if (count($residentProfile->barangay_clearance_issued))
                                                @foreach ($residentProfile->barangay_clearance_issued as $issued)
                                                    <tr>
                                                        <td>
                                                            {{ strtoupper($issued->created_at->format('F d,Y')) }}
                                                        </td>
                                                        <td>
                                                            {{ strtoupper($issued->propose) }}
                                                        </td>
                                                        <td>
                                                            <a target="_blank"
                                                                href="{{ route('report.barangay-clearance') . '?bc=' . base64_encode($issued->id) }}"
                                                                class="btn btn-outline-success btn-sm">PRINT</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3">NO ISSUED</td>
                                                </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            <label for="" class="text-header fw-bolder h4 text-info">LIST OF ISSUED BARANGAY
                                CLEARANCE</label>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">NAME</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            PROPOSE
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">DATE
                                            ISSUED</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            ACTION</th>
                                    </thead>
                                    <tbody>
                                        @if ($barangayClearanceList)
                                            @if (count($barangayClearanceList))
                                                @foreach ($barangayClearanceList as $issued)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="../assets/img/team-2.jpg"
                                                                        class="avatar avatar-sm rounded-circle me-2"
                                                                        alt="user1">
                                                                </div>
                                                                <div
                                                                    class="d-flex flex-column justify-content-center ms-1">
                                                                    <h6 class="mb-0 text-sm font-weight-semibold">
                                                                        {{ $issued->resident->complete_name() }}
                                                                    </h6>
                                                                    <p class="text-sm text-secondary mb-0">
                                                                        {{ $issued->resident->address->street }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ strtoupper($issued->created_at->format('F d,Y')) }}
                                                        </td>
                                                        <td>
                                                            {{ strtoupper($issued->propose) }}
                                                        </td>
                                                        <td>
                                                            <a target="_blank"
                                                                href="{{ route('report.barangay-clearance') . '?bc=' . base64_encode($issued->id) }}"
                                                                class="btn btn-outline-success btn-sm">PRINT</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3">NO ISSUED</td>
                                                </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{--  <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">NAME</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                PROPOSE
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">DATE
                                                ISSUED</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/img/team-2.jpg"
                                                            class="avatar avatar-sm rounded-circle me-2"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">John Michael</h6>
                                                        <p class="text-sm text-secondary mb-0">john@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Manager</p>
                                                <p class="text-sm text-secondary mb-0">Organization</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/img/team-3.jpg"
                                                            class="avatar avatar-sm rounded-circle me-2"
                                                            alt="user2">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">Alexa Liras</h6>
                                                        <p class="text-sm text-secondary mb-0">alexa@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Programator</p>
                                                <p class="text-sm text-secondary mb-0">Developer</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/img/team-1.jpg"
                                                            class="avatar avatar-sm rounded-circle me-2"
                                                            alt="user3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">Laurent Perrier
                                                        </h6>
                                                        <p class="text-sm text-secondary mb-0">laurent@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Executive</p>
                                                <p class="text-sm text-secondary mb-0">Projects</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/img/marie.jpg"
                                                            class="avatar avatar-sm rounded-circle me-2"
                                                            alt="user4">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">Michael Levi</h6>
                                                        <p class="text-sm text-secondary mb-0">michael@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Programator</p>
                                                <p class="text-sm text-secondary mb-0">Developer</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/img/team-5.jpg"
                                                            class="avatar avatar-sm rounded-circle me-2"
                                                            alt="user5">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">Richard Gran</h6>
                                                        <p class="text-sm text-secondary mb-0">richard@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Manager</p>
                                                <p class="text-sm text-secondary mb-0">Executive</p>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../assets/img/team-6.jpg"
                                                            class="avatar avatar-sm rounded-circle me-2"
                                                            alt="user6">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">Miriam Eric</h6>
                                                        <p class="text-sm text-secondary mb-0">miriam@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Programtor</p>
                                                <p class="text-sm text-secondary mb-0">Developer</p>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>
