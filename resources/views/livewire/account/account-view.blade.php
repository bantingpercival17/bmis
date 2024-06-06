@section('page-title', "ACCOUNT'S")
<div>
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">ACCOUNTS LIST</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <small class="fw-bolder text-muted">SEARCH ACCOUNTS / USER</small>
                            <input type="text" wire:model="searchInput" wire:keydown="auto" class="form-control form-control-sm border border-primary" placeholder="Search Pattern: Last Name, First Name">
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <small class="text-secondary ">PROVINCE <span class="text-danger">*</span></small>
                            <select wire:model="address.province" wire:change="selectAddress" class="form-select border border-info">
                                <option selected>Select Province</option>
                                @forelse ($provinceList as $item)
                                <option value="{{ $item->id }}">{{ $item->province_name }}</option>
                                @empty
                                @endforelse

                            </select>
                            @error('address.province')
                            <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <small class="text-secondary ">MUNICIPALITY / CITY <span class="text-danger">*</span></small>
                            <select wire:model="address.municipality" wire:change="selectAddress" class="form-select border border-info">
                                <option selected>Select Municipality / City</option>
                                @forelse ($municipalityList as $item)
                                <option value="{{ $item->id }}">{{ $item->municipality_name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('address.municipality')
                            <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <small class="text-secondary ">BARANGAY<span class="text-danger">*</span></small>
                            <select wire:model="address.barangay" wire:change="selectAddress" class="form-select border border-info">
                                <option selected>Select Barangay</option>
                                @forelse ($barangayList as $item)
                                <option value="{{ $item->id }}">{{ $item->barangay_name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('address.barangay')
                            <small class="badge bg-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- {{json_encode($residents) }} --}}
                        {{-- @livewire('resident.add-resident-information') --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <span class="h3 fw-bolder text-info">DATA LIST</span>
                        <a href="{{ route('account.create') }}" class="btn btn-info float-end">Create Account</a>
                        {{-- <button class="btn btn-info float-end" wire:click="generateFakeData">GENERATE FAKE
                            RESIDENT</button> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table stylish-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" colspan="2">ACCOUNT NAME</th>
                                        <th class="border-top-0">ADDRESS</th>
                                        <th class="border-top-0">USER ROLE</th>
                                        <th class="border-top-0">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accountLists as $account)
                                    <tr>
                                        <td style="width:50px;"><span class="round">{{ $account->name[0] }}</span></td>
                                        <td class="align-middle">
                                            <h6>{{ $account->name }}</h6>
                                            {{-- <small class="text-muted">Newly Elected</small> --}}
                                        </td>
                                        <td class="align-middle">{{$account->email}}</td>
                                        <td class="align-middle">{{ $account->user_role->role->display_name}}</td>

                                        <td class="align-middle">
                                            <div class="row">
                                                <div class="col-md">
                                                    <a href="{{ route('resident.view', base64_encode($account->id)) }}" class="btn btn-primary">View</a>
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