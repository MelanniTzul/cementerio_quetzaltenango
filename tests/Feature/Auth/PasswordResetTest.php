<?php

use App\Models\Usuario;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

test('la pantalla de solicitud de reinicio de contraseña se puede mostrar', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
});

test('se puede solicitar el enlace de restablecimiento de contraseña', function () {
    Notification::fake();

    $usuario = Usuario::factory()->create();

    $this->post('/forgot-password', ['correo' => $usuario->correo]);

    Notification::assertSentTo($usuario, ResetPassword::class);
});

test('la pantalla de restablecimiento de contraseña se puede mostrar con el token', function () {
    Notification::fake();

    $usuario = Usuario::factory()->create();

    $this->post('/forgot-password', ['correo' => $usuario->correo]);

    Notification::assertSentTo($usuario, ResetPassword::class, function ($notification) {
        $response = $this->get('/reset-password/' . $notification->token);
        $response->assertStatus(200);
        return true;
    });
});

test('se puede restablecer la contraseña con un token válido', function () {
    Notification::fake();

    $usuario = Usuario::factory()->create();

    $this->post('/forgot-password', ['correo' => $usuario->correo]);

    Notification::assertSentTo($usuario, ResetPassword::class, function ($notification) use ($usuario) {
        $response = $this->post('/reset-password', [
            'token' => $notification->token,
            'correo' => $usuario->correo,
            'password' => 'nueva-contrasena',
            'password_confirmation' => 'nueva-contrasena',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('login'));

        return true;
    });
});
