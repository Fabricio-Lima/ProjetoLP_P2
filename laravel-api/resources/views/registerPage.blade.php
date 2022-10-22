@extends("templates.formPage")
@section("titlePage")
    Registro
@endsection
{{-- Design ainda a melhorar: Responsividade, validadação formulario --}}
@section("content")
<div class="container">
    <form action="" onsubmit="register(event)" class="signin-form  container w-75 mb-2 ">
        <header class="text-center w-auto mb-3">
            <h1>Registrar</h1>
        </header>
        <div class="row ">
            <div class="col-12 col-md-6">
              <label for="CPF" class="font-weight-bold">CPF</label>
              <input type="text" name="CPF" class="form-control" placeholder="CPF" 
              aria-label="CPF" id="CPF" data-js="CPF">
            </div>
            <div class="col-12 col-md-6">
              <label for="RG" class="font-weight-bold">RG</label>
              <input type="text" id="RG" data-js="RG" name="RG" class="form-control" placeholder="RG" aria-label="Last name">
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12 col-md-6">
                <label for="Nome" class="font-weight-bold ">Nome</label>
              <input type="text" id="name" 
              name="name" data-js="Name"
              class="form-control" 
              placeholder="Nome" aria-label="full name">
            </div>
           
            <div class="col">
              <label for="Phone" class="font-weight-bold">Telefone</label>
              <input type="text" 
              class="form-control" 
              id="Phone" data-js="Phone"
              placeholder="(11) 9324-3223" 
              aria-label="Phone">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
              <label for="email" class="font-weight-bold">Email</label>
              
              <input type="email" id="email" 
              name="email" class="form-control" 
              placeholder="exemplo@gmail.com" 
              aria-label="First name"
                data-js="email">

            </div>

            <div class="col-12 col-md-6 mb-3">
              
              <label for="password" class="font-weight-bold">Senha: (mais de 4 caracteres)</label>
             
              <input type="password" 
              id="password" 
              class="form-control" 
              placeholder="*******" aria-label="password"
              data-js="password">

            </div>
        </div>
        <div class="d-flex justify-content-center  ">
            <button 
                type="submit" 
                class=" w-50 form-control btn btn-primary rounded submit px-3 container"
            >
                Cadastrar
            </button>
        </div> 
        <div class=" mt-3 d-flex justify-content-center ">
            <p>Já possui cadastro? <a href="/login"  class="font-weight-bold">Login</a></p>
        </div>
    </form>
 
</div>    

<script src="/js/register.js"></script>

@endsection