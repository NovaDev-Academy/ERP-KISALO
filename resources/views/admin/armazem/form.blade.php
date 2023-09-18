<div class="container">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="vc_nome">Nome</label>
            <input type="text" id="vc_nome" class="form-control" name="vc_nome"
                placeholder="Nome do Estabelecimento" value="{{ isset($armazem->vc_nome) ? $armazem->vc_nome : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nif">Endereco</label>
            <input type="text" id="endereco" class="form-control" name="endereco"
                placeholder="Endereço" value="{{ isset($armazem->endereco) ? $armazem->endereco : '' }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="latitude">Contacto</label>
            <input type="text" id="contacto" class="form-control" name="contacto"
                placeholder="Contacto" value="{{ isset($armazem->contacto) ? $armazem->contacto : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="vc_path">Imagem</label>
            <input type="file" id="vc_path" class="form-control" name="vc_path"
                placeholder="Imagem" value="{{ isset($armazem->vc_path) ? $armazem->vc_path : '' }}">
        </div>
      
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="longitude">O estabelecimento abre ás:</label>
            <input type="time" id="inicio" class="form-control" name="inicio"
                placeholder="inicio" value="{{ isset($armazem->inicio) ? $armazem->inicio : '' }}">
        </div>
        <div class="form-group col-md-6">
            <label for="longitude">O estabelecimento fecha ás:</label>
            <input type="time" id="fim" class="form-control" name="fim"
                placeholder="fim" value="{{ isset($armazem->fim) ? $armazem->fim : '' }}">
        </div>
    </div>
    <div class="row">

        <div class="form-group col-md-6">
            <label for="categorias_id">categorias</label>
            <select id="categorias_id" class="form-control" name="categoria">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->vc_nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- <div class="row">
        <div class="form-group col-md-12">
            <label for="sobre">Sobre a armazem:</label>
            <textarea id="sobre" class="form-control" placeholder="Sobre a armazem"
                name="sobre">{{ isset($armazem->sobre) ? $armazem->sobre : '' }}</textarea>
        </div>
    </div> --}}
