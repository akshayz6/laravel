<?php

use Illuminate\Support\Facades\Route;

Route::get('/planeten', function () {
    $planeten = ["Uranus", "Jupiter", "Mars", "Aarde", "Saturnus", "Pluto", "Neptunus", "Venus"];
    return response()->json($planeten);
});


use Illuminate\Support\Facades\Route;

Route::get('/planets', function () {
    $planets = [
        [
            'name' => 'Mars',
            'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
        ],
        [
            'name' => 'Venus',
            'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
        ],
        [
            'name' => 'Earth',
            'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far that\'s inhabited by living things.'
        ],
        [
            'name' => 'Jupiter',
            'description' => 'Jupiter is a gas giant and doesn\'t have a solid surface, but it may have a solid inner core about the size of Earth.'
        ],
    ];
    
    return view('planets', ['planets' => $planets]);
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/planets', function () {
    $planets = collect([
        [
            'name' => 'Mars',
            'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
        ],
        [
            'name' => 'Venus',
            'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
        ],
        [
            'name' => 'Earth',
            'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far that\'s inhabited by living things.'
        ],
        [
            'name' => 'Jupiter',
            'description' => 'Jupiter is a gas giant and doesn\'t have a solid surface, but it may have a solid inner core about the size of Earth.'
        ],
    ]);

    $planetName = request('planet');

    if ($planetName) {
        $planets = $planets->filter(function ($planet) use ($planetName) {
            return strtolower($planet['name']) === strtolower($planetName);
        });
    }

    return view('planets', ['planets' => $planets->values()->all()]);
});




<?php

use Illuminate\Support\Facades\Route;

$planets = [
    [
        'name' => 'Mars',
        'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
    ],
    [
        'name' => 'Venus',
        'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
    ],
    [
        'name' => 'Earth',
        'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far that\'s inhabited by living things.'
    ],
    [
        'name' => 'Jupiter',
        'description' => 'Jupiter is a gas giant and doesn\'t have a solid surface, but it may have a solid inner core about the size of Earth.'
    ],
];

// Route voor het totaaloverzicht van alle planeten
Route::get('/planets', function () use ($planets) {
    return view('planets', ['planets' => $planets]);
});

// Route voor de details van een specifieke planeet
Route::get('/planets/{planet}', function ($planet) use ($planets) {
    $planetDetails = collect($planets)->firstWhere('name', ucfirst($planet));

    if (!$planetDetails) {
        abort(404, 'Planet not found');
    }

    return view('planet', ['planet' => $planetDetails]);
});
