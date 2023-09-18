<div class="container">
    <div class="row">
    
     <div class="col-md-6 col-12">
       <div class="form-group">
           <label for="vc_path">Nome</label>
           <input type="text" id="nome" class="form-control" name="nome"
               placeholder="Especie" value="{{ isset($animalpet->nome) ? $animalpet->nome : "" }}">
       </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Gênero</label>
            <input type="text" id="genero" class="form-control" name="genero"
                placeholder="Especie" value="{{ isset($animalpet->genero) ? $animalpet->genero : "" }}">
        </div>
     </div>
     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Peso</label>
            <input type="text" id="peso" class="form-control" name="peso"
                placeholder="Especie" value="{{ isset($animalpet->peso) ? $animalpet->peso : "" }}">
        </div>
     </div>
     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Especíe</label>
            <select name="especies" class="form-control" id="especie">
                <option >Seleciona a Especíe</option>
                 @foreach ($especies as $especie)
                 <option value="{{$especie->id}}">{{$especie->nome}}</option>
                  @endforeach
                </select>  
        </div>
     </div>

    

     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Estabelecimento</label>
            <select name="estabelecimento" class="form-control" id="users">
                <option >Seleciona o Usuário</option>
                 @foreach ($armazens as $armazem)
                 <option value="{{$armazem->id}}">{{$armazem->name}}</option>
                  @endforeach
                </select>  
        </div>
     </div>
     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Raças</label>
            <select name="racas" class="form-control" id="racas" >
                <option >selecione a Raça</option>
                 @foreach ($racas as $raca)
                 <option value="{{$raca->id}}">{{$raca->nome}}</option>
                  @endforeach
                </select>  
        </div>
     </div>

     
     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Data de Nascimento</label>
            <input type="text" id="data_nascimento" class="form-control" name="data_nascimento"
                placeholder="Especie" value="{{ isset($animal->data_nascimento) ? $animal->data_nascimento : "" }}">
        </div>
 

    
                            
    
    
                            </div>
                        </div>
    