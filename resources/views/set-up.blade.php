<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-ab22f6b7.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/style.min-04f119d7.css') }}">
    <script src="{{ asset('build/assets/app-ddee773b.js') }}"></script>


</head>

<body>
    <div class="main-wrapper">
        <div class="contanier-fluid">
            <div class="card">
                <div class="card-header bg-white">
                    <span class="h3 fw-bolder text-primary">Regions</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table stylish-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Regions</th>
                                    <th class="border-top-0">Provinces</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($regions as $region)
                                    <tr>
                                        <td><span
                                                class="text-primary">{{ $region->region_name . ' - ' . $region->abbreviation }}</span>
                                        </td>
                                        <td class="align-middle">

                                        </td>
                                        <td class="align-middle">
                                            @if (count($region->provinces) == 0)
                                                <a href="{{ route('set-up.provinces') }}?region={{ $region->region_sort }}"
                                                    class="badge bg-info">Get
                                                    Provinces</a>
                                            @endif
                                            <a href="" class="badge bg-primary">View</a>
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="3">No Data</th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
