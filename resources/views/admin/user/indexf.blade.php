@extends('layouts.admin.index')
@section('conteudo')
<?php
$categorias=App\Models\categoria::get();
?>
<div class="content-inner container-fluid pb-0" id="page_layout">

<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header d-flex justify-content-between">
            <div class="header-title">
               <h4 class="card-title">Cadastrar</h4>
            </div>
            {{-- <div>
               <a href="{{ route('admin.user.indexf') }}" style="decoration:none ">
                 <button type="button" class="btn btn-primary mt-2" >Cadastrar Utilizador

                    <svg class="size-28 hvr-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor"></path>
                    </svg>
                </button></a> 
            </div> --}}
         </div>

         <div class="card-body">
            <section class="login-content overflow-hidden">
               <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
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
                                    <label for="sobrename" class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" name="sobrename" required id="sobrename" placeholder="Segundo Nome">
                                   </div>
                               </div>
                             
                             
                             <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" aria-describedby="email" placeholder="xyz@example.com">
                                    @error('email')
                                    <span class="invalid-feedback form-control" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                   </div>
                              </div>
 
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="phone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" name="phone" required id="phone" placeholder="+244">
                                 </div>
                             </div>
 
                             
                         </div>
 
                         <div class="row">
 
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
 
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label for="password_confirmation" class="form-label">Confirmar senha</label>
                                     <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" id="password_confirmation" aria-describedby="password_confirmation" placeholder="xxxx">
                                     @error('password_confirmation')
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
                                     <label for="vc_nome">Tipo de Prestador</label>
                                     <select type="text" id="tipo_estabelecimento" class="form-control" name="tipo_estabelecimento" placeholder="Nome do Estabelecimento" value="">
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
                             <input type="file" id="vc_path" class="form-control" name="vc_path" placeholder="Documento da EMPRESA" value="">
                         </div>
                         <div class="form-group col-lg-6">
                             <label for="vc_path">Data de Registro da Empresa</label>
                             <input type="date" id="registro" class="form-control" name="registro" placeholder="Imagem" value="">
                         </div>
 
                         <div class="form-group col-lg-6">
                             <label for="vc_path">NIF Empresarial</label>
                             <input type="text" id="nif" class="form-control" name="nif" placeholder="NIF Empresarial" value="">
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
 
                 <div class="form-group col-lg-6">
                     <label for="vc_path">Curriculo Vitae</label>
                     <input type="file" id="cv_path" class="form-control" name="cv_path" placeholder="Curriculo Vitae" value="">
                 </div>
                     </div>
 
                     
 
                      
                 </div>
                  <div class="d-flex justify-content-center">
                     <button type="submit" class="btn btn-submit w-100">Cadastar</button>
                  </div>
                </form>
               {{-- <div class="row no-gutters align-items-center bg-white">
                 <div class="col-md-12 col-lg-6 align-self-center">
                   
                   <div class="row justify-content-center pt-5">
                     <div class="col-md-11">
                        <div class="card  d-flex justify-content-center mb-0 auth-card iq-auth-form">
                          <div class="card-body">
                            <h2 class="mb-2 text-center">Cadastrar </h2>
                           
                          
                                  
                          </div>
                        </div>
                     </div>
                   </div>
                 </div> --}}
                 {{-- <div class="col-lg-6 d-lg-block d-none bg-primary p-0  overflow-hidden">
                   <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main" alt="images" loading="lazy" >
                 </div> --}}
               </div>
             </section>
       </div>
   </div>
   </div>
</div>
      <div class="wrapper">

</div>


           
   </div>


            </div>


             <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>


             @if (session('eliminada'))
<script>
    Swal.fire(
        'Utilizadores Eliminado com sucesso!',
        '',
        'success'
    )
</script>
@endif
@if (session('editada'))
<script>
Swal.fire(
    'Utilizadores editado com sucesso!',
    '',
    'success'
)
</script>
@endif
@if (session('editada_f'))
<script>
Swal.fire(
'ERro ao editar Utilizadores!',
'',
'error'
)
</script>
@endif

@if (session('status'))
<script>
Swal.fire(
    'Utilizadores Cadastrado Com Sucesso!',
    '',
    'success'
)
</script>
@endif
@if (session('status_f'))
<script>
Swal.fire(
'Erro ao cadastrar Utilizadores!',
'',
'success'
)
</script>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoEstabelecimentoSelect = document.getElementById("tipo_estabelecimento");
        const divEmpresa = document.querySelector(".empresa");
        const divIndividual = document.querySelector(".individual");
    
        // Adicione um ouvinte de evento para detectar mudanças na seleção
        tipoEstabelecimentoSelect.addEventListener("change", function() {
            if (tipoEstabelecimentoSelect.value === "1") {
                // Se "Empresa" for selecionado, exiba a div "empresa" e oculte a div "individual"
                divEmpresa.style.display = "block";
                divIndividual.style.display = "none";
            } else if (tipoEstabelecimentoSelect.value === "2") {
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
