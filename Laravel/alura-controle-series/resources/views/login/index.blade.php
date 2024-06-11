<x-layout title="Login">
    <form method="post">
        @csrf

        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email" class="form-control">

        <label for="password" class="form-label">Senha</label>
        <input type="password" name="password" id="password" class="form-control">

        <button type="submit" class="btn btn-primary mt-2 mb-2">Entrar</button>
    </form>
</x-layout>