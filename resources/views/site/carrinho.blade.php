@extends('site/layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">

  @if ($mensagem = Session::get('sucesso'))
  
    <div class="card green">
      <div class="card-content white-text">
        <span class="card-title">Parabéns</span>
        <p>{{ $mensagem }}</p>
      </div>
    </div>
      
  @endif

  @if ($itens->count() == 0)
  <div class="card orange">
    <div class="card-content white-text">
      <span class="card-title">Seu carrinho está vazio :(</span>
      <p>Aproveite nossas promoções!</p>
    </div>
  </div>


  @else 
  <h5>Seu carrinho possui {{$itens->count()}} produtos.</h5>
  <table class="striped">
    <thead>

      <tr>
          <th></th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Quantidade</th>
          <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach ($itens as $item)
      <tr>
        <td><img src="{{$item->attributes->image}}" alt="imagem-produto" width="70px" class="responsive-img circle"></td>
        <td>{{$item->name}}</td>
        <td>R$ {{number_format($item->price,2,',','.')}}</td>
        
        {{--BOTÃO ATUALIZAR--}}
        <form action="{{route('site/atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$item->id}}">
          <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" min="1" value="{{$item->quantity}}" name="quantity"></td>
          <td>
            <button class="btn-floating waves-effect waves-light purple" style="margin-bottom: 5px"><i class="material-icons">refresh</i></button>
        </form>

        {{--BOTÃO REMOVER--}}
          <form action="{{route('site/removecarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <div class="card purple">
      <div class="card-content white-text">
        <span class="card-title"><b>R$ {{number_format(\Cart::getTotal(),2,',','.')}}</b></span>
        <p>Pague em 12x sem juros</p>
      </div>
    </div>
  @endif

    

   
   
    <br>
   <div class="row container center">
    
    <a href="{{route('site/index')}}">
      <button class="btn waves-effect waves-light blue" style="margin-bottom: 10px;">Continuar comprando<i class="material-icons right">arrow_back</i></button>
    </a>

    <a href="{{route('site/limpacarrinho')}}" class="btn waves-effect waves-light red" style="margin-bottom: 10px;">Limpar carrinho<i class="material-icons right">clear</i></a>

    <button class="btn waves-effect waves-light green" style="margin-bottom: 10px;">Finalizar pedido<i class="material-icons right">check</i></button>
   </div>
</div>
@endsection





