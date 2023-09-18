<div class="container">
    <div class="row">
    
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="vc_path">Utiliazador</label>
                <select name="users" class="form-control" id="users">
                    <option >Seleciona o Usuário</option>
                     @foreach ($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                    </select>  
            </div>
         </div>

     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Especíe</label>
            <select name="tipolembrete" class="form-control" id="especie">
                <option >Seleciona a Especíe</option>
                 @foreach ($tipolembretes as $tipolembrete)
                 <option value="{{$tipolembrete->id}}">{{$tipolembrete->nome}}</option>
                  @endforeach
                </select>  
        </div>
     </div>

     
     <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="vc_path">Frequência</label>
            <input type="text" id="frequencia" class="form-control" name="frequencia"
                placeholder="Especie" value="{{ isset($lembrete->frequencia) ? $lembrete->frequencia : "" }}">
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="vc_path">DEscrição</label>
                <input type="text" id="descricao" class="form-control" name="descricao"
                    placeholder="Especie" value="{{ isset($lembrete->descricao) ? $lembrete->descricao : "" }}">
            </div>
 

    
                            
    
    
                            </div>
                        </div>
    