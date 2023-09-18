<div class="container">
<div class="row">

     <div class="col-md-6 col-12">
   <div class="form-group">
       <label for="vc_path">Categoria</label>
       <input type="text" id="vc_nome" class="form-control" name="vc_nome"
           placeholder="Categoria do Serviço" value="{{ isset($sub_categoria->vc_nome) ? $sub_categoria->vc_nome : "" }}">
   </div>

   <div class="form-group col-md-6">
    <label for="categorias_id">categorias</label>
    <select id="categorias_id" class="form-control" name="categoria">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->vc_nome }}</option>
        @endforeach
    </select>
</div>
                            </div>


                        </div>
                    </div>
