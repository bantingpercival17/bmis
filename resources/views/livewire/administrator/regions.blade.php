@section('page-title', 'Regions')
<div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <p class="display-6 fw-bolder text-info">REGIONS</p>

                <div class="card">
                    <div class="card-header">
                        {{--  <div class="form-group">
                            <small class="fw-bolder text-muted">SEARCH LOCATION</small>
                            <input type="text" wire:model="findLocation" wire:keydown="auto"
                                class="form-control form-control-sm border border-primary"
                                placeholder="Search Pattern: Last Name, First Name">
                        </div> --}}
                        @if ($alertMessage)
                            <div
                                class="mt-4 p-4 radius radius-5 {{ $alertMessage[0] === 200 ? 'bg-success' : 'bg-danger' }} text-white">
                                {{ $alertMessage['message'] }}

                                <span class="float-end text-info" wire:click="closeAlert">CLOSE</span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">

                                    <th class="text-secondary text-xs font-weight-semibold opacity-7">REGION</th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                        REGION NAME
                                    </th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                        TOTAL UPLOADED MUNICIPALITIES
                                    </th>
                                    <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                        ACTION</th>
                                </thead>
                                <tbody>
                                    @if ($regionList)
                                        @if (count($regionList))
                                            @foreach ($regionList as $region)
                                                <tr>

                                                    <td>
                                                        <p class="text-sm text-info mb-0">
                                                            {{ $region->regionName }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-info mb-0">
                                                            {{ $region->name }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->check_region($region->code))
                                                            <a href="{{ route('province.view') . '?rCode=' . base64_encode($region->code) }}"
                                                                class="btn btn-sm btn-info">VIEW PROVINCE</a>
                                                        @else
                                                            <button class="btn btn-sm btn-success"
                                                                wire:click="storeRegion('{{ $region->code }}')">
                                                                STORE REGION
                                                            </button>
                                                        @endif
                                                        {{-- <a target="_blank"
                                                            href="{{ route('report.barangay-clearance') . '?bc=' . base64_encode($issued->id) }}"
                                                            class="btn btn-outline-success btn-sm">PRINT</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">NO CONTENT</td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
