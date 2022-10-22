@extends("templates.formPage")

@section("titlePage")
    Login
@endsection
@section("content")
    <div class="container">
        <form action="" onsubmit="teste(event)" class="signin-form  container w-75">
            <header class="text-center w-auto">
                <h1>Login</h1>
            </header>
            <div class="form-group  has-validation my-4">
                <label for="email" class="font-weight-bold">E-mail</label>
                <input type="email" name="email" 
                placeholder="Digite seu email" 
                id="email"
                class="form-control " 
                />
                <div class="invalid-feedback">
                    <span>Digite seu email</span>
                </div>
            </div>
            <div class="form-group  has-validation mb-4">
                <label for="password" class=" font-weight-bold password-field">Password</label>
                <input type="password" 
                name="password"
                id="password" 
                placeholder="******"
                class="form-control"
                aria-describedby="passwordHelpInline">
             
                <div class="invalid-feedback">
                    <span>Digite a senha</span>
                </div>
            </div>
            
            <div class="form-group">
                <button 
                    type="submit" 
                    class="form-control btn btn-primary rounded submit px-3 container"
                >
                    Enviar
                </button>
            </div>
           
        </form>
        <p class="text-center">
            Nâo tem conta? <a href="/register">Se cadastrar</a>
        </p>
    </div>    
@endsection
