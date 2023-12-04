@extends('layouts.admin.index')
@section('conteudo')
<div class="content-inner container-fluid pb-0" id="page_layout">

    <div class="row">
<div class="col-lg-12">
    <div class="card">
         <div class="card-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
               <div class="d-flex flex-wrap align-items-center">
                  <div class="profile-img position-relative me-3 mb-3 mb-lg-0 profile-logo profile-logo1">
                    @if(Auth::user()->vc_path==null)
                     <img src="../../assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100" loading="lazy">
                    @else
                    <img src="{{ asset($user->vc_path) }}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100" loading="lazy">
                   
                    @endif
                  </div>
                  <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                     <h4 class="me-2 h4">{{ Auth::user()->name }}</h4>
                     <span> -   @if($user->vc_tipo_utilizador == 0)
                        Leitor
                 @elseif($user->vc_tipo_utilizador == 2)
                         Prestador Individual
                 @elseif($user->vc_tipo_utilizador == 4)
                         Gerente
                  @elseif($user->vc_tipo_utilizador == 3)
                         Prestador Empresa
                 @else
                        Administrador
                 @endif</span>
                  </div>
               </div>
               @if(Auth::user()->vc_tipo_utilizador==2 || Auth::user()->vc_tipo_utilizador== 3 )
                   @if(Auth::user()->estado==0)
                   <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                     <span class="badge bg-warning">Conta em Análise</span>
                  </li>
                   
                  @endif
                  @if(Auth::user()->estado==1)
                   <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                     <span class="badge bg-success">Conta Activada</span>
                  </li>
                   
                  @endif

                  @if(Auth::user()->estado==2)
                   <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                     <span class="badge bg-danger">Conta Não Aprovada</span>
                  </li>
                   
                  @endif

                  @endif
            </div>
         </div>
    </div>
 </div>
 <div class="col-sm-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             <h4 class="card-title">Editar Perfil</h4>
          </div>
     
       </div>
       <div class="card-body">
        <form action="{{route('prestador.perfil.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="name" class="form-label">Nome*</label>
                       <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required id="name" placeholder="Primeiro Nome">
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="sobrename" class="form-label">Sobrenome*</label>
                       <input type="text" class="form-control" name="sobrename" value="{{ Auth::user()->sobrename }}" required id="sobrename" placeholder="Segundo Nome">
                   </div>
               </div>
       
               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="email" class="form-label">Email*</label>
                       <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email}}" required autocomplete="email" id="email" aria-describedby="email" placeholder="xyz@example.com">
                       @error('email')
                       <span class="invalid-feedback form-control" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                   </div>
               </div>
       
               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="phone" class="form-label">Telefone*</label>
                       <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->telefone }}" required id="phone" placeholder="+244">
                   </div>
               </div>
       
               <div class="col-lg-6">
                   <div class "form-group">
                       <label for="telefone_2" class="form-label">Telefone 2*</label>
                       <input type="number" class="form-control" name="telefone_2" value="{{ Auth::user()->telefone_2 }}" required id="telefone_2" placeholder="+244">
                   </div>
               </div>
       
               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="provincia">Escolha uma província de Angola:*</label>
                       <select id="provincia" name="provincia" class="form-control">
                        <option value="{{ Auth::user()->provincia }}"selected>{{ Auth::user()->provincia }}</option>
                           <option value="Bengo"{{ old('provincia') == 'Bengo' ? ' selected' : '' }}>Bengo</option>
                           <option value="Benguela"{{ old('provincia') == 'Benguela' ? ' selected' : '' }}>Benguela</option>
                           <option value="Bié"{{ old('provincia') == 'Bié' ? ' selected' : '' }}>Bié</option>
                           <option value="Cabinda"{{ old('provincia') == 'Cabinda' ? ' selected' : '' }}>Cabinda</option>
                           <option value="Cunene"{{ old('provincia') == 'Cunene' ? ' selected' : '' }}>Cunene</option>
                           <option value="Huambo"{{ old('provincia') == 'Huambo' ? ' selected' : '' }}>Huambo</option>
                           <option value="Huíla"{{ old('provincia') == 'Huíla' ? ' selected' : '' }}>Huíla</option>
                           <option value="Luanda"{{ old('provincia') == 'Luanda' ? ' selected' : '' }}>Luanda</option>
                           <option value="Lunda Norte"{{ old('provincia') == 'Lunda Norte' ? ' selected' : '' }}>Lunda Norte</option>
                           <option value="Lunda Sul"{{ old('provincia') == 'Lunda Sul' ? ' selected' : '' }}>Lunda Sul</option>
                           <option value="Malanje"{{ old('provincia') == 'Malanje' ? ' selected' : '' }}>Malanje</option>
                           <option value="Moxico"{{ old('provincia') == 'Moxico' ? ' selected' : '' }}>Moxico</option>
                           <option value="Namibe"{{ old('provincia') == 'Namibe' ? ' selected' : '' }}>Namibe</option>
                           <option value="Uíge"{{ old('provincia') == 'Uíge' ? ' selected' : '' }}>Uíge</option>
                           <option value="Zaire"{{ old('provincia') == 'Zaire' ? ' selected' : '' }}>Zaire</option>
                           <option value="Cuando Cubango"{{ old('provincia') == 'Cuando Cubango' ? ' selected' : '' }}>Cuando Cubango</option>
                           <option value="Cuanza Norte"{{ old('provincia') == 'Cuanza Norte' ? ' selected' : '' }}>Cuanza Norte</option>
                           <option value="Cuanza Sul"{{ old('provincia') == 'Cuanza Sul' ? ' selected' : '' }}>Cuanza Sul</option>
                       </select>
                       
                   </div>
               </div>
       
               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="municipio" class="form-label">Municipio*</label>
                       <input type="text" class="form-control" name="municipio" value="{{ Auth::user()->municipio }}" required id="municipio" placeholder="Municipio">
                   </div>
               </div>
               <div class="col-lg-12">
                   <div class="form-group">
                       <label for="kisalo" class="form-label">Como descobriu o Kísalo? *</label>
                       <textarea name="kisalo" class="form-control">{{  Auth::user()->kisalo }}</textarea>
                   </div>
               </div>
               <div class="col-lg-12">
                   <div class="form-group">
                       <label for="informações" class="form-label">Outras Informações </label>
                       <textarea name="informações" class="form-control">{{ Auth::user()->informações }}</textarea>
                   </div>
               </div>
           </div>
        
               
           

           <div class="row">

               <div class="col-lg-6">
                   <div class="form-group">
                       <label for="password" class="form-label">Senha*</label>
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
                       <label for="password_confirmation" class="form-label">Confirmar senha*</label>
                       <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" id="password_confirmation" aria-describedby="password_confirmation" placeholder="xxxx">
                       @error('password_confirmation')
                           <span class="invalid-feedback form-control" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                   </div>
               </div>

         
          
          <div class="form-group col-md-6 ">
         
                <label for="vc_path">Imagem</label>
                 <input type="file" id="vc_path" class="form-control" name="vc_path"
                     placeholder="vc_path" value="{{ isset($galeria->vc_path) ? $galeria->vc_path : "" }}">
         
            
            
         
            
         
            
         </div>
         
         

           </div>
           <br>
         @if(Auth::user()->vc_tipo_utilizador==3)
         <div class="empresa">
            <h3 class="h3">Dados do Prestador</h3>
            <br>
           <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="vc_nome">Nome da Empresa</label>
                    <input type="text" id="nome_empresa" class="form-control" name="nome_empresa" placeholder="Nome da Empresa" value="{{ Auth::user()->nome_empresa }}">
                </div>
            </div>
         
            <div class="form-group col-lg-6">
                <label for="nif">Endereço</label>
                <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço" value="{{ Auth::user()->endereco }}">
            </div>
           </div>
         
           <div class="row">
           <div class="form-group col-lg-6">
                <label for="latitude">Responsavel Legal</label>
                <input type="text" id="reponsavel" class="form-control" name="reponsavel" placeholder="reponsavel" value="{{ Auth::user()->responsavel }}">
         </div>
         <div class="form-group col-lg-6">
            <label for="latitude">Contacto</label>
            <input type="text" id="contacto" class="form-control" name="contacto" placeholder="Contacto" value="{{ Auth::user()->telefone }}">
         </div>
         
         <div class="form-group col-lg-6">
            <label for="vc_path">Numero do BI do Representante</label>
            <input type="text" id="bi" class="form-control" name="bi" placeholder="Numero do BI do Representante" value="{{ Auth::user()->bi }}">
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
            <input type="text" id="nif" class="form-control" name="nif" placeholder="NIF Empresarial" value="{{ Auth::user()->nif }}">
         </div>
         </div>
         
         <div class="form-group col-lg-6">
            <label for="funcionarios">Quantidade de Funcionarios*</label>
            <input type="number" id="funcionarios" class="form-control" name="funcionarios" placeholder="Quantidade de Funcionarios" value="{{ Auth::user()->funcionarios }}">
        </div>
         
         
         </div>
         @endif
         @if(Auth::user()->vc_tipo_utilizador==2)
         <div class="individual" >
           <div class="row">
            
             
         <div class="form-group col-lg-6">
         <label for="vc_path">Numero do BI</label>
         <input type="text" id="vc_path" class="form-control" name="bi" placeholder="Numero do BI" value="{{ Auth::user()->bi }}">
         </div>
         <div class="form-group col-lg-6">
         <label for="vc_path">Endereço</label>
         <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço da Empresa" vvalue="{{ Auth::user()->endereco }}">
         </div>
         
         <div class="form-group col-lg-6">
         <label for="cv_path">Curriculo Vitae</label>
         <input type="file" id="cv_path" class="form-control" name="cv_path" placeholder="Curriculo Vitae" value="">
         </div>
         </div>
         @endif
      </div>
         </div>

    
               <input type="submit" class="btn btn-primary" value="">
       
        </form>
         
          </div>
       </div>
    </div>
 </div>
    </div>
</div>
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