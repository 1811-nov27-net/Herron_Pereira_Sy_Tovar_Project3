@extends('layouts.app')

@section('content')
    <pagina tamanho='10'>
        <painel titulo='Dashboard'>
            Teste de conteúdo

            <div class='row'>
                <div class='col-md-4'>
                    <caixa qtd='{{$ordersCount}}' titulo='Orders' url='{{route('site.orders.index')}}' cor='orange' icone='ion ion-pie-graph'>
                        Teste de conteúdo
                    </caixa>
                </div>
            </div>
        </painel>
    </pagina>
@endsection
