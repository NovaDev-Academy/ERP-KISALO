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

    
<div class="container">
    
    <div class="row">
        
     <div class="form-group col-md-6">
        <label for="vc_path">Nome</label>
           <input type="text" id="name" class="form-control" name="name"
               placeholder="Sub-Categoria" value="{{ isset($user->name) ? $user->name : "" }}">
    
     </div>
     <div class="form-group col-md-6">
        <label for="vc_path">Email</label>
           <input type="text" id="email" class="form-control" name="email"
               placeholder="Sub-Categoria" value="{{ isset($user->email) ? $user->email : "" }}">
    
     </div>
     <div class="form-group col-md-6">
        <label for="vc_path">Endereço</label>
           <input type="text" id="endeco" class="form-control" name="endeco"
               placeholder="Endereço" value="{{ isset($user->endeco) ? $user->endeco : "" }}">
    
     </div>
     <div class="form-group col-md-6">
        <label for="vc_path">Genêro</label>
           <select name="genero" id="" class="form-control">
             <option value="Masculino">Masculino</option>
             <option value="Femenino">Femenino</option>
           </select>
    
     </div>
     <div class="form-group col-md-6">
        <label for="vc_path">Password</label>
           <input type="password" id="password" class="form-control" name="password"
               placeholder="Sub-Categoria" >
    
     </div>
     <div class="form-group col-md-6">
        <label for="vc_path">Confirmar Password</label>
           <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
               placeholder="Sub-Categoria" >
     </div>
    
     
     <div class="form-group col-md-6 ">
    
           <label for="vc_path">Imagem</label>
            <input type="file" id="vc_path" class="form-control" name="vc_path"
                placeholder="vc_path" value="{{ isset($galeria->vc_path) ? $galeria->vc_path : "" }}">
        </div>
    
    
    
      <div class="form-group col-md-6">
        <label for="inputState">Nivel de acesso</label>
        <select id="nivel_acesso" class="form-control" name="vc_tipo_utilizador" style="width: 100%;" >
          @if(Auth::user()->vc_tipo_utilizador==1)
            <option name="vc_tipo_utilizador" value="1">Admistrador</option>
          @endif
            <option name="vc_tipo_utilizador" value="2">Prestador Individual</option>
            <option name="vc_tipo_utilizador" value="3">Prestador Empresa</option>
            <option name="vc_tipo_utilizador" value="2">Vendedor</option>
            <option name="vc_tipo_utilizador" value="3">Afiliado</option>
        </select>
      
      </div>
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

@endsection