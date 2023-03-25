<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col-3">#</th>
            <th scope="col-3">Nome</th>
            <th scope="col-3">Email</th>
            <th scope="col-3">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td class="col-3 ">{{ $user->name }}</td>
                <td class="col-3">{{ $user->email }}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <a href="{{ route('admin.setAdmin', $user) }}" class="btn btn-success text-white">
                                Attiva {{ $role }}
                            </a>
                            <a href="{{ route('admin.rejectAdmin', $user) }}" class="btn btn-danger text-white ms-5">
                                Rifiuta {{ $role }}
                            </a>
                        @break

                        @case('revisore')
                            <a href="{{ route('admin.setRevisor', $user) }}" class="btn btn-success text-white">
                                Attiva {{ $role }}
                            </a><a href="{{ route('admin.rejectRevisor', $user) }}" class="btn btn-danger text-white ms-5">
                                Rifiuta {{ $role }}
                            </a>
                        @break

                        @case('redattore')
                            <a href="{{ route('admin.setWriter', $user) }}" class="btn btn-success text-white">
                                Attiva {{ $role }}
                            </a>
                            <a href="{{ route('admin.rejectWriter', $user) }}" class="btn btn-danger text-white ms-5 ">
                                Rifiuta {{ $role }}
                            </a>
                        @break
                    @endswitch
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
