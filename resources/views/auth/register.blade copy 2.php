'name',
'email',
'password',
'genero',
'endereco',
'telefone',
'vc_tipo_utilizador',
'nome_empresa',
'reponsavel',
'descricao',
'bi',
'nif',
'documento',
'estado',
'registro',



@extends('auth.layout')
@section('titulo','Login')
@section('conteudo')

<?php
$categorias=App\Models\categoria::get();
?>
<div class="wrapper">
<section class="login-content overflow-hidden">
<div class="row no-gutters align-items-center bg-white">
  <div class="col-md-12 col-lg-6 align-self-center">
     <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
        <div class="logo-normal text-center">
            <img src="{{ asset('assets/images/dashboard/Naamloos-2.png') }}" alt="header" width="35%">
        </div>

     </a>
     <div class="row justify-content-center pt-5">
        <div class="col-md-11">
           <div class="card  d-flex justify-content-center mb-0 auth-card iq-auth-form">
              <div class="card-body">
                 <h2 class="mb-2 text-center">Registrar </h2>
                 <p class="text-center">Registra-se</p>
                 <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                             <label for="name" class="form-label">Nome</label>
                             <input type="text" class="form-control" name="name" required id="name" placeholder="Primeiro Nome">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                               <label for="email" class="form-label">email</label>
                               <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" aria-describedby="email" placeholder="xyz@example.com">
                               @error('email')
                               <span class="invalid-feedback form-control" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                              </div>
                         </div>
                        
                    </div>

                    <div class="row">
                   

                       <div class="col-lg-6">
                          <div class="form-group">
                             <label for="phone" class="form-label">Telefone</label>
                             <input type="tel" class="form-control" name="phone" required id="phone" placeholder="+244">
                            </div>
                       </div>
                       <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" id="password" aria-describedby="password" placeholder="xxxx">
                            @error('password')
                            <span class="invalid-feedback form-control" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>
                    </div>
                    </div>

                       <div class="row">

                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password2" class="form-label">Confirmar senha</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password2" required autocomplete="password2" id="password2" aria-describedby="password" placeholder="xxxx">
                                @error('password')
                                <span class="invalid-feedback form-control" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="vc_nome">Tipo de Prestador</label>
                                <select type="text" id="vc_tipo_utilizador" class="form-control" name="vc_tipo_utilizador" placeholder="Nome do Estabelecimento" value="">
                                    <option>Selecione o Tipo de Empresa</option>
                                    <option value="1">Empresa</option>
                                    <option value="2">Individual</option>
                                </select>
                            </div>
                        </div>
                       </div>
                       <br>
                    <div class="empresa" style="display: none">
                        <h3 class="h3">Dados do Prestador</h3>
                        <br>
                       <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="vc_nome">Nome da Empresa</label>
                                <input type="text" id="nome_empresa" class="form-control" name="nome_empresa" placeholder="Nome da Empresa" value="">
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="nif">Endereço</label>
                            <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço" value="">
                        </div>
                       </div>

                       <div class="row">
                       <div class="form-group col-lg-6">
                            <label for="latitude">Responsavel Legal</label>
                            <input type="text" id="reponsavel" class="form-control" name="reponsavel" placeholder="reponsavel" value="">
                     </div>
                     <div class="form-group col-lg-6">
                        <label for="latitude">Contacto</label>
                        <input type="text" id="contacto" class="form-control" name="contacto" placeholder="Contacto" value="">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label for="vc_path">Numero do BI do Representante</label>
                        <input type="text" id="bi" class="form-control" name="bi" placeholder="Numero do BI do Representante" value="">
                    </div>

                     <div class="form-group col-lg-6">
                        <label for="vc_path">Documento de Registro da Empresa</label>
                        <input type="file" id="documento" class="form-control" name="documento" placeholder="Documento da EMPRESA" value="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="vc_path">Data de Registro da Empresa</label>
                        <input type="date" id="registro" class="form-control" name="registro" placeholder="Imagem" value="">
                    </div>
                </div>

                

                 
            </div>
            <div class="individual" style="display: none">
                       <div class="row">
                        
                     <div class="form-group col-lg-6">
                        <label for="vc_path">Numero do BI</label>
                        <input type="text" id="vc_path" class="form-control" name="bi" placeholder="Numero do BI" value="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="vc_path">Endereço</label>
                        <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço da Empresa" value="">
                    </div>
                </div>

                

                 
            </div>
                    <div class="d-flex justify-content-center">
                       <button type="submit" class="btn btn-submit w-100">registrar</button>
                    </div>
                 </form>
                 <p class="mt-3 text-center color-primary">
                    Já tens uma conta ? <a href="{{ route('login') }}" class="text-underline color-tertiary">Iniciar Sessão.</a>
                 </p>
              </div>
           </div>
        </div>
     </div>
  </div>
  <div class="col-lg-6 d-lg-block d-none bg-primary p-0  overflow-hidden">
     <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main" alt="images" loading="lazy" >
  </div>
</div>
</section>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
const tipoEstabelecimentoSelect = document.getElementById("vc_tipo_utilizador");
const divEmpresa = document.querySelector(".empresa");
const divIndividual = document.querySelector(".individual");

// Adicione um ouvinte de evento para detectar mudanças na seleção
tipoEstabelecimentoSelect.addEventListener("change", function() {
    if (tipoEstabelecimentoSelect.value === "empresa") {
        // Se "Empresa" for selecionado, exiba a div "empresa" e oculte a div "individual"
        divEmpresa.style.display = "block";
        divIndividual.style.display = "none";
    } else if (tipoEstabelecimentoSelect.value === "individual") {
        // Se "Individual" for selecionado, exiba a div "individual" e oculte a div "empresa"
        divEmpresa.style.display = "none";
        divIndividual.style.display = "block";
    } else {
        // Se "Selecione o Tipo de Empresa" for selecionado, oculte ambas as divs
        divEmpresa.style.display = "none";
        divIndividual.style.display = "none";
    }
});
});
</script>

@endsection
