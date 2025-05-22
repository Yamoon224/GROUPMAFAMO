@foreach ($employees as $item)
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-center card-top-primary">
        <div class="card-body">
            <img src="{{ asset($item->photo ?? 'images/profile.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

            <h5 class="mb-0 mt-2">{{ $item->gender." ".$item->name }}</h5>
            <p class="text-muted font-14">{{ $item->position }}</p>

            {{-- <a role="button" class="btn btn-soft-info btn-sm mb-2" href="{{ route('employees.show', $item->id) }}" style="display: inline-block"><i class="uil uil-user"></i></a> --}}
            <a role="button" class="btn btn-soft-primary btn-sm mb-2" href="{{ route('employees.edit', $item->id) }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
            <form action="{{ route('employees.destroy', $item->id) }}" method="post" style="display: inline-block">
                @csrf @method('DELETE')
                <button class="btn btn-soft-danger btn-sm mb-2" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
            </form>
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div>
@endforeach