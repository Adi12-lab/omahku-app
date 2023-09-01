<?php
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Product;
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
// Breadcrumbs::for("produkview", function(BreadcrumbTrail $trail, Product $product ) {
//     $trail->parent("produk");
//     $trail->push($product->name, route("frontend.product.view", $product->slug));
// });

Breadcrumbs::for("wishlist", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
    $trail->push("Favorit", route("wishlist"));
});
Breadcrumbs::for("cart", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
    $trail->push("Keranjang", route("cart"));
});
Breadcrumbs::for("profil", function(BreadcrumbTrail $trail ) {
    $trail->parent("/");
    $trail->push("Profil Saya", route("profil"));
});
