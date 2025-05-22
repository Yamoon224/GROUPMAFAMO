@foreach ($partners as $item)
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card text-center card-bottom-primary">
        <div class="card-body">
            <img src="{{ asset($item->logo ?? 'images/profile.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
            <h6 class="mb-0 mt-2">{{ $item->type }}</h6>
            <p class="text-muted font-14">{{ $item->company }}</p>
            <a role="button" class="btn btn-soft-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#edit-partner{{ $item->id }}" style="display: inline-block"><i class="uil uil-edit"></i></a>
            <form action="{{ route('partners.destroy', $item->id) }}" method="post" style="display: inline-block">
                @csrf @method('DELETE')
                <button class="btn btn-soft-danger btn-sm mb-2" onclick="if(!confirm('Confirmez-Vous cette Suppression ?')) return false"><i class="uil uil-trash-alt"></i></button>
            </form>
        </div> 
    </div> <!-- end card -->
</div>
<x-edit-partner :partner="$item"></x-edit-partner>
@endforeach