<div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">Serie</th>
                                            <th>Nombre</th>
                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Estatus</th>
                                            <th width="20%">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allData as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->id_no }}</td>

                                            {{-- Formato de fecha (date) en español (dia de la semana, dia mes y año) --}}
                                            {{-- <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</td> --}}
                                            <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('D[/]MMMM[/]YYYY') }}</td>

                                            <td>{{ $item->attend_status }}</td>

                                            <td>
                                                {{-- Botón Editar --}}
                                                <a href="{{ route('employee.leave.edit', $item->id) }}" class="btn btn-info">Editar</a>

                                                {{-- Botón Eliminar --}}
                                                <a href="{{ route('employee.leave.delete', $item->id) }}" class="btn btn-danger" id="delete">Eliminar</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>

                                    <tfoot>

                                    </tfoot>

                                </table>
                            </div>
                        </div>
