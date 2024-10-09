<?php

use App\Models\Product;
use App\Models\User;

it('lala', function () {
  Product::factory(10)->create();

  $user = User::factory()->create();
  


  $response = $this->actingAs($user)->get(route('products.index'));

  $response->assertStatus(200);
  $response->assertJsonCount('products', 10);
})->only();


test('lolo', function() {

});