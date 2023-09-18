<div class="container">
<div class="row">
 <div class="form-group col-md-6">
    <label for="vc_path">Nome</label>
    <input type="text" id="vc_nome" class="form-control" name="vc_nome"
        placeholder="Sub-Categoria" value="{{ isset($servico->vc_nome) ? $servico->vc_nome : "" }}">

 </div>

                        
  <div class="col-md-6 col-12">
      <div class="form-group">
          <label for="localizacao">Preço:</label>
          <input type="number" id="fl_preco" class="form-control" placeholder="fl_preco a servico" name="fl_preco" value="{{ isset($servico->preco) ? $servico->preco : "" }}">
      </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Categoria</label>
    <select id="inputState5" class="form-control" name="id_servico_categoria">
        @isset($servico->id_servico_categoria)
          <option name="id_servico_categoria" value="{{ $servico->id_servico_categoria}} ">{{ $servico->categoria_servico }}</option>
        @endisset
      @foreach ($categoria_servicos as $categoria_servico)
          <option name="id_categoria_servico" value="{{ $categoria_servico->id }} ">{{ $categoria_servico->vc_nome }}</option>
      @endforeach
    </select>
  </div>
<div class="col-md-12 col-12">
  <div class="form-group">
      <label for="localizacao">Descrição:</label>
      <input type="textarea" id="lt_desc" class="form-control" placeholder="Descrição a servico" name="lt_desc" value="{{ isset($servico->lt_desc) ? $servico->lt_desc : "" }}">
  </div>
</div>


                    </div>
</div>