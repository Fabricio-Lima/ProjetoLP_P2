@extends("templates.formPage")
@section("titlePage")
    Registro
@endsection
{{-- Design ainda a melhorar: Responsividade, validadação formulario --}}
@section("content")
<div class="container">
    <form action="" onsubmit="teste(event)" class="signin-form  container w-75 mb-2 ">
        <header class="text-center w-auto mb-3">
            <h1>Registrar</h1>
        </header>
        <div class="row ">
            <div class="col">
              <label for="CPF" class="font-weight-bold">CPF</label>
              <input type="text" name="CPF" class="form-control" placeholder="CPF" 
              aria-label="CPF" id="CPF">
            </div>
            <div class="col">
              <label for="RG" class="font-weight-bold">RG</label>
              <input type="text" id="RG" name="RG" class="form-control" placeholder="RG" aria-label="Last name">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="Nome" class="font-weight-bold">Nome</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Nome" aria-label="full name">
            </div>
            <div class="col">
              <label for="Telefone" class="font-weight-bold">Telefone</label>
              <input type="text" class="form-control" placeholder="(11) 9324-3223" aria-label="Telefone">
            </div>
        </div>
        <div class="row">
            <div class="col">
              <label for="email" class="font-weight-bold">Email</label>
              <input type="email" id="email" name="email" class="form-control" 
              placeholder="exemplo@gmail.com" aria-label="First name">
            </div>
            <div class="col mb-3">
              <label for="password" class="font-weight-bold">Senha</label>
              <input type="password" class="form-control" placeholder="*****" aria-label="password">
            </div>
        </div>
        <div class="d-flex justify-content-center ">
            <button 
                type="submit" 
                class=" w-50 form-control btn btn-primary rounded submit px-3 container"
            >
                Cadastrar
            </button>
        </div> 
        <div class=" d-flex justify-content-center ">
            <a href="/login" class="w-50  btn btn-secondary rounded submit px-3 container mt-3 ">
                Login
            </a>
        </div>
    </form>
 
</div>    


@endsection