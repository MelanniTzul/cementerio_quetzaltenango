<?php
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

test('la pantalla de confirmación de contraseña se puede renderizar', function () {
    $usuario = Usuario::factory()->create([
        'contrasena' => Hash::make('admin123'),
    ]);

    $response = $this->actingAs($usuario)->get('/confirm-password');

    $response->assertStatus(200);
});

test('la contraseña se puede confirmar', function () {
    $usuario = Usuario::factory()->create([
        'contrasena' => Hash::make('admin123'),
    ]);

    $response = $this->actingAs($usuario)->post('/confirm-password', [
        'password' => 'admin123',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('no se confirma con una contraseña incorrecta', function () {
    $usuario = Usuario::factory()->create([
        'contrasena' => Hash::make('admin123'),
    ]);

    $response = $this->actingAs($usuario)->post('/confirm-password', [
        'password' => 'incorrecta',
    ]);

    $response->assertSessionHasErrors();
});
