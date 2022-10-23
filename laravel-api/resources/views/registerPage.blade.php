@extends("templates.formPage")
@section("titlePage")
    Registro
@endsection
@section("content")
<div class="container">
    <form action="" onsubmit="register(event)" class="signin-form  container w-75 mb-2 ">
        <header class="text-center w-auto ">
            <h1>Registrar</h1>
        </header>
        <div class="row">
            <div class="col-12 col-md-6">
              <label for="CPF" class="font-weight-bold">CPF: *</label>

              <div class="input-group has-validation">
                <input type="text" name="CPF" class="form-control" 
                placeholder="000.000.000-00" 
                aria-label="CPF" id="CPF" data-js="CPF">
              
                <div class="invalid-feedback">
                  <span> Informe um numero de CPF Valído</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 my-2 my-md-0">
              <label for="RG" class="font-weight-bold">RG: *</label>
              <div class="input-group has-validation">
                <input type="text" id="RG" data-js="RG" 
                name="RG" class="form-control" 
                placeholder="RG" aria-label="Last name">

                <div class="invalid-feedback">
                  <span>Informe um número RG Valído</span>
                </div>
              </div>
            </div>
        </div>
        <div class="row my-0 my-md-2">
            <div class="col-12 col-md-6 ">
                <label for="Nome" class="font-weight-bold ">Nome: *</label>
              <div class="input-group has-validation">
                <input type="text" id="name" 
                name="name" data-js="Name"
                class="form-control" 
                placeholder="Nome" aria-label="full name">

                <div class="invalid-feedback">
                  <span>Informe o nome</span>
                </div>
              </div>
            </div>
           
            <div class="col my-2 my-md-0">
              <label for="Phone" class="font-weight-bold">Telefone: *</label>

              <div class="input-group has-validation">
                <input type="text" 
                class="form-control" 
                id="Phone" data-js="Phone"
                placeholder="(00) 0000-0000" 
                aria-label="Phone">

                <div class="invalid-feedback">
                  <span>Informe o número de telefone valído </span>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
              <label for="email" class="font-weight-bold">Email: *</label>
              <div class="input-group has-validation">

                <input type="email" id="email" 
                name="email" class="form-control" 
                placeholder="exemplo@gmail.com" 
                aria-label="First name"
                  data-js="email">

                  <div class="invalid-feedback">
                    <span>Digite email corretamente </span>
                  </div>
              </div>

            </div>

            <div class="col-12 col-md-6 mt-2 mt-md-1">
              
              <label for="password" class="font-weight-bold">Senha: *</label>
              <div class="input-group has-validation">
                <input type="password" 
                id="password" 
                class="form-control" 
                placeholder="*******" aria-label="password"
                data-js="password">

                <div class="invalid-feedback">
                  <span>A senha deve conter mais de 4 caracteres </span>
                </div>
              </div>

            </div>
        </div>
        <div class="d-flex justify-content-center my-3 ">
            <button 
                type="submit" 
                class=" w-50 form-control btn btn-primary rounded submit px-3 container"
            >
                Cadastrar
            </button>
        </div> 
        <footer class="d-flex justify-content-center ">
            <p>Já possui cadastro? <a href="/login"  class="font-weight-bold">Login</a></p>
        </footer>
    </form>
 
</div>    

<script src="/js/register.js"></script>

@endsection