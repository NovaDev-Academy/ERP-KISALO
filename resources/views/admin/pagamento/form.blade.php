<div class="container">
<div class="row">
<div class="form-group col-md-6">
    <label for="inputState">Pedido</label>
    <select id="pedido_id" class="form-control" name="pedido_id">
      <option name="" value="">--Selecione um pedido</option>
      @foreach($pedidos as $pedido)
          <option  value="{{$pedido->id}}">{{$pedido->id}}</option>
       @endforeach
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Cliente</label>
    <select id="user_id" class="form-control" name="user_id">
      <option name="" value="">--Selecione um clinete</option>
       @foreach($clientes as $cliente)
          <option value="{{$cliente->id}}">{{$cliente->id}} | {{$cliente->name}}</option>
       @endforeach
    </select>
  </div>
  <div class="col-md-6 col-6">
    <div class="form-group">
        <label for="localizacao">Comprovativo</label>
        <input type="file" id="comprovativo" class="form-control" placeholder="comprovativo" name="comprovativo" value="">
    </div>
  </div>
  </div>
  </div>

                 
