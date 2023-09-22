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
<label for="cv_path">Curriculo Vitae</label>
<input type="file" id="cv_path" class="form-control" name="cv_path" placeholder="Curriculo Vitae" value="">
</div>
</div>


</div>

<script>
   // Adicione um ouvinte de evento quando a modal é exibida
   $('#minhaModal').on('shown.bs.modal', function () {
     const tipoEstabelecimentoSelect = document.getElementById("tipoEstabelecimentoSelect");
     const divEmpresa = document.querySelector(".empresa");
     const divIndividual = document.querySelector(".individual");
 
     // Adicione um ouvinte de evento para detectar mudanças na seleção
     tipoEstabelecimentoSelect.addEventListener("change", function() {
       if (tipoEstabelecimentoSelect.value === "1") {
         divEmpresa.style.display = "block";
         divIndividual.style.display = "none";
       } else if (tipoEstabelecimentoSelect.value === "2") {
         divEmpresa.style.display = "none";
         divIndividual.style.display = "block";
       } else {
         divEmpresa.style.display = "none";
         divIndividual.style.display = "none";
       }
     });
   });
 </script>