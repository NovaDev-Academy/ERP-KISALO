<div class="container">
<div class="row">
 <div class="form-group col-md-6">
    <label for="vc_path">Nome</label>
    <input type="text" id="vc_nome" class="form-control" name="vc_nome"
        placeholder="Sub-Categoria" value="{{ isset($produto->vc_nome) ? $produto->vc_nome : "" }}">

 </div>
     <div class="col-md-6 col-12">
   <div class="form-group">
       <label for="vc_path">Quantidade</label>
       <input type="number" id="it_quantidade" class="form-control" name="it_quantidade"
           placeholder="Sub-Categoria" value="{{ isset($produto->it_quantidade) ? $produto->it_quantidade : "" }}">
   </div>
                            </div>


                        
  <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="localizacao">Preço:</label>
          <input type="number" id="fl_preco" class="form-control" placeholder="fl_preco a produto" name="fl_preco" value="{{ isset($produto->fl_preco) ? $produto->fl_preco : "" }}">
      </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group">
        <label for="fornecedor">Fornecedor:</label>
        <input type="text" id="fornecedor" class="form-control" placeholder="fornecedor a produto" name="fornecedor" value="{{ isset($produto->fornecedor) ? $produto->fornecedor : "" }}">
    </div>
</div>
<div class="col-md-6 col-12">
  <div class="form-group">
      <label for="expiracao">Expiração:</label>
      <input type="date" id="expiracao_at" class="form-control" placeholder="expiracao_at a produto" name="expiracao_at" value="{{ isset($produto->expiracao_at) ? $produto->expiracao_at : "" }}">
  </div>
</div>

 
  
  <div class="form-group col-md-6">
    <label for="inputState">Cor</label>
    <select id="inputState5" class="form-control" name="id_categoria_produto">
        @isset($produto->id_categoria_produto)
          <option name="id_categoria_produto" value="{{ $produto->id_categoria_produto}} ">{{ $produto->categoria_produto }}</option>
        @endisset
      @foreach ($categoria_produtos as $categoria_produto)
          <option name="id_categoria_produto" value="{{ $categoria_produto->id }} ">{{ $categoria_produto->vc_nome }}</option>
      @endforeach
    </select>
  </div>



<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="localizacao">Imagens:</label>
        <input type="file" name="imagens[]" multiple>
      </div>
</div>

<div class="col-md-12 col-12">
  <div class="form-group">
      <label for="localizacao">Descrição:</label>
      <input type="textarea" id="lt_desc" class="form-control" placeholder="Descrição a produto" name="lt_desc" value="{{ isset($produto->lt_desc) ? $produto->lt_desc : "" }}">
  </div>
</div>


                    </div>
</div>