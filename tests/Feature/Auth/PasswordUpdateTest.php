<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

test('la contraseña se puede actualizar correctamente', function () {
    $user = Usuario::factory()->create([
        'contrasena' => Hash::make('admin123'),
    ]);

    $response = $this
        ->actingAs($user)
        ->from('/profile')
        ->put('/password', [
            'current_password' => 'admin123',
            'password' => 'nueva-clave',
            'password_confirmation' => 'nueva-clave',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $this->assertTrue(Hash::check('nueva-clave', $user->refresh()->contrasena));
});

test('debe proporcionarse la contraseña actual correcta para actualizar', function () {
    $user = Usuario::factory()->create([
        'contrasena' => Hash::make('admin123'),
    ]);

    $response = $this
        ->actingAs($user)
        ->from('/profile')
        ->put('/password', [
            'current_password' => 'clave-incorrecta',
            'password' => 'nueva-clave',
            'password_confirmation' => 'nueva-clave',
        ]);

    $response
        ->assertSessionHasErrors(['current_password'])
        ->assertRedirect('/profile');
});
