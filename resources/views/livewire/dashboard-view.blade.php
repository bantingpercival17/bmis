@section('page-title', 'Dashboard')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <div class="mb-md-0 mb-3">
                    <h3 class="font-weight-bold mb-0">Welcome to {{ $barangay->barangay_name }}</h3>
                    <small class="fw-bolder text-primary">{{ $address }}</small>
                    <p class="mb-0 font-weight-bold">Good day {{ Auth::user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-0">
    <div class="row mt-3">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md">
                    <div class="card shadow-xs border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 pe-1">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="80" width="80"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z">
                                            </path>
                                        </svg>
                                    </div>

                                    <div class="chart">
                                        {{-- <canvas id="chart-doughnut-info" class="chart-canvas" height="150"
                                            style="display: block; box-sizing: border-box; height: 150px; width: 144px;"
                                            width="144"></canvas> --}}
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex">
                                        <div>
                                            <h4 class="font-weight-semibold text-lg">TOTAL RESIDENTS</h4>
                                            {{-- <p class="text-sm mb-1">Current Balance</p> --}}
                                            <h3 class="mb-0 font-weight-bold float-end">
                                                {{ count($barangay->total_residents) }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card shadow-xs border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 pe-1">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="80" width="80"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex">
                                        <div>
                                            <h4 class="font-weight-semibold text-lg">TOTAL PWD</h4>
                                            {{-- <p class="text-sm mb-1">Current Balance</p> --}}
                                            <h3 class="mb-0 font-weight-bold float-end">
                                                5
                                                {{-- {{ count($barangay->total_residents) }} --}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-info fw-bolder h4">TRANSACTION</p>
            <div class="row">
                <div class="col-md">
                    <div class="card shadow-xs border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 pe-1">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="80" width="80"
                                            viewBox="0 0 18 18" fill="currentColor">
                                            <title>file content</title>
                                            <g>
                                                <path
                                                    d="M15.487,5.427l-3.914-3.914c-.331-.331-.77-.513-1.237-.513H4.75c-1.517,0-2.75,1.233-2.75,2.75V14.25c0,1.517,1.233,2.75,2.75,2.75H13.25c1.517,0,2.75-1.233,2.75-2.75V6.664c0-.467-.182-.907-.513-1.237Zm-9.737,.573h2c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75h-2c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75Zm6.5,7.5H5.75c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h6.5c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Zm0-3H5.75c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h6.5c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Zm2.182-4h-2.932c-.55,0-1-.45-1-1V2.579l.013-.005,3.922,3.921-.002,.005Z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex">
                                        <div>
                                            <h4 class="font-weight-semibold text-lg">BARANGAY CLEARANCE</h4>
                                            {{-- <p class="text-sm mb-1">Current Balance</p> --}}
                                            <h3 class="mb-0 font-weight-bold float-end">
                                                {{ count($barangay->barangay_clearance_issued()) }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card shadow-xs border mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 pe-1">
                                    <div class="text-center">
                                        <svg width="80" height="80" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                                clip-rule="evenodd"></path>
                                            <path
                                                d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex">
                                        <div>
                                            <h4 class="font-weight-semibold text-lg">BUSINESS PERMITS</h4>
                                            <h3 class="mb-0 font-weight-bold float-end">
                                                0
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="barangay-map">
                <label for="" class="fw-bolder text-info h4">BARANGAY MAP</label>
                <iframe style="width: 100%; height:100%"
                    src="https://www.openstreetmap.org/export/embed.html?bbox={{ $bbox }}&layer=mapnik&marker={{ $marker }}">
                </iframe>
            </div>
            <div class="barangay-officails">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">BARANGAY OFFICAILS</h6>
                                <p class="text-sm">See information about all members</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">NAME</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">POSITION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangayOfficials as $official)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $official['image'] }}"
                                                            class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">
                                                            {{ $official['name'] }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">
                                                    {{ $official['position'] }}</p>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
