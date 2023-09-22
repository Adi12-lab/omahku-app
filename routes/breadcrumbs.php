<?php
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Agent;
use App\Models\Product;
use App\Models\Property;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Blog
Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Registrasi', route('register'));
});
Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Login', route('register'));
});
Breadcrumbs::for("property", function(BreadcrumbTrail $trail) {
    $trail->parent("/");
    $trail->push("Daftar Properti", route("frontend.property.index"));
});

Breadcrumbs::for("propertyView", function(BreadcrumbTrail $trail, Property $property ) {
    $trail->parent("property");
    $trail->push($property->name, route("frontend.property.view", $property->slug));
});

Breadcrumbs::for("wishlist", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
    $trail->push("Favorit", route("wishlist"));
});

Breadcrumbs::for("profile", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
    $trail->push("Profil Saya", route("frontend.profile"));
});

Breadcrumbs::for("agent", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
$trail->push("Agent Kami", route("frontend.agent"));
});

Breadcrumbs::for("agentDetails", function(BreadcrumbTrail $trail, Agent $agent ) {
    $trail->parent("agent");
$trail->push($agent->name, route("frontend.agent.view", $agent->id));
});

Breadcrumbs::for("contact", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
$trail->push("Hubungi Kami", route("frontend.contact"));
});
