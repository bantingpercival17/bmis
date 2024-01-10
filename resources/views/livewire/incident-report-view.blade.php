<div>
    <div>
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Incident Report's</h3>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <small class="fw-bolder text-muted">Search Cases</small>
                                <input type="text" wire:model="searchInput" wire:keydown="auto"
                                    class="form-control form-control-sm border border-primary"
                                    placeholder="Search Pattern: Last Name, First Name">
                            </div>
                            <a href="{{ route('incident-report.add') }}" class="btn btn-primary">Make Incident Report</a>
                            {{-- @livewire('resident.add-resident-information') --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-header bg-white">
                            <span class="h3 fw-bolder text-primary">List of Incident Report</span>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table stylish-table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" colspan="2">Date of Incident</th>
                                            <th class="border-top-0" colspan="2">Type of Incident</th>
                                            <th class="border-top-0">Suspect Name</th>
                                            <th class="border-top-0">Victime Name</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataList as $resident)
                                            <tr>
                                                <td style="width:50px;"><span
                                                        class="round">{{ $resident->first_name[0] }}</span></td>
                                                <td class="align-middle">
                                                    <h6>{{ $resident->first_name . ' ' . $resident->last_name }}</h6>
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
</div>

