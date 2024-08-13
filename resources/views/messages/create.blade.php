<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mensaje - Nutribite</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://use.typekit.net/apl6lau.css">
</head>
<body>
    <header class="sticky">
        <!-- Puedes incluir aquí un componente de header si lo tienes -->
        @include('partials.header')
    </header>

    <main>
        <div class="container">
            <h2>Enviar un nuevo mensaje</h2>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('messages.store') }}" id="message-form">
                @csrf
                <div class="form-group">
                    <label for="content">Mensaje:</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required minlength="10">{{ old('content') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                <a href="{{ route('messages.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </main>

    <footer>
        <!-- Puedes incluir aquí un componente de footer si lo tienes -->
        @include('partials.footer')
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.getElementById('message-form').addEventListener('submit', function(e) {
            var content = document.getElementById('content').value;
            if (content.length < 10) {
                e.preventDefault();
                alert('El mensaje debe tener al menos 10 caracteres.');
            }
        });
    </script>
</body>
</html>
