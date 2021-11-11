@extends('layout')
@section('title', 'Início')
@section('home', 'active')
@section('title-header', 'Controle de visitantes')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
    @php
    $i = 1;
    @endphp
    <section class="col ">
        <div class="card">
            <div class="card-header">
                <button class="float-r btn btn-success" data-toggle="modal" data-target="#register">Nova
                    entrada</button>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">#</th>
                            <th>Visitante</th>
                            <th>Empresa</th>
                            <th>Destino</th>
                            <th width="15px">Crachá</th>
                            <th>Registrado por</th>
                            <th>Entrada</th>
                            <th width="70px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td data-search="{{ $record->visitor->cpf }}">{{ $i++ }}</td>
                                <td>{{ $record->visitor->name }}</td>
                                <td>{{ $record->visitor->enterprise->name }}</td>
                                <td>{{ $record->destination->destination }}</td>
                                <td>{{ $record->badge }}</td>
                                <td>{{ $record->registred_by }}</td>
                                <td>{{ date('d/m/Y h:m', strtotime($record->date_entrance)) }}</td>
                                <td>
                                    <button class="btn btn-primary" title="Ver perfil do visitante"><i
                                            class="fa fa-user"></i></button>
                                    <button class="btn btn-success" title="Encerrar entrada"><i
                                            class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </section>
@endsection
@section('modal')

    <!-- Modal -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerLabel">Nova entrada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="visitor_id">Visitante</label>
                            <select id="visitor_id" name="visitor_id" class="select2" style="width: 100%;">
                                <option disabled selected="selected">Selecione um visitante</option>
                                @foreach ($visitors as $visitor)
                                    <option title="{{ $visitor->cpf }}" value="{{ $visitor->title }}">
                                        {{ $visitor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="drive_id">Motorista</label>
                            <select id="drive_id" name="drive_id" class="form-control">
                                <option value="1">Sim</option>
                                <option selected value="1">Não</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" data-inputmask="'mask': ['(99) 9 9999-9999']"
                                inputmode="text" data-mask="" id="phone" name="phone" placeholder="Telefone" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Entrada</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ date('d/m/Y h:m') }}" disabled>
                                <input type="hidden" id="entrance_date" name="entrance_date"
                                    value="{{ date('d/m/Y h:m') }}">
                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>


                        <div class="form-group col">
                            <label for="destination_id">Destino:</label>
                            <select id="destination_id" name="destination" class="select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="reason_id">Motivo:</label>
                            <select id="reason_id" name="reason_id" class="select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="badge_id">Crachá</label>
                            <select id="badge_id" name="badge_id" class="select2" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/numeric-comma.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/list_portuguese.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script>
        function matchCustom(params, data) {

            document.querySelector(".select2-search__field").placeholder = "Pesquise pelo nome ou cpf";

            // Se não houver termos de pesquisa, retorne todos os dados
            if ($.trim(params.term) === '') {

                return data;
            }
            // `params.term` deve ser o termo usado para pesquisar
            // `data.text` é o texto que é exibido para o objeto de dados
            //pesquisa por cpf
            if (data.title.indexOf(params.term) > -1) {
                var modifiedData = $.extend({}, data, true)

                // Você pode retornar objetos modificados a partir daqui
                // Isso inclui combinar os `filhos` como você quiser em conjuntos de dados aninhados
                return modifiedData;
            }

            //Pesquisa por nome
            if (data.text.toLowerCase().indexOf(params.term.toLowerCase()) > -1) {

                console.log(data.text)
                var modifiedData = $.extend({}, data, true);
                modifiedData.text += ' (CPF:' + data.title + ')';

                // Você pode retornar objetos modificados a partir daqui
                // Isso inclui combinar os `filhos` como você quiser em conjuntos de dados aninhados
                return modifiedData;
            }
            // // Retorna `nulo` se o termo não deve ser exibido
            return null;
        }

        //Initialize Select2 Elements
        $('.select2').select2({
            dropdownParent: $("#register"),
            matcher: matchCustom,
        });

        $('[data-mask]').inputmask();
    </script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
@endsection
