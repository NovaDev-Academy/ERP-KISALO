
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



