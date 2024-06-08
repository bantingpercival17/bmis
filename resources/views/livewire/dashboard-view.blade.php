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
                                                {{--  {{ count($barangay->total_residents) }} --}}
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
                    src="https://www.openstreetmap.org/export/embed.html?bbox=120.915591,14.9418958,120.925591,14.9618958&layer=mapnik&marker=14.9518958,120.925591">
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
                            {{-- <div class="ms-auto d-flex">
                                <button type="button" class="btn btn-sm btn-white me-2">
                                    View all
                                </button>
                                <button type="button"
                                    class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                    <span class="btn-inner--icon">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                            <path
                                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                        </svg>
                                    </span>
                                    <span class="btn-inner--text">Add member</span>
                                </button>
                            </div> --}}
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
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex align-items-center">
                                                    <img src="../assets/img/team-2.jpg"
                                                        class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">John Michael</h6>
                                                    <p class="text-sm text-secondary mb-0">john@creative-tim.com</p>
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
                                                        class="avatar avatar-sm rounded-circle me-2" alt="user2">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">Alexa Liras</h6>
                                                    <p class="text-sm text-secondary mb-0">alexa@creative-tim.com</p>
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
                                                        class="avatar avatar-sm rounded-circle me-2" alt="user3">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">Laurent Perrier</h6>
                                                    <p class="text-sm text-secondary mb-0">laurent@creative-tim.com</p>
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
                                                        class="avatar avatar-sm rounded-circle me-2" alt="user4">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">Michael Levi</h6>
                                                    <p class="text-sm text-secondary mb-0">michael@creative-tim.com</p>
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
                                                        class="avatar avatar-sm rounded-circle me-2" alt="user5">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">Richard Gran</h6>
                                                    <p class="text-sm text-secondary mb-0">richard@creative-tim.com</p>
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
                                                        class="avatar avatar-sm rounded-circle me-2" alt="user6">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center ms-1">
                                                    <h6 class="mb-0 text-sm font-weight-semibold">Miriam Eric</h6>
                                                    <p class="text-sm text-secondary mb-0">miriam@creative-tim.com</p>
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
                        </div>
                        {{--  <div class="border-top py-3 px-3 d-flex align-items-center">
                            <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 10</p>
                            <div class="ms-auto">
                                <button class="btn btn-sm btn-white mb-0">Previous</button>
                                <button class="btn btn-sm btn-white mb-0">Next</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
