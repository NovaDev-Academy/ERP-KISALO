<div class="container">
<div class="row">
 <div class="form-group col-md-6">
    <label for="vc_path">Nome</label>
    <input type="text" id="vc_nome" class="form-control" name="vc_nome"
        placeholder="praca" value="{{ isset($praca->vc_nome) ? $praca->vc_nome : "" }}">

 </div>

  <div class="form-group col-md-6">
    <label for="inputState">provincia</label>
    <select id="inputState5" class="form-control" name="id_provincia">
        @isset($praca->provincia)
          <option name="id_provincia" value="{{ $praca->id_provincia }} ">{{ $praca->provincia }}</option>
        @endisset
      @foreach ($provincias as $provincia)
          <option name="id_provincia" value="{{ $provincia->id }} ">{{ $provincia->vc_nome }}</option>
      @endforeach
    </select>
  </div>



                    </div>
