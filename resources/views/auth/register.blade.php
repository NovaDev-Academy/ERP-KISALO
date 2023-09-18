@extends('auth.layout')
@section('titulo','Login')
@section('conteudo')

<?php
$categorias=App\Models\categoria::get();
?>
<div class="wrapper">
	<section class="login-content overflow-hidden">
	   <div class="row no-gutters align-items-center bg-white">
		  <div class="col-md-12 col-lg-6 align-self-center">
			 <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center mb-3 justify-content-center text-primary">
				<div class="logo-normal text-center">
                    <img src="{{ asset('assets/images/dashboard/Naamloos-2.png') }}" alt="header" width="35%">
				</div>

			 </a>
			 <div class="row justify-content-center pt-5">
				<div class="col-md-11">
				   <div class="card  d-flex justify-content-center mb-0 auth-card iq-auth-form">
					  <div class="card-body">
						 <h2 class="mb-2 text-center">Registrar </h2>
						 <p class="text-center">Registra-se</p>
						 <form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="row">
                                <div class="col-lg-6">
								  <div class="form-group">
									 <label for="name" class="form-label">Nome</label>
									 <input type="text" class="form-control" name="fistName" required id="name" placeholder="Primeiro Nome">
									</div>
							    </div>

                                <div class="col-lg-6">
								  <div class="form-group">
									 <label for="lastname" class="form-label">Sobre nome</label>
									 <input type="text" class="form-control" name="lastname" required id="lastname" placeholder="Último Nome">
									</div>
							    </div>
                            </div>

                            <div class="row">
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
									 <label for="phone" class="form-label">Tel</label>
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
                                        <label for="password2" class="form-label">Confirmar senha</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password2" required autocomplete="password2" id="password2" aria-describedby="password" placeholder="xxxx">
                                        @error('password')
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
                                        <label for="vc_nome">Nome</label>
                                        <input type="text" id="vc_nome" class="form-control" name="vc_nome" placeholder="Nome do Estabelecimento" value="">
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="nif">Endereco</label>
                                    <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço" value="">
                                </div>
                               </div>

                               <div class="row">
                               <div class="form-group col-lg-6">
                                    <label for="latitude">Contacto</label>
                                    <input type="text" id="contacto" class="form-control" name="contacto" placeholder="Contacto" value="">
                             </div>

                             <div class="form-group col-lg-6">
                                <label for="vc_path">Imagem</label>
                                <input type="file" id="vc_path" class="form-control" name="vc_path" placeholder="Imagem" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="longitude">O estabelecimento abre ás:</label>
                                <input type="time" id="inicio" class="form-control" name="inicio" placeholder="inicio" value="">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="longitude">O estabelecimento fecha ás:</label>
                                <input type="time" id="fim" class="form-control" name="fim" placeholder="fim" value="">
                            </div>
                         </div>

                         <div class="form-group col-md-6">
                            <label for="categorias_id">categorias</label>
                            <select id="categorias_id" class="form-control" name="categoria">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->vc_nome }}</option>
                                @endforeach
                            </select>
                        </div>

							<div class="d-flex justify-content-center">
							   <button type="submit" class="btn btn-submit w-100">registrar</button>
							</div>
						 </form>
                         <p class="mt-3 text-center color-primary">
                            Já tens uma conta ? <a href="{{ route('login') }}" class="text-underline color-tertiary">Iniciar Sessão.</a>
                         </p>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="col-lg-6 d-lg-block d-none bg-primary p-0  overflow-hidden">
			 <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main" alt="images" loading="lazy" >
		  </div>
	   </div>
	</section>
</div>
        @endsection
