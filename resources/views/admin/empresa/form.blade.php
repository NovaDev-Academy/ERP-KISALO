<div class="container">
<div class="row">
 <div class="form-group col-md-6">
    <label for="vc_path">IBAN</label>
    <input type="text" id="iban" class="form-control" name="iban"
        placeholder="Sub-Categoria" value="{{ isset($empresa->iban) ? $empresa->iban : "" }}">

 </div>
     <div class="col-md-6 col-12">
   <div class="form-group">
       <label for="vc_path">Contactos</label>
       <input type="text" id="contactos" class="form-control" name="contactos"
           placeholder="Sub-Categoria" value="{{ isset($empresa->contactos) ? $empresa->contactos : "" }}">
   </div>
                            </div>


                        </div>
  <div class="col-md-12 col-12">
      <div class="form-group">
          <label for="localizacao">Sobre a Empresa:</label>
          <input type="textarea" id="sobre" class="form-control" placeholder="Sobre a Empresa" name="sobre" value="{{ isset($empresa->sobre) ? $empresa->sobre : "" }}">
      </div>
  </div>
                    </div>
