<?php
test('registration screen can be rendered', function () {
    $response = $this->get('/register');
    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'nombre' => 'Melanni',
        'apellido' => 'Tzul',
        'correo' => 'melannitzul@example.com',
        'dpi' => '1234567890101',
        'contrasena' => 'admin123',
        'contrasena_confirmation' => 'admin123',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

